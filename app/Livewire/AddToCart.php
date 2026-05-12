<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;

class AddToCart extends Component
{
    public Product $product;
    public string $variant = 'icon'; // 'icon' (e.g. in home cards) or 'button' (e.g. in detail view)

    public function add()
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$this->product->id])) {
            $cart[$this->product->id]['quantity']++;
        } else {
            $cart[$this->product->id] = [
                'name' => $this->product->name,
                'price' => $this->product->price,
                'image_url' => $this->product->image_url ?? 'https://picsum.photos/seed/'.$this->product->id.'/600/600',
                'quantity' => 1,
            ];
        }

        session()->put('cart', $cart);

        // Dispara evento para que se actualice el CartBadge
        $this->dispatch('cart-updated');
        
        // Notificación visual
        $this->dispatch('notify', '¡Producto añadido al carrito!');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
