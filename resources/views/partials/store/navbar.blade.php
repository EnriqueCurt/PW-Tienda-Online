<flux:header class="bg-zinc-950/80 backdrop-blur-md sticky top-0 z-50 border-b border-zinc-800">
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
            <form action="{{ route('catalogo') }}" method="GET" class="hidden md:flex items-center bg-zinc-800 rounded-full px-3 py-1 border border-transparent focus-within:border-brand-500 transition-colors">
                <flux:icon.magnifying-glass class="size-4 text-zinc-400" />
                <input type="text" name="search" placeholder="Buscar productos..." class="bg-transparent border-none focus:ring-0 text-sm w-48 text-zinc-100" value="{{ request('search') }}">
            </form>
            
            <livewire:cart-badge />

            @auth
                <flux:dropdown>
                    <flux:profile initials="{{ strtoupper(substr(Auth::user()->name, 0, 2)) }}" />
                    
                    <flux:menu>
                        <flux:menu.item href="{{ route('perfil') }}" icon="user">Mi Perfil</flux:menu.item>
                        @if(Auth::user()->isAdmin())
                            <flux:menu.item href="{{ route('admin.dashboard') }}" icon="shield-check">Administración</flux:menu.item>
                        @endif
                        <flux:menu.separator />
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <flux:menu.item type="submit" icon="arrow-right-start-on-rectangle">Cerrar Sesión</flux:menu.item>
                        </form>
                    </flux:menu>
                </flux:dropdown>
            @else
                <flux:button href="{{ route('login') }}" variant="ghost" icon="user-circle">
                    Iniciar Sesión
                </flux:button>
            @endauth

            <flux:sidebar.toggle class="md:hidden" />
        </div>
    </div>
</flux:header>
