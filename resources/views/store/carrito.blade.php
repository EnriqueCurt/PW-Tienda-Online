<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
        <flux:heading size="xl" level="1" class="mb-10 text-4xl font-extrabold">Tu Carrito</flux:heading>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Cart Items -->
            <div class="lg:col-span-2 space-y-6">
                @for($i = 1; $i <= 2; $i++)
                    <flux:card class="flex flex-col sm:flex-row gap-6 p-6">
                        <div class="w-32 h-32 bg-zinc-100 dark:bg-zinc-800 rounded-2xl flex-shrink-0 overflow-hidden">
                            <img src="https://picsum.photos/seed/cart{{ $i }}/300/300" alt="Producto" class="w-full h-full object-cover">
                        </div>
                        <div class="flex-1">
                            <div class="flex justify-between items-start mb-2">
                                <flux:heading size="lg">Zapatillas Ultra Elite v{{ $i }}</flux:heading>
                                <flux:button variant="ghost" icon="trash" size="sm" class="text-rose-500 hover:bg-rose-50 dark:hover:bg-rose-900/20" />
                            </div>
                            <p class="text-zinc-500 text-sm mb-4">Talla: 42 | Color: Negro</p>
                            <div class="flex items-center justify-between mt-auto">
                                <div class="flex items-center border border-zinc-200 dark:border-zinc-800 rounded-lg">
                                    <button class="px-3 py-1">-</button>
                                    <span class="px-3 font-bold">1</span>
                                    <button class="px-3 py-1">+</button>
                                </div>
                                <span class="text-xl font-bold">$124.50</span>
                            </div>
                        </div>
                    </flux:card>
                @endfor

                <div class="pt-6">
                    <flux:link href="/catalogo" icon="arrow-left">Continuar comprando</flux:link>
                </div>
            </div>

            <!-- Order Summary -->
            <div>
                <flux:card class="p-8 sticky top-24">
                    <flux:heading size="lg" class="mb-6">Resumen del Pedido</flux:heading>
                    
                    <div class="space-y-4 mb-8">
                        <div class="flex justify-between text-zinc-600 dark:text-zinc-400">
                            <span>Subtotal</span>
                            <span>$249.00</span>
                        </div>
                        <div class="flex justify-between text-zinc-600 dark:text-zinc-400">
                            <span>Envío</span>
                            <span class="text-emerald-600 font-medium">Gratis</span>
                        </div>
                        <div class="flex justify-between text-zinc-600 dark:text-zinc-400">
                            <span>Impuestos (estimados)</span>
                            <span>$0.00</span>
                        </div>
                        <div class="border-t border-zinc-100 dark:border-zinc-800 pt-4 mt-4">
                            <div class="flex justify-between text-xl font-bold">
                                <span>Total</span>
                                <span>$249.00</span>
                            </div>
                        </div>
                    </div>

                    <flux:button variant="primary" class="w-full" href="/checkout">
                        Proceder al Pago
                    </flux:button>

                    <div class="mt-6 flex justify-center gap-4 opacity-50">
                        <flux:icon name="credit-card" class="w-8 h-8" />
                        <flux:icon name="banknotes" class="w-8 h-8" />
                    </div>
                </flux:card>
            </div>
        </div>
    </main>
</x-layouts.app>
