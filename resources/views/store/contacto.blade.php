<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-4xl mx-auto px-4 lg:px-8 py-20">
        <div class="text-center mb-16">
            <flux:heading size="xl" class="text-5xl font-extrabold mb-4">Contacto</flux:heading>
            <flux:subheading>Estamos aquí para ayudarte. Envíanos un mensaje y te responderemos lo antes posible.</flux:subheading>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-20">
            <flux:card class="text-center p-8">
                <div class="w-12 h-12 bg-brand-100 dark:bg-brand-900/30 text-brand-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <flux:icon.envelope class="size-6" />
                </div>
                <flux:heading size="lg">Email</flux:heading>
                <p class="text-zinc-500 text-sm">soporte@premiumstore.com</p>
            </flux:card>

            <flux:card class="text-center p-8">
                <div class="w-12 h-12 bg-brand-100 dark:bg-brand-900/30 text-brand-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <flux:icon.phone class="size-6" />
                </div>
                <flux:heading size="lg">Teléfono</flux:heading>
                <p class="text-zinc-500 text-sm">+34 900 123 456</p>
            </flux:card>

            <flux:card class="text-center p-8">
                <div class="w-12 h-12 bg-brand-100 dark:bg-brand-900/30 text-brand-600 rounded-full flex items-center justify-center mx-auto mb-4">
                    <flux:icon.map-pin class="size-6" />
                </div>
                <flux:heading size="lg">Oficina</flux:heading>
                <p class="text-zinc-500 text-sm">Calle Gran Vía, Madrid</p>
            </flux:card>
        </div>

        <flux:card class="p-10">
            <form action="#" class="space-y-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <flux:field>
                        <flux:label>Nombre</flux:label>
                        <flux:input placeholder="Tu nombre" />
                    </flux:field>
                    <flux:field>
                        <flux:label>Email</flux:label>
                        <flux:input type="email" placeholder="tu@email.com" />
                    </flux:field>
                </div>
                <flux:field>
                    <flux:label>Asunto</flux:label>
                    <flux:input placeholder="¿En qué podemos ayudarte?" />
                </flux:field>
                <flux:field>
                    <flux:label>Mensaje</flux:label>
                    <flux:textarea placeholder="Escribe tu mensaje aquí..." rows="5" />
                </flux:field>
                <flux:button variant="primary" class="w-full md:w-auto px-12">Enviar Mensaje</flux:button>
            </form>
        </flux:card>
    </main>

    @include('partials.store.footer')
</x-layouts.app>
