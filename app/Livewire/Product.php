<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
    public $perPage = 10;

    public $sortDirection = 'desc';
    public $updateData = false;
    public $product_id;
    public $sortField = 'product_name';

    protected $listeners = ['resetForm',];

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
        // $response = Http::get("http://localhost:8000/api/product", [
        $response = Http::get("https://sinergi.dev.ybgee.my.id/api/product", [
            'page' => $page,
            'per_page' => $this->perPage,
            'order_by' => $this->sortField,
            'sort_by' => $this->sortDirection
        ]);

        if ($response->successful()) {
            // dd($response->json());
            $responseData = $response->json();
            if (isset($responseData['data'])) {
                $this->products = $responseData['data']['products'];
                $this->currentPage = $responseData['data']['pagination']['current_page'];
                $this->lastPage = $responseData['data']['pagination']['last_page'];
                $this->nextPageUrl = $responseData['data']['pagination']['next_page_url'];
                $this->prevPageUrl = $responseData['data']['pagination']['prev_page_url'];
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
        $this->errors = [];
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
                    // )->post('http://localhost:8000/api/product', [
                )->post('https://sinergi.dev.ybgee.my.id/api/product', [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                    // ])->post('http://localhost:8000/api/product', [
                ])->post('https://sinergi.dev.ybgee.my.id/api/product', [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            }

            if ($response->successful()) {
                $this->resetForm();
                $this->fetchProducts();
                Log::info('Dispatching toast', [
                    'message' => 'Data berhasil ditambahkan!',
                    'type' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'Data berhasil ditambahkan!', 
                    'type' => 'success'
                ]);

                $this->dispatch('reset');
            } else {
               // Tangani error dengan lebih detail
               $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'message' => 'Gagal terhubung ke server. Periksa koneksi internet Anda.', 
                'type' => 'error'
            ]);
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
    // Pertama, refresh data produk dengan fetchProducts
    $this->fetchProducts();

    // Cari produk yang baru saja diupdate dari daftar produk
    $updatedProduct = collect($this->products)
        ->first(function ($product) use ($id) {
            return $product['product_id'] == $id;
        });

    if ($updatedProduct) {
        // Set data produk terbaru
        $this->product_id = $id;
        $this->productName = $updatedProduct['product_name'] ?? '';
        $this->productDescription = $updatedProduct['product_desc'] ?? '';
        $this->productImage = $updatedProduct['product_img'] ?? '';
        $this->updateData = true;

        // Log untuk debugging
        Log::info('Edit method - Updated Product Data', [
            'product_id' => $this->product_id,
            'productName' => $this->productName,
            'productDescription' => $this->productDescription,
            'productImage' => $this->productImage
        ]);
    } else {
        // Tangani jika produk tidak ditemukan
        Log::warning('Product not found in updated list', [
            'searched_id' => $id
        ]);

        $this->dispatch('showToast', [
            'message' => 'Produk tidak ditemukan', 
            'type' => 'error'
        ]);
    }
}



    public function update()
    {
         // Reset errors sebelum operasi
         $this->errors = [];
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
                    // )->patch("http://localhost:8000/api/product/{$this->product_id}", [
                )->patch("https://sinergi.dev.ybgee.my.id/api/product/{$this->product_id}", [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                    // ])->patch("http://localhost:8000/api/product/{$this->product_id}", [
                ])->patch("https://sinergi.dev.ybgee.my.id/api/product/{$this->product_id}", [
                    'product_name' => $this->productName,
                    'product_desc' => $this->productDescription,
                ]);
            }


            if ($response->successful()) {
                $this->resetForm();
                $this->updateData = false;
                $this->fetchProducts();
                Log::info('Dispatching toast', [
                    'message' => 'Data berhasil diupdate!',
                    'type' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'Data berhasil diupdate!', 
                    'type' => 'success'
                ]);
                
            } else {
                // Tangani error dengan lebih detail
                $this->handleErrorResponse($response);
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
                // ])->delete("http://localhost:8000/api/product/{$id}");
            ])->delete("https://sinergi.dev.ybgee.my.id/api/product/{$id}");

            if ($response->successful()) {

                Log::info('Dispatching toast', [
                    'message' => 'Data berhasil dihapus!',
                    'type' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'Data berhasil dihapus!', 
                    'type' => 'success'
                ]);
                

                // Check if current page has only one item
                if (count($this->products) === 1 && $this->currentPage > 1) {
                    $this->fetchproducts($this->currentPage - 1);
                } else {
                    $this->fetchproducts($this->currentPage);
                }
            } else {
                // Tangani error dengan lebih detail
                $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            $this->message = '';
            $this->errors = ['connection' => 'Failed to connect to server'];
        }
    }
    public function resetForm()
    {

        $this->reset([
            'productName', 
            'productDescription', 
            'productImage', 
            'updateData', 
            'product_id',
            'errors'
        ]);
        $this->updateData = false;
    }

    private function handleErrorResponse($response)
    {
        $errorMessage = 'Terjadi kesalahan';
        $errorType = 'error';

        if ($response->status() === 422) {
            $errorMessage = 'Validasi gagal. Periksa kembali input Anda.';
            $this->errors = $response->json()['errors'] ?? [];
        } elseif ($response->status() === 401) {
            $errorMessage = 'Anda harus login terlebih dahulu';
            $errorType = 'warning';
        }

        $this->dispatch('showToast', [
            'message' => $errorMessage, 
            'type' => $errorType
        ]);
    }
}
