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

    public function mount(){
        $this->fetchServices();
    }

    public function fetchServices(){
        $response = Http::get('http://localhost:8000/api/service');
        if ($response->successful()) {
            $this->services = $response->json()['data'];
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
                )->post('http://localhost:8000/api/service', [
                    'service_name' => $this->serviceName,
                    'service_desc' => $this->serviceDescription,
                ]);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $token
                ])->post('http://localhost:8000/api/service', [
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
