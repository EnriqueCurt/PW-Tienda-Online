<footer class="bg-zinc-900 text-white py-20 border-t border-zinc-800">
    <div class="max-w-7xl mx-auto px-4 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
            <div class="space-y-6">
                <flux:brand logo="https://fluxui.dev/img/demo/logo.png" name="Premium Store" class="text-white" />
                <p class="text-zinc-400 text-sm leading-relaxed">
                    Ofrecemos la mejor selección de productos premium para mejorar tu estilo de vida. Calidad garantizada en cada compra.
                </p>
                <div class="flex gap-4">
                    <flux:button variant="ghost" icon="hashtag" size="sm" class="text-zinc-400 hover:text-white" />
                    <flux:button variant="ghost" icon="hashtag" size="sm" class="text-zinc-400 hover:text-white" />
                    <flux:button variant="ghost" icon="hashtag" size="sm" class="text-zinc-400 hover:text-white" />
                </div>
            </div>

            <div>
                <flux:heading size="sm" class="text-white uppercase tracking-widest font-bold mb-6">Tienda</flux:heading>
                <ul class="space-y-4 text-zinc-400 text-sm">
                    <li><flux:link href="{{ route('catalogo') }}" class="text-zinc-400 hover:text-white">Todos los Productos</flux:link></li>
                    <li><flux:link href="{{ route('categorias') }}" class="text-zinc-400 hover:text-white">Categorías</flux:link></li>
                    <li><flux:link href="{{ route('home') }}" class="text-zinc-400 hover:text-white">Novedades</flux:link></li>
                    <li><flux:link href="{{ route('ofertas') }}" class="text-zinc-400 hover:text-white">Ofertas</flux:link></li>
                </ul>
            </div>

            <div>
                <flux:heading size="sm" class="text-white uppercase tracking-widest font-bold mb-6">Soporte</flux:heading>
                <ul class="space-y-4 text-zinc-400 text-sm">
                    <li><flux:link href="{{ route('contacto') }}" class="text-zinc-400 hover:text-white">Preguntas Frecuentes</flux:link></li>
                    <li><flux:link href="{{ route('info', 'envios') }}" class="text-zinc-400 hover:text-white">Envíos y Devoluciones</flux:link></li>
                    <li><flux:link href="{{ route('contacto') }}" class="text-zinc-400 hover:text-white">Contacto</flux:link></li>
                    <li><flux:link href="{{ route('info', 'terminos') }}" class="text-zinc-400 hover:text-white">Términos y Condiciones</flux:link></li>
                </ul>
            </div>

            <div>
                <flux:heading size="sm" class="text-white uppercase tracking-widest font-bold mb-6">Newsletter</flux:heading>
                <p class="text-zinc-400 text-sm mb-4">Suscríbete para recibir ofertas exclusivas y novedades.</p>
                <div class="flex gap-2">
                    <flux:input placeholder="Tu email" class="bg-zinc-800 border-zinc-700 text-white" />
                    <flux:button variant="primary" size="sm">Unirse</flux:button>
                </div>
            </div>
        </div>

        <div class="pt-8 border-t border-zinc-800 flex flex-col md:flex-row justify-between items-center gap-4 text-zinc-500 text-xs">
            <p>© {{ date('Y') }} Premium Store. Todos los derechos reservados.</p>
            <div class="flex gap-6">
                <flux:link href="{{ route('info', 'privacidad') }}" class="text-zinc-500 hover:text-white">Privacidad</flux:link>
                <flux:link href="{{ route('info', 'cookies') }}" class="text-zinc-500 hover:text-white">Cookies</flux:link>
            </div>
        </div>
    </div>
</footer>
