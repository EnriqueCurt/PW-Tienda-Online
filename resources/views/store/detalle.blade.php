<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
        <flux:link href="{{ route('catalogo') }}" icon="arrow-left" class="mb-8">Volver al catálogo</flux:link>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Product Images -->
            <div class="space-y-4">
                <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 rounded-3xl overflow-hidden">
                    <img src="{{ $product->image_url ?? 'https://picsum.photos/seed/'.$product->id.'/1000/1000' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                </div>
            </div>

            <!-- Product Info -->
            <div class="flex flex-col">
                <flux:heading size="sm" class="text-brand-600 font-bold tracking-widest uppercase mb-2">{{ $product->category->name }}</flux:heading>
                <div class="flex justify-between items-start mb-4">
                    <flux:heading size="xl" level="1" class="text-4xl font-extrabold">{{ $product->name }}</flux:heading>
                    @if(Auth::user()?->isAdmin())
                        <flux:button variant="ghost" icon="pencil-square" href="{{ route('admin.products.edit', $product) }}">Editar</flux:button>
                    @endif
                </div>
                
                <div class="flex items-center gap-4 mb-6">
                    <div class="flex text-amber-400">
                        @for($i = 0; $i < 5; $i++)
                            <flux:icon.star variant="solid" class="size-5" />
                        @endfor
                    </div>
                    <span class="text-zinc-500 text-sm">(Basado en opiniones reales)</span>
                </div>

                <flux:heading size="xl" class="text-3xl font-bold mb-8">${{ number_format($product->price, 2) }}</flux:heading>

                <p class="text-zinc-600 dark:text-zinc-400 text-lg mb-10 leading-relaxed">
                    {{ $product->description ?? 'No hay descripción disponible para este producto en este momento. Sin embargo, garantizamos la máxima calidad y satisfacción con cada compra en nuestra tienda.' }}
                </p>

                <div class="space-y-8 mb-10">
                    <div>
                        <flux:label class="mb-3 block text-sm font-bold uppercase">Estado del Inventario</flux:label>
                        @if($product->stock > 0)
                            <flux:badge color="green">{{ $product->stock }} unidades disponibles</flux:badge>
                        @else
                            <flux:badge color="red">Agotado temporalmente</flux:badge>
                        @endif
                    </div>

                    <div class="flex gap-4">
                        @if($product->stock > 0)
                            <div class="flex items-center border border-zinc-200 dark:border-zinc-800 rounded-xl">
                                <button class="px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800">-</button>
                                <span class="px-4 font-bold">1</span>
                                <button class="px-4 py-2 hover:bg-zinc-100 dark:hover:bg-zinc-800">+</button>
                            </div>
                            <livewire:add-to-cart :product="$product" variant="button" />
                        @else
                            <flux:button variant="primary" class="flex-1" disabled icon="bell">Avisarme cuando haya stock</flux:button>
                        @endif
                    </div>
                </div>

                <flux:card class="bg-zinc-50 dark:bg-zinc-900/50 border-none">
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <flux:icon.truck class="size-5 text-brand-600" />
                            <div>
                                <span class="font-bold text-sm">Envío Rápido</span>
                                <p class="text-xs text-zinc-500">Recíbelo en 24-48 horas laborables.</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-3">
                            <flux:icon.arrow-path class="size-5 text-brand-600" />
                            <div>
                                <span class="font-bold text-sm">Garantía de Satisfacción</span>
                                <p class="text-xs text-zinc-500">30 días para cambios y devoluciones sin preguntas.</p>
                            </div>
                        </div>
                    </div>
                </flux:card>
            </div>
        </div>

        <!-- Related Products -->
        @if($relatedProducts->count() > 0)
            <div class="mt-24">
                <flux:heading size="xl" class="mb-12">Productos Relacionados</flux:heading>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($relatedProducts as $related)
                        <flux:card class="p-0 overflow-hidden group" href="{{ route('detalle', $related) }}">
                            <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 relative">
                                <img src="{{ $related->image_url ?? 'https://picsum.photos/seed/'.$related->id.'/600/600' }}" alt="{{ $related->name }}" class="w-full h-full object-cover">
                            </div>
                            <div class="p-6">
                                <flux:heading size="lg" class="mb-2 truncate">{{ $related->name }}</flux:heading>
                                <span class="text-xl font-bold text-brand-600">${{ number_format($related->price, 2) }}</span>
                            </div>
                        </flux:card>
                    @endforeach
                </div>
            </div>
        @endif
    </main>

    @include('partials.store.footer')
</x-layouts.app>
