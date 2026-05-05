<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-zinc-50 dark:bg-zinc-950 p-6 relative overflow-hidden">
        <!-- Abstract Background Shapes -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-brand-600/10 rounded-full blur-3xl translate-x-1/2 translate-y-1/2"></div>

        <div class="w-full max-w-md relative">
            <div class="text-center mb-8">
                <flux:brand href="#" logo="https://fluxui.dev/img/demo/logo.png" name="Admin Panel" class="justify-center mb-4" />
                <flux:heading size="xl">Bienvenido</flux:heading>
                <flux:subheading>Inicia sesión para gestionar tu tienda</flux:subheading>
            </div>

            <flux:card class="p-8 shadow-2xl border-white/20 glass">
                <form action="/admin/login" method="POST" class="space-y-6">
                    @csrf
                    <flux:field>
                        <flux:label>Correo Electrónico</flux:label>
                        <flux:input type="email" placeholder="admin@ejemplo.com" required icon="envelope" />
                    </flux:field>

                    <flux:field>
                        <div class="flex justify-between items-center">
                            <flux:label>Contraseña</flux:label>
                            <flux:link href="#" size="sm">¿Olvidaste tu contraseña?</flux:link>
                        </div>
                        <flux:input type="password" required icon="lock-closed" />
                    </flux:field>

                    <flux:field variant="inline">
                        <flux:checkbox label="Recordarme" />
                    </flux:field>

                    <flux:button type="submit" variant="primary" class="w-full">
                        Iniciar Sesión
                    </flux:button>
                </form>
            </flux:card>

            <div class="text-center mt-8">
                <flux:link href="/" icon="arrow-left" class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white">
                    Volver a la tienda pública
                </flux:link>
            </div>
        </div>
    </div>
</x-layouts.app>
