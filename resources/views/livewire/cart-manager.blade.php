<div class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
    <flux:heading size="xl" class="mb-8">Tu Carrito</flux:heading>

    @if(count($cart) > 0)
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <div class="lg:col-span-2 space-y-6">
                @foreach($cart as $id => $item)
                    <flux:card class="flex items-center gap-6 p-4">
                        <div class="w-24 h-24 bg-zinc-100 dark:bg-zinc-800 rounded-xl overflow-hidden shrink-0">
                            <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                        </div>

                        <div class="flex-1 min-w-0">
                            <flux:heading size="lg" class="truncate">{{ $item['name'] }}</flux:heading>
                            <span class="text-brand-600 font-bold">${{ number_format($item['price'], 2) }}</span>
                        </div>

                        <div class="flex items-center border border-zinc-200 dark:border-zinc-800 rounded-lg">
                            <button wire:click="decrement({{ $id }})" class="px-3 py-1 hover:bg-zinc-100 dark:hover:bg-zinc-800">-</button>
                            <span class="px-3 font-medium">{{ $item['quantity'] }}</span>
                            <button wire:click="increment({{ $id }})" class="px-3 py-1 hover:bg-zinc-100 dark:hover:bg-zinc-800">+</button>
                        </div>

                        <div class="text-right min-w-[80px]">
                            <span class="font-bold">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                        </div>

                        <flux:button variant="ghost" icon="trash" class="text-red-500" wire:click="remove({{ $id }})" />
                    </flux:card>
                @endforeach

                <div class="flex justify-between items-center pt-6">
                    <flux:button variant="ghost" icon="trash" wire:click="clear">Vaciar carrito</flux:button>
                    <flux:button href="/catalogo" variant="ghost" icon="arrow-left">Continuar comprando</flux:button>
                </div>
            </div>

            <div class="space-y-6">
                <flux:card class="p-8 space-y-6 bg-zinc-50 dark:bg-zinc-900/50">
                    <flux:heading size="lg">Resumen del pedido</flux:heading>
                    
                    <div class="space-y-4 text-sm">
                        <div class="flex justify-between">
                            <span class="text-zinc-500">Subtotal</span>
                            <span class="font-medium">${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-zinc-500">Envío</span>
                            <span class="font-medium text-green-600">Gratis</span>
                        </div>
                        <div class="pt-4 border-t border-zinc-200 dark:border-zinc-800 flex justify-between">
                            <span class="text-lg font-bold">Total</span>
                            <span class="text-lg font-bold text-brand-600">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <flux:button variant="primary" class="w-full" href="/checkout">Tramitar Pedido</flux:button>
                </flux:card>

                <div class="flex items-center gap-3 px-4 text-zinc-500 text-sm">
                    <flux:icon.shield-check class="size-5" />
                    <span>Pago 100% seguro y garantizado</span>
                </div>
            </div>
        </div>
    @else
        <div class="text-center py-20 bg-zinc-50 dark:bg-zinc-900/50 rounded-3xl border-2 border-dashed border-zinc-200 dark:border-zinc-800">
            <flux:icon.shopping-bag class="size-16 mx-auto text-zinc-300 mb-6" />
            <flux:heading size="xl" class="mb-4">Tu carrito está vacío</flux:heading>
            <flux:subheading class="mb-8">¡Añade algunos productos premium para empezar!</flux:subheading>
            <flux:button variant="primary" href="/catalogo">Ver Catálogo</flux:button>
        </div>
    @endif
</div>
