<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class User extends Component
{
    public $users = [];
    public $message;
    public $errors = [];
    public $sortField = 'created_at';
    public $sortDirection = 'desc';

    public function mount()
    {
        $this->fetchUsers();
    }

    public function fetchUsers()
    {
        $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

        // Request all users by setting a very high per_page value
        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Authorization' => 'Bearer ' . $token
        ])->get("https://sinergi.dev.ybgee.my.id/api/user", [
            'per_page' => 1000, // Set a high number to get all users
            'order_by' => $this->sortField,
            'sort_by' => $this->sortDirection
        ]);

        if ($response->successful()) {
            $responseData = $response->json();
            if (isset($responseData['data'])) {
                $this->users = $responseData['data']['users'];
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
            ])->patch("https://sinergi.dev.ybgee.my.id/api/user/{$id}/status", [
                'status' => $status
            ]);

            if ($response->successful()) {
                $this->fetchUsers();
                Log::info('Dispatching toast', [
                    'message' => 'User status updated successfully',
                    'type' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'User status updated successfully',
                    'type' => 'success'
                ]);
            } else {
                $this->dispatch('showToast', [
                    'message' => 'Failed to update user status',
                    'type' => 'error'
                ]);
            }
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'message' => 'Failed to connect to server.',
                'type' => 'error'
            ]);
        }
    }

    public function render()
    {
        return view('livewire.user');
    }
}
