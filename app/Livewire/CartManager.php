<?php

namespace App\Livewire;

use Livewire\Component;

class CartManager extends Component
{
    public $cart = [];
    public $total = 0;

    public function mount()
    {
        $this->updateCart();
    }

    public function updateCart()
    {
        $this->cart = session()->get('cart', []);
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = collect($this->cart)->sum(function($item) {
            return $item['price'] * $item['quantity'];
        });
    }

    public function increment($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
            session()->put('cart', $cart);
            $this->updateCart();
            $this->dispatch('cart-updated');
        }
    }

    public function decrement($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            if ($cart[$productId]['quantity'] > 1) {
                $cart[$productId]['quantity']--;
            } else {
                unset($cart[$productId]);
            }
            session()->put('cart', $cart);
            $this->updateCart();
            $this->dispatch('cart-updated');
        }
    }

    public function remove($productId)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session()->put('cart', $cart);
            $this->updateCart();
            $this->dispatch('cart-updated');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        $this->updateCart();
        $this->dispatch('cart-updated');
    }

    public function render()
    {
        return view('livewire.cart-manager');
    }
}
