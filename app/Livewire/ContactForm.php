<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ContactForm extends Component
{
    public string $fullname = "";
    public string $email = "";
    public string $phone = "";
    public string $message = "";

    public function rules()
    {
        return [
            'fullname' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'phone' => ['required', 'min:10'],
            'message' => ['required', 'min:10'],
        ];
    }

    public function messages()
    {
        return [
            'fullname.required' => 'Please eneter your name',
            'email.required' => 'Please eneter your email',
            'email.required' => 'Please eneter your email',
            'email.email' => 'Please eneter valid email',
            'phone.required' => 'Please eneter phone number',
            'phone.min' => 'Phone number must be at least 10 digits',
            'message.required' => 'Please enter your message',
            'message.min' => 'Messaage must be at least 10 digits',
        ];
    }

    public function submit()
    {
        $validated = $this->validate();

        try {
            $response = Http::withHeaders([
                'Accept' => 'application/json',
                'Content-Type' => 'application/json'

            ])->post('https://sinergi.dev.ybgee.my.id/api/fq', [
                'fq_fullname' => $validated['fullname'],
                'fq_email' => $validated['email'],
                'fq_notelp' => $validated['phone'],
                'fq_desc' => $validated['message'],
            ]);
            Log::info('Contact Response :', [
                'response' => $response->json()
            ]);

            if ($response->successful()) {
                $this->reset();
                $this->dispatch('showToast', [
                    'message' => 'Message sent successfully',
                    'type' => 'success'
                ]);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            $this->dispatch('showToast', [
                'message' => 'Failed to send message. Please try again',
                'type' => 'error'
            ]);
        };
    }

    public function render()
    {
        return view('livewire.contact-form');
    }
}
