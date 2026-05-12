<x-layouts.app>
    @include('partials.store.navbar')

    <div class="min-h-[calc(100vh-4rem)] flex items-center justify-center bg-zinc-50 dark:bg-zinc-950 p-6 relative overflow-hidden">
        <!-- Abstract Background Shapes -->
        <div class="absolute top-20 left-10 w-72 h-72 bg-brand-500/8 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-10 right-10 w-80 h-80 bg-brand-600/8 rounded-full blur-3xl animate-pulse" style="animation-delay: 1s;"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-brand-400/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>

        <div class="w-full max-w-md relative z-10">
            <div class="text-center mb-8">
                <div class="inline-flex items-center justify-center w-16 h-16 rounded-2xl bg-brand-500/10 dark:bg-brand-400/10 mb-6">
                    <flux:icon.user-circle class="size-8 text-brand-600 dark:text-brand-400" />
                </div>
                <flux:heading size="xl">Bienvenido de vuelta</flux:heading>
                <flux:subheading class="mt-2">Inicia sesión para acceder a tu cuenta</flux:subheading>
            </div>

            <flux:card class="p-8 shadow-2xl border-white/20">
                {{-- Error messages --}}
                @if ($errors->any())
                    <div class="mb-6 p-4 rounded-lg bg-red-50 dark:bg-red-950/50 border border-red-200 dark:border-red-800">
                        <div class="flex items-center gap-2 text-red-700 dark:text-red-400 text-sm">
                            <flux:icon.exclamation-triangle class="size-5" />
                            <span>{{ $errors->first() }}</span>
                        </div>
                    </div>
                @endif

                <form action="{{ url('/login') }}" method="POST" class="space-y-6">
                    @csrf
                    <flux:field>
                        <flux:label>Correo Electrónico</flux:label>
                        <flux:input type="email" name="email" value="{{ old('email') }}" placeholder="tu@email.com" required icon="envelope" />
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

            <div class="text-center mt-8 space-y-3">
                <p class="text-sm text-zinc-500 dark:text-zinc-400">
                    ¿No tienes una cuenta?
                    <flux:link href="#" class="text-brand-600 dark:text-brand-400 font-semibold">Regístrate aquí</flux:link>
                </p>
                <flux:link href="/" icon="arrow-left" class="text-zinc-500 hover:text-zinc-900 dark:hover:text-white text-sm">
                    Volver a la tienda
                </flux:link>
            </div>
        </div>
    </div>
</x-layouts.app>
