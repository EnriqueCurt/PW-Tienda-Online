<flux:header class="bg-white/80 dark:bg-zinc-950/80 backdrop-blur-md sticky top-0 z-50 border-b border-zinc-200 dark:border-zinc-800">
    <div class="max-w-7xl mx-auto w-full px-4 lg:px-8 flex items-center h-16">
        <flux:brand href="/" logo="https://fluxui.dev/img/demo/logo.png" name="Premium Store" />

        <flux:spacer />

        <flux:navbar class="hidden md:flex">
            <flux:navbar.item href="/">Inicio</flux:navbar.item>
            <flux:navbar.item href="/catalogo">Catálogo</flux:navbar.item>
            <flux:navbar.item href="/categorias">Categorías</flux:navbar.item>
            <flux:navbar.item href="/ofertas">Ofertas</flux:navbar.item>
        </flux:navbar>

        <flux:spacer />

        <div class="flex items-center gap-4">
            <flux:button variant="ghost" icon="magnifying-glass" class="max-md:hidden" />
            
            <flux:button href="/carrito" variant="ghost" icon="shopping-cart" class="relative">
                <flux:badge color="brand" class="absolute -top-1 -right-1 text-[10px] px-1 min-w-[18px] h-[18px] flex items-center justify-center">2</flux:badge>
            </flux:button>

            @auth
                <flux:dropdown>
                    <flux:profile initials="{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}" />
                    <flux:menu>
                        <flux:menu.item href="/perfil" icon="user">Mi Perfil</flux:menu.item>
                        @if(Auth::user()->isAdmin())
                            <flux:menu.item href="/admin/dashboard" icon="shield-check">Administración</flux:menu.item>
                        @endif
                        <flux:menu.separator />
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <flux:menu.item type="submit" icon="arrow-right-start-on-rectangle">Cerrar Sesión</flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            @else
                <flux:button href="/login" variant="ghost" icon="user-circle">
                    Iniciar Sesión
                </flux:button>
            @endauth

            <flux:sidebar.toggle class="md:hidden" />
        </div>
    </div>
</flux:header>
