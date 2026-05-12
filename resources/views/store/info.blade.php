<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-4xl mx-auto px-4 lg:px-8 py-20">
        <flux:card class="p-12 prose dark:prose-invert max-w-none">
            @php
                $titles = [
                    'privacidad' => 'Política de Privacidad',
                    'terminos' => 'Términos y Condiciones',
                    'envios' => 'Política de Envíos y Devoluciones',
                    'cookies' => 'Política de Cookies',
                ];
                $title = $titles[$slug] ?? 'Información Legal';
            @endphp

            <flux:heading size="xl" class="mb-8">{{ $title }}</flux:heading>

            <p class="text-zinc-600 dark:text-zinc-400">
                Esta es una página de ejemplo para demostrar que los enlaces legales funcionan correctamente. En una tienda real, aquí se incluirían todos los términos legales redactados por un profesional.
            </p>

            <h3 class="text-zinc-900 dark:text-white mt-8 mb-4">1. Introducción</h3>
            <p class="text-zinc-600 dark:text-zinc-400">
                Bienvenido a Premium Store. Al acceder a nuestro sitio web, usted acepta cumplir con estos términos y condiciones.
            </p>

            <h3 class="text-zinc-900 dark:text-white mt-8 mb-4">2. Uso del Sitio</h3>
            <p class="text-zinc-600 dark:text-zinc-400">
                El contenido de este sitio es para su información general y uso personal solamente. Está sujeto a cambios sin previo aviso.
            </p>

            <div class="mt-12 pt-8 border-t border-zinc-200 dark:border-zinc-800">
                <flux:button href="/" variant="ghost" icon="arrow-left">Volver al inicio</flux:button>
            </div>
        </flux:card>
    </main>

    @include('partials.store.footer')
</x-layouts.app>
