<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class User extends Component
{
    public $users = [];
    public $message;
    public $errors = [];
    public $currentPage = 1;
    public $lastPage;
    public $nextPageUrl;
    public $prevPageUrl;
    public $perPage = 10;
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function mount()
    {
        $this->fetchUsers();
       
    }

    public function fetchUsers($page = 1)
    {
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        // ])->get("http://localhost:8000/api/user", [
        ])->get("https://sinergi.dev.ybgee.my.id/api/user", [
            'page' => $page,
            'per_page' => $this->perPage,
            'order_by' => $this->sortField,
            'sort_by' => $this->sortDirection
        ]);

      

        if ($response->successful()) {
            // dd($response->json());
            $responseData = $response->json();
            if (isset($responseData['data'])) {
                $this->users = $responseData['data']['users'];
                $this->currentPage = $responseData['data']['pagination']['current_page'];
                $this->lastPage = $responseData['data']['pagination']['last_page'];
                $this->nextPageUrl = $responseData['data']['pagination']['next_page_url'];
                $this->prevPageUrl = $responseData['data']['pagination']['prev_page_url'];
            }
        }
    }


    public function updateStatus($id, $status)
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            // ])->patch("http://localhost:8000/api/user/{$id}/status", [
            ])->patch("https://sinergi.dev.ybgee.my.id/api/user/{$id}/status", [
                'status' => $status
            ]);

            if ($response->successful()) {
                $this->message = 'User status updated successfully!';
                $this->fetchUsers($this->currentPage);
            } else {
                $this->errors = ['update' => 'Failed to update user status'];
            }
        } catch (\Exception $e) {
            $this->errors = ['connection' => 'Failed to connect to server'];
        }
    }

    public function render()
    {
        return view('livewire.user');
    }
}
