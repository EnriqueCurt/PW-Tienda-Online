<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class Toast extends Component
{
    public $message = '';
    public $show = false;

    #[On('notify')]
    public function notify($message)
    {
        $this->message = $message;
        $this->show = true;

        // Auto hide after 3 seconds
        $this->dispatch('hide-toast');
    }

    public function render()
    {
        return view('livewire.toast');
    }
}
