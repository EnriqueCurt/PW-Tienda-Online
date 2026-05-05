<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar Filters -->
            <aside class="w-full md:w-64 space-y-8">
                <div>
                    <flux:heading size="lg" class="mb-4">Categorías</flux:heading>
                    <flux:navlist variant="outline">
                        <flux:navlist.item href="#" icon="chevron-right">Calzado</flux:navlist.item>
                        <flux:navlist.item href="#" icon="chevron-right">Ropa</flux:navlist.item>
                        <flux:navlist.item href="#" icon="chevron-right">Accesorios</flux:navlist.item>
                    </flux:navlist>
                </div>

                <div>
                    <flux:heading size="lg" class="mb-4">Precio</flux:heading>
                    <div class="space-y-4">
                        <flux:field variant="inline">
                            <flux:checkbox label="$0 - $50" />
                        </flux:field>
                        <flux:field variant="inline">
                            <flux:checkbox label="$50 - $150" />
                        </flux:field>
                        <flux:field variant="inline">
                            <flux:checkbox label="$150+" />
                        </flux:field>
                    </div>
                </div>

                <div>
                    <flux:heading size="lg" class="mb-4">Color</flux:heading>
                    <div class="flex flex-wrap gap-2">
                        @foreach(['bg-black', 'bg-white border', 'bg-red-500', 'bg-blue-500', 'bg-green-500'] as $color)
                            <button class="w-8 h-8 rounded-full {{ $color }} transition-transform hover:scale-110"></button>
                        @endforeach
                    </div>
                </div>
            </aside>

            <!-- Product Grid -->
            <div class="flex-1">
                <div class="flex items-center justify-between mb-8">
                    <flux:heading size="lg">Catálogo Completo</flux:heading>
                    <flux:select placeholder="Ordenar por" class="w-48">
                        <flux:select.option>Más recientes</flux:select.option>
                        <flux:select.option>Precio: Menor a Mayor</flux:select.option>
                        <flux:select.option>Precio: Mayor a Menor</flux:select.option>
                    </flux:select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @for($i = 1; $i <= 9; $i++)
                        <flux:card class="p-0 overflow-hidden group cursor-pointer" onclick="window.location='/detalle'">
                            <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 relative">
                                <img src="https://picsum.photos/seed/catprod{{ $i }}/600/600" alt="Producto" class="w-full h-full object-cover">
                                <flux:badge color="orange" class="absolute top-4 left-4">Popular</flux:badge>
                            </div>
                            <div class="p-6">
                                <flux:heading size="lg" class="mb-2">Zapatillas Pro Edition {{ $i }}</flux:heading>
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold text-brand-600">$149.99</span>
                                    <flux:button variant="ghost" icon="shopping-cart" size="sm" class="bg-zinc-100 dark:bg-zinc-800" />
                                </div>
                            </div>
                        </flux:card>
                    @endfor
                </div>

                <div class="mt-12 flex justify-center">
                    <flux:button variant="ghost" icon="chevron-down">Cargar más productos</flux:button>
                </div>
            </div>
        </div>
    </main>
</x-layouts.app>
