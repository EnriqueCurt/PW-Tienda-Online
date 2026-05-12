<x-layouts.app>
    @include('partials.store.navbar')

    <main>
        <!-- Hero Section -->
        <section class="relative min-h-[80vh] flex items-center overflow-hidden bg-zinc-950 text-white">
            <div class="absolute inset-0 z-0">
                <img src="https://images.unsplash.com/photo-1556906781-9a412961c28c?q=80&w=2000&auto=format&fit=crop" alt="Hero background" class="w-full h-full object-cover opacity-40">
                <div class="absolute inset-0 bg-gradient-to-r from-zinc-950 via-zinc-950/80 to-transparent"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 lg:px-8 relative z-10 w-full">
                <div class="max-w-3xl">
                    <flux:badge color="brand" class="mb-6 px-4 py-1 text-sm font-bold tracking-widest uppercase">Colección Exclusiva 2026</flux:badge>
                    <flux:heading size="xl" class="text-white mb-6 text-6xl md:text-8xl font-black tracking-tight leading-[1.1]">
                        REDEFINE TU <span class="text-brand-500 italic">ESTILO</span>
                    </flux:heading>
                    <flux:subheading class="text-zinc-400 mb-10 text-xl md:text-2xl max-w-xl leading-relaxed">
                        Explora la fusión perfecta entre diseño vanguardista y calidad suprema. Creado para quienes dictan tendencia.
                    </flux:subheading>
                    <div class="flex flex-col sm:flex-row gap-6">
                        <flux:button variant="primary" href="/catalogo" class="px-10 py-4 text-lg font-bold">Comprar Ahora</flux:button>
                        <flux:button variant="ghost" class="text-white hover:bg-white/10 px-10 border border-white/20">Ver Lookbook</flux:button>
                    </div>
                </div>
            </div>
            
            <div class="absolute bottom-12 left-1/2 -translate-x-1/2 animate-bounce opacity-30">
                <flux:icon.chevron-down class="size-8" />
            </div>
        </section>

        <!-- Featured Categories -->
        <section class="py-20 bg-zinc-950">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between mb-12">
                    <flux:heading size="xl">Categorías Destacadas</flux:heading>
                    <flux:link href="/categorias" icon="arrow-right">Ver todas</flux:link>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach($categories as $category)
                        <flux:card class="relative h-64 overflow-hidden group cursor-pointer border-none" href="{{ route('categoria', $category) }}">
                            <img src="{{ $category->image_url ?? 'https://picsum.photos/seed/'.$category->id.'/800/600' }}" alt="{{ $category->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <div class="absolute bottom-6 left-6">
                                <flux:heading class="text-white text-2xl font-bold">{{ $category->name }}</flux:heading>
                                <flux:button variant="ghost" size="sm" class="text-white mt-2 p-0">Explorar →</flux:button>
                            </div>
                        </flux:card>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Featured Products -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="text-center mb-16">
                    <flux:heading size="xl">Novedades</flux:heading>
                    <flux:subheading>Los últimos lanzamientos directos para ti.</flux:subheading>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach($featuredProducts as $product)
                        <flux:card class="p-0 overflow-hidden group relative">
                            <a href="{{ route('detalle', $product) }}" wire:navigate class="block">
                                <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 relative">
                                    <img src="{{ $product->image_url ?? 'https://picsum.photos/seed/'.$product->id.'/600/600' }}" alt="{{ $product->name }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105">
                                    <div class="absolute top-4 right-4 z-10">
                                        <flux:button variant="ghost" icon="heart" size="sm" class="bg-white/80 dark:bg-zinc-900/80 backdrop-blur rounded-full" />
                                    </div>
                                </div>
                                <div class="p-6 pb-0">
                                    <flux:heading size="sm" class="text-zinc-500 uppercase tracking-widest text-xs font-bold mb-2">{{ $product->category->name }}</flux:heading>
                                    <flux:heading size="lg" class="mb-2 truncate group-hover:text-brand-600 transition-colors">{{ $product->name }}</flux:heading>
                                </div>
                            </a>
                            <div class="p-6 pt-2">
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-brand-600">${{ number_format($product->price, 2) }}</span>
                                    <div class="flex gap-2">
                                        @if(Auth::user()?->isAdmin())
                                            <flux:button variant="ghost" icon="pencil-square" size="sm" class="bg-zinc-100 dark:bg-zinc-800 rounded-full" href="{{ route('admin.products.edit', $product) }}" />
                                        @endif
                                        <livewire:add-to-cart :product="$product" />
                                    </div>
                                </div>
                            </div>
                        </flux:card>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

    @include('partials.store.footer')
</x-layouts.app>
