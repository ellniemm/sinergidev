<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
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
    public $perPage = 3; // Atur jumlah item per halaman

    public function mount()
    {
        $this->fetchServices();
    }

    public function fetchServices($page = 1) // Default ke halaman 1 jika tidak ada parameter
    {

        $response = Http::get("https://sinergi.dev.ybgee.my.id/api/service?page={$page}&per_page={$this->perPage}");

        if ($response->successful()) {
            $responseData = $response->json();

            if (isset($responseData['data'])) {
                $this->services = $responseData['data']['data'];
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
            $this->fetchServices($this->currentPage + 1);
        }
    }

    public function prevPage()
    {
        if ($this->currentPage > 1) {
            $this->fetchServices($this->currentPage - 1);
        }
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
                $this->message = 'Service created successfully!';
                $this->errors = []; // Clear any existing errors
                $this->reset(['serviceName', 'serviceDescription', 'serviceImage']);
                $this->fetchServices();
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
}
