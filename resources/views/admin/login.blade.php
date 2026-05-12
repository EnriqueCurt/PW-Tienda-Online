<x-layouts.app>
    <div class="min-h-screen flex items-center justify-center bg-zinc-950 p-6 relative overflow-hidden">
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
                {{-- Error messages --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 dark:bg-red-950/50 border border-red-200 dark:border-red-800">
                        <div class="flex items-center gap-2 text-red-700 dark:text-red-400 text-sm">
                            <flux:icon.exclamation-triangle class="size-5" />
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ route('admin.login') }}" method="POST" class="space-y-6">
                    @csrf
                    <flux:field>
                        <flux:label>Correo Electrónico</flux:label>
                        <flux:input type="email" name="email" value="{{ old('email') }}" placeholder="admin@tienda.com" required icon="envelope" />
                        @error('email')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </flux:field>

                    <flux:field>
                        <div class="flex justify-between items-center">
                            <flux:label>Contraseña</flux:label>
                        </div>
                        <flux:input type="password" name="password" required icon="lock-closed" />
                        @error('password')
                            <flux:error>{{ $message }}</flux:error>
                        @enderror
                    </flux:field>

                    <flux:field variant="inline">
                        <flux:checkbox name="remember" label="Recordarme" />
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
