<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class CartBadge extends Component
{
    public int $count = 0;

    public function mount()
    {
        $this->updateCount();
    }

    #[On('cart-updated')]
    public function updateCount()
    {
        $cart = session()->get('cart', []);
        $this->count = collect($cart)->sum('quantity');
    }

    public function render()
    {
        return view('livewire.cart-badge');
    }
}
