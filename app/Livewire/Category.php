<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Category extends Component
{
    public $categories = [];
    public $categoryName;
    public $message;
    public $errors = [];
    public $currentPage = 1;
    public $lastPage;
    public $nextPageUrl;
    public $prevPageUrl;
    public $perPage = 10;
    public $sortField = 'category_name';
    public $sortDirection = 'asc';
    public $updateData = false;
    public $category_id;

    public function mount()
    {
        $this->fetchCategories();
    }

    public function fetchCategories($page = 1)
    {
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        // ])->get("http://localhost:8000/api/category", [
        ])->get("https://sinergi.dev.ybgee.my.id/api/category", [
            'page' => $page,
            'per_page' => $this->perPage,
            'order_by' => $this->sortField,
            'sort_by' => $this->sortDirection
        ]);

        if ($response->successful()) {
            // dd($response->json());
            $responseData = $response->json();
            if (isset($responseData['data'])) {
                $this->categories = $responseData['data']['categories'];
                $this->currentPage = $responseData['data']['pagination']['current_page'];
                $this->lastPage = $responseData['data']['pagination']['last_page'];
                $this->nextPageUrl = $responseData['data']['pagination']['next_page_url'];
                $this->prevPageUrl = $responseData['data']['pagination']['prev_page_url'];
            }
        }
    }

    public function store()
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            // ])->post('http://localhost:8000/api/category', [
            ])->post('https://sinergi.dev.ybgee.my.id/api/category', [
                'category_name' => $this->categoryName
            ]);

            if ($response->successful()) {
                $this->message = 'Category created successfully!';
                $this->errors = [];
                $this->reset(['categoryName']);
                $this->fetchCategories();
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

    public function edit($id)
    {
        $this->category_id = $id;
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        // Force fresh data fetch first
        $this->fetchCategories($this->currentPage);

        // Get latest data directly from the categories array
        $currentcategory = collect($this->categories)->first(function ($categories) use ($id) {
            return $categories['category_id'] === $id;
        });

        if ($currentcategory) {
            $this->reset(['categoryName']);
            $this->categoryName = $currentcategory['category_name'];
            $this->updateData = true;
        }
    }
    
    public function update()
{
    try {
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        // ])->patch("http://localhost:8000/api/category/{$this->category_id}", [
        ])->patch("https://sinergi.dev.ybgee.my.id/api/category/{$this->category_id}", [
            'category_name' => $this->categoryName,
        ]);

        if ($response->successful()) {
            $this->message = 'Category updated successfully!';
            $this->errors = [];
            $this->reset(['categoryName']);
            $this->updateData = false;
            $this->fetchCategories();
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


    public function delete($id)
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            // ])->delete("http://localhost:8000/api/category/{$id}");
            ])->delete("https://sinergi.dev.ybgee.my.id/api/category/{$id}");

            if ($response->successful()) {
                $this->message = 'Category deleted successfully!';
                $this->errors = [];

                // Check if current page has only one item
                if (count($this->categories) === 1 && $this->currentPage > 1) {
                    $this->fetchCategories($this->currentPage - 1);
                } else {
                    $this->fetchCategories($this->currentPage);
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
    public function resetForm(){
        $this->reset(['categoryName']);
        $this->updateData = false;
    }

    public function render()
    {
        return view('livewire.category');
    }
}
