<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;
use Livewire\WithFileUploads;

class Product extends Component
{
    use WithFileUploads;
    public $productName;
    public $productDescription;
    public $productImage;
    public $errors = [];
    public $products = [];
    public $message;

    public $currentPage = 1;
    public $lastPage;
    public $nextPageUrl;
    public $prevPageUrl;
    public $perPage = 3;

    public $sortDirection = 'desc';
    public $updateData = false;
    public $product_id;
    public $sortField = 'product_name';

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->fetchProducts(1);
    }

    public function mount()
    {
        $this->fetchProducts();
    }

    public function fetchProducts($page = 1)
    {
        $response = Http::get("https://sinergi.dev.ybgee.my.id/api/product", [
            'page' => $page,
            'per_page' => $this->perPage,
            'order_by' => $this->sortField,
            'sort_by' => $this->sortDirection
        ]);

        if ($response->successful()) {
            $responseData = $response->json();
            if (isset($responseData['data'])) {
                $this->products = $responseData['data']['data'];
                $this->currentPage = $responseData['data']['current_page'];
                $this->lastPage = $responseData['data']['last_page'];
                $this->nextPageUrl = $responseData['data']['next_page_url'];
                $this->prevPageUrl = $responseData['data']['prev_page_url'];
            }
        }
    }

    public function nextPage()
    {
        if ($this->currentPage < $this->lastPage) {
            $this->fetchProducts($this->currentPage + 1);
        }
    }

    public function prevPage()
    {
        if ($this->currentPage > 1) {
            $this->fetchProducts($this->currentPage - 1);
        }
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function store()
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            if ($this->productImage) {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->attach(
                    'product_img',
                    file_get_contents($this->productImage->path()),
                    $this->productImage->getClientOriginalName()
                )->post('https://sinergi.dev.ybgee.my.id/api/product', [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->post('https://sinergi.dev.ybgee.my.id/api/product', [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            }

            if ($response->successful()) {
                $this->message = 'Product created successfully!';
                $this->errors = [];
                $this->reset(['productName', 'productDescription', 'productImage']);
                $this->fetchProducts();
            } else {
                $this->message = '';
                if ($response->status() === 422) {
                    $this->errors = $response->json()['errors'];
                } else if ($response->status() === 401) {
                    $this->errors = ['auth' => 'Please login first'];
                } else {
                    $this->errors = ['server' => 'Something went wrong'];
                }
            }
        } catch (\Exception $e) {
            $this->message = '';
            $this->errors = ['connection' => 'Failed to connect to server'];
        }
    }

    // public function edit($id)
    // {
    //     $this->product_id = $id;
    //     $data = Http::get("https://sinergi.dev.ybgee.my.id/api/product/{$id}");
    //     $data = $data->json();

    //     $this->productName = $data['data']['product_name'];
    //     $this->productDescription = $data['data']['product_desc'];
    //     $this->productImage = $data['data']['product_img'];

    //     $this->updateData = true;
    // }

    // public function update()
    // {
    //     try {
    //         $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

    //         if ($this->productImage && !is_string($this->productImage)) {
    //             $response = Http::withHeaders([
    //                 'Accept' => 'application/json',
    //                 'Authorization' => 'Bearer ' . $token
    //             ])->attach(
    //                 'product_img',
    //                 file_get_contents($this->productImage->path()),
    //                 $this->productImage->getClientOriginalName()
    //             )->patch("https://sinergi.dev.ybgee.my.id/api/product/{$this->product_id}", [
    //                 'product_name' => $this->productName,
    //                 'product_desc' => $this->productDescription,
    //             ]);
    //         } else {
    //             $response = Http::withHeaders([
    //                 'Accept' => 'application/json',
    //                 'Authorization' => 'Bearer ' . $token
    //             ])->patch("https://sinergi.dev.ybgee.my.id/api/product/{$this->product_id}", [
    //                 'product_name' => $this->productName,
    //                 'product_desc' => $this->productDescription,
    //             ]);
    //         }

    //         if ($response->successful()) {
    //             $this->message = 'Product updated successfully!';
    //             $this->errors = [];
    //             $this->reset(['productName', 'productDescription', 'productImage']);
    //             $this->fetchProducts();
    //         } else {
    //             $this->message = '';
    //             if ($response->status() === 422) {
    //                 $this->errors = $response->json()['errors'];
    //             } else if ($response->status() === 401) {
    //                 $this->errors = ['auth' => 'Please login first'];
    //             } else {
    //                 $this->errors = ['server' => 'Something went wrong'];
    //             }
    //         }
    //     } catch (\Exception $e) {
    //         $this->message = '';
    //         $this->errors = ['connection' => 'Failed to connect to server'];
    //     }
    // }
    public function edit($id)
    {
        $this->product_id = $id;
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        // Force fresh data fetch first
        $this->fetchproducts($this->currentPage);

        // Get latest data directly from the products array
        $currentproduct = collect($this->products)->first(function ($product) use ($id) {
            return $product['product_id'] === $id;
        });

        if ($currentproduct) {
            $this->reset(['productName', 'productDescription', 'productImage']);
            $this->productName = $currentproduct['product_name'];
            $this->productDescription = $currentproduct['product_desc'];
            $this->productImage = $currentproduct['product_img'];
            $this->updateData = true;
        }
    }

    public function update()
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            if ($this->productImage && !is_string($this->productImage)) {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->attach(
                    'product_img',
                    file_get_contents($this->productImage->path()),
                    $this->productImage->getClientOriginalName()
                )->patch("https://sinergi.dev.ybgee.my.id/api/product/{$this->product_id}", [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->patch("https://sinergi.dev.ybgee.my.id/api/product/{$this->product_id}", [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            }


            if ($response->successful()) {
                $this->message = 'Product updated successfully!';
                $this->errors = []; // Clear any existing errors
                $this->reset(['productName', 'productDescription', 'productImage']);
                $this->updateData = false;
                $this->fetchproducts();
            } else {
                $this->message = ''; // Clear success message
                if ($response->status() === 422) {
                    $this->errors = $response->json()['errors'];
                } else if ($response->status() === 401) {
                    $this->errors = ['auth' => 'Please login first'];
                } else {
                    $this->errors = ['server' => 'Something went wrong'];
                }
            }
        } catch (\Exception $e) {
            $this->message = ''; // Clear success message
            $this->errors = ['connection' => 'Failed to connect to server'];
        }
    }

    public function delete($id)
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->delete("https://sinergi.dev.ybgee.my.id/api/product/{$id}");

            if ($response->successful()) {
                $this->message = 'Product deleted successfully!';
                $this->errors = [];

                // Check if current page has only one item
                if (count($this->products) === 1 && $this->currentPage > 1) {
                    $this->fetchproducts($this->currentPage - 1);
                } else {
                    $this->fetchproducts($this->currentPage);
                }
            } else {
                $this->message = '';
                if ($response->status() === 401) {
                    $this->errors = ['auth' => 'Please login first'];
                } else {
                    $this->errors = ['server' => 'Something went wrong'];
                }
            }
        } catch (\Exception $e) {
            $this->message = '';
            $this->errors = ['connection' => 'Failed to connect to server'];
        }
    }
    public function resetForm()
    {
        $this->reset(['productName', 'productDescription', 'productImage']);
        $this->updateData = false;
    }
}
