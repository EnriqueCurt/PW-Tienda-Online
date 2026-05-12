<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Sidebar Filters -->
            <aside class="w-full md:w-64 space-y-8">
                <div>
                    <flux:heading size="lg" class="mb-4">Categorías</flux:heading>
                    <flux:navlist variant="outline">
                        @foreach($categories as $category)
                            <flux:navlist.item 
                                href="{{ route('categoria', $category) }}" 
                                icon="chevron-right"
                                :current="isset($currentCategory) && $currentCategory->id === $category->id"
                            >
                                {{ $category->name }}
                            </flux:navlist.item>
                        @endforeach
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
            </aside>

            <!-- Product Grid -->
            <div class="flex-1">
                <div class="flex items-center justify-between mb-8">
                    <flux:heading size="lg">
                        {{ isset($currentCategory) ? $currentCategory->name : 'Catálogo Completo' }}
                    </flux:heading>
                    <flux:select placeholder="Ordenar por" class="w-48">
                        <flux:select.option>Más recientes</flux:select.option>
                        <flux:select.option>Precio: Menor a Mayor</flux:select.option>
                        <flux:select.option>Precio: Mayor a Menor</flux:select.option>
                    </flux:select>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @forelse($products as $product)
                        <flux:card class="p-0 overflow-hidden group relative">
                            <a href="{{ route('detalle', $product) }}" wire:navigate class="block">
                                <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 relative">
                                    <img src="{{ $product->image_url ?? 'https://picsum.photos/seed/'.$product->id.'/600/600' }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    @if($product->stock < 5 && $product->stock > 0)
                                        <flux:badge color="orange" class="absolute top-4 left-4">¡Pocas unidades!</flux:badge>
                                    @elseif($product->stock == 0)
                                        <flux:badge color="zinc" class="absolute top-4 left-4">Agotado</flux:badge>
                                    @endif
                                </div>
                                <div class="p-6 pb-0">
                                    <flux:heading size="sm" class="text-zinc-500 uppercase tracking-widest text-xs font-bold mb-1">{{ $product->category->name }}</flux:heading>
                                    <flux:heading size="lg" class="mb-2 truncate group-hover:text-brand-600 transition-colors">{{ $product->name }}</flux:heading>
                                </div>
                            </a>
                            <div class="p-6 pt-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-xl font-bold text-brand-600">${{ number_format($product->price, 2) }}</span>
                                    <div class="flex gap-2">
                                        @if(Auth::user()?->isAdmin())
                                            <flux:button variant="ghost" icon="pencil-square" size="sm" class="bg-zinc-100 dark:bg-zinc-800 rounded-full" href="{{ route('admin.products.edit', $product) }}" />
                                        @endif
                                        <livewire:add-to-cart :product="$product" />
                                    </div>
                                </div>
                            </div>
                        </flux:card>
                    @empty
                        <div class="col-span-full text-center py-20">
                            <flux:icon.shopping-bag class="size-12 mx-auto text-zinc-300 mb-4" />
                            <flux:heading size="lg">No se encontraron productos</flux:heading>
                            <flux:subheading>Intenta con otros filtros o categorías.</flux:subheading>
                        </div>
                    @endforelse
                </div>

                <div class="mt-12">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </main>

    @include('partials.store.footer')
</x-layouts.app>
