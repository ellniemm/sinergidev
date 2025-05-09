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
    { 
        if (!is_array($data)) {
            $data = ['message' => $data, 'type' => 'success'];
        }

        
        Log::info('Toast processing started', [
            'current_show_state' => $this->show,
            'incoming_data' => $data
        ]);

        
        $this->show = false;
        $this->message = '';
        $this->type = 'success';
        
        
        usleep(200000); 
        
        
        $this->message = $data['message'] ?? '';
        $this->type = $data['type'] ?? 'success';
        $this->show = true;

        
        Log::info('Toast state after processing', [
            'message' => $this->message,
            'type' => $this->type,
            'show' => $this->show
        ]);
    
        
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
