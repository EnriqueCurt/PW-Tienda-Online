<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
        <flux:link href="/catalogo" icon="arrow-left" class="mb-8">Volver al catálogo</flux:link>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 rounded-3xl overflow-hidden">
                    <img src="https://picsum.photos/seed/detail/1000/1000" alt="Producto" class="w-full h-full object-cover">
                </div>
                <div class="grid grid-cols-4 gap-4">
                    @for($i = 0; $i < 4; $i++)
                        <div class="aspect-square bg-zinc-200 dark:bg-zinc-700 rounded-xl overflow-hidden cursor-pointer hover:opacity-80">
                            <img src="https://picsum.photos/seed/thumb{{ $i }}/300/300" alt="Miniatura" class="w-full h-full object-cover">
                        </div>
                    @endfor
                </div>
            </div>

            <!-- Product Info -->
            <div class="flex flex-col">
                <flux:heading size="sm" class="text-brand-600 font-bold tracking-widest uppercase mb-2">Colección 2024</flux:heading>
                <flux:heading size="xl" level="1" class="text-4xl font-extrabold mb-4">Zapatillas Deportivas Ultra Elite</flux:heading>
                
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex text-amber-400">
                        @for($i = 0; $i < 5; $i++)
                            <flux:icon name="star" variant="solid" class="w-5 h-5" />
                        @endfor
                    </div>
                    <span class="text-zinc-500 text-sm">(48 reseñas)</span>
                </div>

                <flux:heading size="xl" class="text-3xl font-bold mb-8">$249.00</flux:heading>

                <p class="text-zinc-600 dark:text-zinc-400 text-lg mb-10 leading-relaxed">
                    Diseñadas para el máximo rendimiento y estilo. Estas zapatillas cuentan con tecnología de amortiguación avanzada y materiales transpirables de primera calidad. Perfectas tanto para el entrenamiento intenso como para el uso diario.
                </p>

                <div class="space-y-8 mb-10">
                    <div>
                        <flux:label class="mb-3 block text-sm font-bold uppercase">Selecciona tu talla</flux:label>
                        <div class="flex flex-wrap gap-3">
                            @foreach(['38', '39', '40', '41', '42', '43', '44'] as $size)
                                <button class="w-12 h-12 flex items-center justify-center border border-zinc-200 dark:border-zinc-800 rounded-xl hover:border-brand-500 hover:text-brand-600 transition-colors">
                                    {{ $size }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    <div class="flex gap-4">
                        <div class="flex items-center border border-zinc-200 dark:border-zinc-800 rounded-xl">
                            <button class="px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800">-</button>
                            <span class="px-4 font-bold">1</span>
                            <button class="px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800">+</button>
                        </div>
                        <flux:button variant="primary" size="sm" class="flex-1" icon="shopping-bag">Añadir al Carrito</flux:button>
                    </div>
                </div>

                <flux:card class="bg-zinc-50 dark:bg-zinc-900/50 border-none">
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <flux:icon name="truck" class="w-5 h-5 text-brand-600" />
                            <div>
                                <span class="font-bold text-sm">Envío Gratuito</span>
                                <p class="text-xs text-zinc-500">En pedidos superiores a $100</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <flux:icon name="arrow-path" class="w-5 h-5 text-brand-600" />
                            <div>
                                <span class="font-bold text-sm">Devoluciones Fáciles</span>
                                <p class="text-xs text-zinc-500">30 días para cambios y devoluciones</p>
                            </div>
                        </div>
                    </div>
                </flux:card>
            </div>
        </div>
    </main>
</x-layouts.app>
