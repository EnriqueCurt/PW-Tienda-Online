<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
        <div class="text-center mb-16">
            <flux:heading size="xl" class="text-4xl font-bold mb-4">Nuestras Categorías</flux:heading>
            <flux:subheading>Explora nuestra amplia selección de productos por categoría.</flux:subheading>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($categories as $category)
                <flux:card class="relative h-80 overflow-hidden group cursor-pointer border-none p-0" href="{{ route('categoria', $category) }}">
                    <img src="{{ $category->image_url ?? 'https://picsum.photos/seed/'.$category->id.'/800/800' }}" alt="{{ $category->name }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/90 via-black/40 to-transparent"></div>
                    <div class="absolute bottom-8 left-8 right-8 text-white">
                        <div class="flex justify-between items-end">
                            <div>
                                <flux:heading class="text-white text-3xl font-bold">{{ $category->name }}</flux:heading>
                                <span class="text-zinc-300 text-sm">{{ $category->products_count }} productos disponibles</span>
                            </div>
                            <div class="w-12 h-12 bg-brand-600 rounded-full flex items-center justify-center transition-transform group-hover:scale-110">
                                <flux:icon.arrow-right class="text-white size-6" />
                            </div>
                        </div>
                    </div>
                </flux:card>
            @endforeach
        </div>
    </main>

    @include('partials.store.footer')
</x-layouts.app>
