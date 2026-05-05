<?php

namespace App\Livewire;

use LivewireUI\Modal\ModalComponent;

class HelloModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.hello-modal');
    }
}
