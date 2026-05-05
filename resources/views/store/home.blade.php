<x-layouts.app>
    @include('partials.store.navbar')

    <main>
        <!-- Hero Section -->
        <section class="relative py-20 overflow-hidden bg-zinc-900 text-white">
            <div class="absolute inset-0 opacity-20">
                <div class="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-brand-600 to-transparent"></div>
            </div>
            
            <div class="max-w-7xl mx-auto px-4 lg:px-8 relative z-10 text-center">
                <flux:heading size="xl" class="text-white mb-6 text-5xl md:text-7xl font-extrabold tracking-tight">
                    Eleva tu Estilo <span class="text-brand-400">Premium</span>
                </flux:heading>
                <flux:subheading class="text-zinc-300 mb-10 text-xl max-w-2xl mx-auto">
                    Descubre nuestra colección exclusiva de productos diseñados para quienes no se conforman con lo ordinario.
                </flux:subheading>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <flux:button variant="primary" href="/catalogo">Comprar Ahora</flux:button>
                    <flux:button variant="ghost" class="text-white hover:bg-white/10">Ver Colección</flux:button>
                </div>
            </div>
        </section>

        <!-- Featured Categories -->
        <section class="py-20 bg-zinc-50 dark:bg-zinc-950">
            <div class="max-w-7xl mx-auto px-4 lg:px-8">
                <div class="flex items-center justify-between mb-12">
                    <flux:heading size="xl">Categorías Destacadas</flux:heading>
                    <flux:link href="/categorias" icon="arrow-right">Ver todas</flux:link>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach(['Calzado', 'Ropa', 'Accesorios'] as $index => $cat)
                        <flux:card class="relative h-64 overflow-hidden group cursor-pointer border-none">
                            <img src="https://picsum.photos/seed/cat{{ $index }}/800/600" alt="{{ $cat }}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/80 to-transparent"></div>
                            <div class="absolute bottom-6 left-6">
                                <flux:heading class="text-white text-2xl font-bold">{{ $cat }}</flux:heading>
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
                    @for($i = 1; $i <= 4; $i++)
                        <flux:card class="p-0 overflow-hidden group">
                            <div class="aspect-square bg-zinc-100 dark:bg-zinc-800 relative">
                                <img src="https://picsum.photos/seed/prod{{ $i }}/600/600" alt="Producto" class="w-full h-full object-cover">
                                <div class="absolute top-4 right-4 z-10">
                                    <flux:button variant="ghost" icon="heart" size="sm" class="bg-white/80 dark:bg-zinc-900/80 backdrop-blur rounded-full" />
                                </div>
                            </div>
                            <div class="p-6">
                                <flux:heading size="sm" class="text-zinc-500 uppercase tracking-widest text-xs font-bold mb-2">Marca Premium</flux:heading>
                                <flux:heading size="lg" class="mb-2 truncate">Producto Ejemplo {{ $i }}</flux:heading>
                                <div class="flex items-center justify-between">
                                    <span class="text-2xl font-bold text-brand-600">$199.00</span>
                                    <flux:button variant="ghost" icon="plus" size="sm" class="bg-zinc-100 dark:bg-zinc-800 rounded-full" />
                                </div>
                            </div>
                        </flux:card>
                    @endfor
                </div>
            </div>
        </section>
    </main>

    <footer class="bg-zinc-900 text-zinc-400 py-20 border-t border-zinc-800">
        <div class="max-w-7xl mx-auto px-4 lg:px-8 grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="md:col-span-2">
                <flux:brand href="/" logo="https://fluxui.dev/img/demo/logo.png" name="Premium Store" class="mb-6" />
                <p class="max-w-xs mb-8 text-lg">
                    Ofreciendo excelencia en cada detalle. Tu tienda de confianza para productos de alta calidad.
                </p>
                <div class="flex gap-4">
                    <!-- Social icons would go here -->
                </div>
            </div>
            <div>
                <flux:heading size="lg" class="text-white mb-6">Enlaces Rápidos</flux:heading>
                <ul class="space-y-4">
                    <li><flux:link href="#" variant="ghost" class="p-0">Sobre Nosotros</flux:link></li>
                    <li><flux:link href="#" variant="ghost" class="p-0">Preguntas Frecuentes</flux:link></li>
                    <li><flux:link href="#" variant="ghost" class="p-0">Contacto</flux:link></li>
                </ul>
            </div>
            <div>
                <flux:heading size="lg" class="text-white mb-6">Soporte</flux:heading>
                <ul class="space-y-4">
                    <li><flux:link href="#" variant="ghost" class="p-0">Envíos</flux:link></li>
                    <li><flux:link href="#" variant="ghost" class="p-0">Devoluciones</flux:link></li>
                    <li><flux:link href="#" variant="ghost" class="p-0">Privacidad</flux:link></li>
                </ul>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-4 lg:px-8 mt-20 pt-8 border-t border-zinc-800 text-center text-sm">
            &copy; {{ date('Y') }} Premium Store. Todos los derechos reservados.
        </div>
    </footer>
</x-layouts.app>
