<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-5xl mx-auto px-4 lg:px-8 py-12">
        <flux:heading size="xl" level="1" class="mb-10 text-4xl font-extrabold text-center">Finalizar Pedido</flux:heading>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16">
            <!-- Shipping Info -->
            <div class="space-y-10">
                <section>
                    <flux:heading size="lg" class="mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm">1</span>
                        Información de Envío
                    </flux:heading>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <flux:field class="col-span-2">
                            <flux:label>Nombre Completo</flux:label>
                            <flux:input placeholder="Juan Pérez" value="{{ Auth::user()->name }}" />
                        </flux:field>
                        <flux:field class="col-span-2">
                            <flux:label>Dirección</flux:label>
                            <flux:input placeholder="Calle Principal 123" />
                        </flux:field>
                        <flux:field>
                            <flux:label>Ciudad</flux:label>
                            <flux:input placeholder="Madrid" />
                        </flux:field>
                        <flux:field>
                            <flux:label>Código Postal</flux:label>
                            <flux:input placeholder="28001" />
                        </flux:field>
                    </div>
                </section>

                <section>
                    <flux:heading size="lg" class="mb-6 flex items-center gap-2">
                        <span class="w-8 h-8 bg-brand-600 text-white rounded-full flex items-center justify-center text-sm">2</span>
                        Método de Pago
                    </flux:heading>

                    <div class="space-y-4">
                        <flux:card class="border-2 border-brand-500 bg-brand-50/50 dark:bg-brand-900/10 p-4 relative cursor-pointer">
                            <div class="flex items-center gap-4">
                                <flux:icon.credit-card class="size-6 text-brand-600" />
                                <span class="font-bold text-zinc-900 dark:text-white">Tarjeta de Crédito / Débito</span>
                            </div>
                        </flux:card>
                        <flux:card class="p-4 cursor-pointer hover:border-zinc-300 dark:hover:border-zinc-700">
                            <div class="flex items-center gap-4">
                                <flux:icon.currency-dollar class="size-6 text-zinc-400" />
                                <span class="font-medium text-zinc-600 dark:text-zinc-400">PayPal</span>
                            </div>
                        </flux:card>
                    </div>
                </section>
            </div>

            <!-- Summary & Pay -->
            <div>
                <flux:card class="p-8 bg-zinc-900 border-none shadow-none">
                    <flux:heading size="lg" class="mb-6">Tu Pedido</flux:heading>
                    
                    <div class="space-y-6 mb-10">
                        @foreach($cart as $id => $item)
                            <div class="flex items-center gap-4">
                                <div class="w-16 h-16 bg-zinc-200 dark:bg-zinc-800 rounded-lg overflow-hidden shrink-0">
                                    <img src="{{ $item['image_url'] }}" alt="{{ $item['name'] }}" class="w-full h-full object-cover">
                                </div>
                                <div class="flex-1 min-w-0">
                                    <h4 class="font-bold text-sm truncate">{{ $item['name'] }}</h4>
                                    <p class="text-xs text-zinc-500">Cantidad: {{ $item['quantity'] }}</p>
                                </div>
                                <span class="font-bold">${{ number_format($item['price'] * $item['quantity'], 2) }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="space-y-4 border-t border-zinc-200 dark:border-zinc-800 pt-6 mb-8">
                        <div class="flex justify-between text-zinc-600">
                            <span>Subtotal</span>
                            <span>${{ number_format($total, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-zinc-600">
                            <span>Envío</span>
                            <span class="text-emerald-600">Gratis</span>
                        </div>
                        <div class="flex justify-between text-xl font-bold pt-4">
                            <span>Total</span>
                            <span class="text-brand-600">${{ number_format($total, 2) }}</span>
                        </div>
                    </div>

                    <flux:button variant="primary" class="w-full" icon="lock-closed">
                        Pagar Ahora ${{ number_format($total, 2) }}
                    </flux:button>
                    <p class="text-center text-xs text-zinc-400 mt-6 flex items-center justify-center gap-1">
                        <flux:icon.shield-check class="size-4" />
                        Pago 100% seguro y encriptado
                    </p>
                </flux:card>
            </div>
        </div>
    </main>
</x-layouts.app>
