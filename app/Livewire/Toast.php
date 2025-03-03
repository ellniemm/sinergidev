<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\On;
use Livewire\Component;

class Toast extends Component
{
    public $message = '';
    public $type = 'success';
    public $show = false;

    #[On('showToast')]
    public function showToast($data)
    { // Pastikan data adalah array
        if (!is_array($data)) {
            $data = ['message' => $data, 'type' => 'success'];
        }

        // Log detail sebelum proses
        Log::info('Toast processing started', [
            'current_show_state' => $this->show,
            'incoming_data' => $data
        ]);

        // Reset state toast secara eksplisit
        $this->show = false;
        $this->message = '';
        $this->type = 'success';
        
        // Tambahkan sedikit delay
        usleep(200000); // 200ms delay
        
        // Set ulang data
        $this->message = $data['message'] ?? '';
        $this->type = $data['type'] ?? 'success';
        $this->show = true;

        // Log detail setelah proses
        Log::info('Toast state after processing', [
            'message' => $this->message,
            'type' => $this->type,
            'show' => $this->show
        ]);
    
        // Dispatch ke frontend agar toast otomatis hilang setelah 3 detik
        $this->dispatch('hideToast')->to('toast');
    }
    

    public function hideToast()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
