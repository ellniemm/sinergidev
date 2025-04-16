<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Category extends Component
{
    public $categories = [];
    public $categoryName;
    public $message;
    public $errors = [];
    public $sortField = 'category_name';
    public $sortDirection = 'asc';
    public $updateData = false;
    public $category_id;

    public function mount()
    {
        $this->fetchCategories();
    }

    // public function fetchCategories($page = 1)
    // {
    //     $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

    //     $response = Http::withHeaders([
    //         'Accept' => 'application/json',
    //         'Authorization' => 'Bearer ' . $token
    //     // ])->get("http://localhost:8000/api/category", [
    //     ])->get("https://sinergi.dev.ybgee.my.id/api/category", [
    //         'page' => $page,
    //         'order_by' => $this->sortField,
    //         'sort_by' => $this->sortDirection
    //     ]);

    //     if ($response->successful()) {
    //         // dd($response->json());
    //         $responseData = $response->json();
    //         if (isset($responseData['data'])) {
    //             $this->categories = $responseData['data'];
    //         }
    //     }
    // }
    public function fetchCategories()
    {
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get("https://sinergi.dev.ybgee.my.id/api/category", [
            'order_by' => $this->sortField,
            'sort_by' => $this->sortDirection
        ]);

        if ($response->successful()) {
            // dd($response->json());
            $responseData = $response->json();
            if (isset($responseData['data'])) {
                $this->categories = $responseData['data'];
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
                $this->resetForm();
                $this->fetchCategories();
                Log::info('Store toast', [
                    'message' => 'Category created successfully',
                    'status' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'Category created successfully',
                    'status' => 'success'
                ]);
            } else {
                $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'message' => 'Failed to connect to server',
                'type' => 'error'
            ]);
        }
    }

    public function edit($id)
    {
        $this->category_id = $id;
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        // Force fresh data fetch first
        $this->fetchCategories();

        // Get latest data directly from the categories array
        $currentcategory = collect($this->categories)->first(function ($categories) use ($id) {
            return $categories['category_id'] === $id;
        });

        if ($currentcategory) {
            $this->category_id = $id;
            $this->categoryName = $currentcategory['category_name'] ?? '';
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
                $this->resetForm();
                $this->updateData = false;
                $this->fetchCategories();
                Log::info('Updated category',[
                    'message' => 'Category updated successfully',
                    'status' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'Category updated successfully',
                    'status' => 'success'
                ]);
            } else {
                $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'message' => 'Failed to connect to server',
                'type' => 'error'
            ]);
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
                $this->dispatch('showToast', [
                    'message' => 'Category deleted successfully',
                    'status' => 'success'
                ]);
                $this->fetchCategories();
            } else {
                $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'message' => 'Failed to connect to server',
                'type' => 'error'
            ]);
        }
    }
    // public function resetForm(){
    //     $this->reset(['categoryName']);
    //     $this->updateData = false;
    // }

    public function render()
    {
        return view('livewire.category');
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

    public function resetForm()
    {

        $this->reset([
            'categoryName',
            // 'categoryDescription', 
            // 'categoryImage', 
            'updateData',
            'category_id',
            'errors'
        ]);
        $this->updateData = false;
    }
}
