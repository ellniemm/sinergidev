<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;

class Service extends Component
{
    use WithFileUploads;
    public $serviceName;
    public $serviceDescription;
    public $serviceImage;
    public $errors = [];
    public $services = [];
    public $message;

    public $currentPage = 1;
    public $lastPage;
    public $nextPageUrl;
    public $prevPageUrl;
    public $perPage = 2; 

    public $sortDirection = 'asc';
    public $updateData = false;
    public $service_id;
    public $sortField = 'service_name';


    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortField = $field;
            $this->sortDirection = 'asc';
        }

        $this->fetchServices(1);
    }


    public function mount()
    {
        $this->fetchServices();
    }

    public function fetchServices($page = 1)
    {
        
        $response = Http::get("https://sinergi.dev.ybgee.my.id/api/service", [
            'page' => $page,
            'per_page' => $this->perPage,
            'order_by' => $this->sortField,
            'sort_by' => $this->sortDirection
        ]);

        if ($response->successful()) {
            
            $responseData = $response->json();
            if (isset($responseData['data'])) {
                $this->services = $responseData['data']['services'];
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
            $this->fetchServices($this->currentPage + 1);
        }
    }

    public function prevPage()
    {
        if ($this->currentPage > 1) {
            $this->fetchServices($this->currentPage - 1);
        }
    }

    public function resetForm()
    {

        $this->reset([
            'serviceName',
            'serviceDescription',
            'serviceImage',
            'updateData',
            'service_id',
            'errors'
        ]);
        $this->updateData = false;
    }

    public function render()
    {
        return view('livewire.service');
    }

    public function store()
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            if ($this->serviceImage) {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->attach(
                    'service_img',
                    file_get_contents($this->serviceImage->path()),
                    $this->serviceImage->getClientOriginalName()
                )->post('https://sinergi.dev.ybgee.my.id/api/service', [
                    'service_name' => $this->serviceName,
                    'service_desc' => $this->serviceDescription,
                ]);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->post('https://sinergi.dev.ybgee.my.id/api/service', [
                    'service_name' => $this->serviceName,
                    'service_desc' => $this->serviceDescription,
                ]);
            }

            if ($response->successful()) {
                $this->resetForm();
                $this->fetchServices();
                Log::info('Dispatching toast', [
                    'message' => 'Data berhasil ditambahkan!',
                    'type' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'Data berhasil ditambahkan!',
                    'type' => 'success'
                ]);
            } else {
                $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'message' => 'Gagal terhubung ke server. Periksa koneksi internet Anda.',
                'type' => 'error'
            ]);
        }
    }

    public function edit($id)
    {
        
        $serviceFromCurrentData = collect($this->services)->firstWhere('service_id', $id);

        if ($serviceFromCurrentData) {
            
            $this->service_id = $id;
            $this->serviceName = $serviceFromCurrentData['service_name'];
            $this->serviceDescription = $serviceFromCurrentData['service_desc'];
            $this->serviceImage = $serviceFromCurrentData['service_img'];
            $this->updateData = true;

            Log::info('Edit method - Using data from current fetch', [
                'service_id' => $this->service_id,
                'serviceName' => $this->serviceName,
                'serviceDescription' => $this->serviceDescription,
                'serviceImage' => $this->serviceImage
            ]);
        } else {
            
            $response = Http::get("https://sinergi.dev.ybgee.my.id/api/service/{$id}");

            if ($response->successful()) {
                $data = $response->json();

                
                $this->service_id = $id;
                $this->serviceName = $data['data']['service_name'];
                $this->serviceDescription = $data['data']['service_desc'];
                $this->serviceImage = $data['data']['service_img'];
                $this->updateData = true;

                Log::info('Edit method - Fetched fresh data from API', [
                    'service_id' => $this->service_id,
                    'serviceName' => $this->serviceName,
                    'serviceDescription' => $this->serviceDescription,
                    'serviceImage' => $this->serviceImage
                ]);
            } else {
                $this->dispatch('showToast', [
                    'message' => 'Service tidak ditemukan',
                    'type' => 'error'
                ]);
            }
        }
    }

    public function update()
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            if ($this->serviceImage && !is_string($this->serviceImage)) {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->attach(
                    'service_img',
                    file_get_contents($this->serviceImage->path()),
                    $this->serviceImage->getClientOriginalName()
                    
                )->post("https://sinergi.dev.ybgee.my.id/api/service/{$this->service_id}", [
                    '_method' => 'PATCH',
                    'service_name' => $this->serviceName,
                    'service_desc' => $this->serviceDescription,
                ]);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                    
                ])->patch("https://sinergi.dev.ybgee.my.id/api/service/{$this->service_id}", [
                    '_method' => 'PATCH',
                    'service_name' => $this->serviceName,
                    'service_desc' => $this->serviceDescription,
                ]);
            }


            if ($response->successful()) {
                $this->resetForm();
                $this->fetchServices();
                $this->updateData = false;
                Log::info('Dispatching toast', [
                    'message' => 'Data berhasil diupdate!',
                    'type' => 'success'
                ]);
                $this->dispatch('showToast', [
                    'message' => 'Data berhasil diupdate!',
                    'type' => 'success'
                ]);
            } else {
                $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            $this->dispatch('showToast', [
                'message' => 'Gagal terhubung ke server. Periksa koneksi internet Anda.',
                'type' => 'error'
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $token = isset($_COOKIE['authToken']) ? $_COOKIE['authToken'] : null;

            if (!$token) {
                $this->dispatch('showToast', [
                    'message' => 'Token tidak ditemukan. Silakan login kembali.',
                    'type' => 'error'
                ]);
                return;
            }

            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Authorization' => 'Bearer ' . $token
            ])->delete("https://sinergi.dev.ybgee.my.id/api/service/{$id}");

            if ($response->successful()) {
                $this->dispatch('showToast', [
                    'message' => 'Data berhasil dihapus!',
                    'type' => 'success'
                ]);

                if (count($this->services) === 1 && $this->currentPage > 1) {
                    $this->fetchServices($this->currentPage - 1);
                } else {
                    $this->fetchServices($this->currentPage);
                }
            } else {
                $this->handleErrorResponse($response);
            }
        } catch (\Exception $e) {
            Log::error('Delete service error:', [
                'service_id' => $id,
                'error' => $e->getMessage()
            ]);

            $this->dispatch('showToast', [
                'message' => 'Gagal menghapus data. Silakan coba lagi.',
                'type' => 'error'
            ]);
        }
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
