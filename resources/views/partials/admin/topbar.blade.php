<flux:header class="bg-zinc-950/80 backdrop-blur-md sticky top-0 z-10 border-b border-zinc-800">
    <flux:sidebar.toggle class="lg:hidden" />

    <flux:spacer />

    <flux:navbar class="mr-4">
        <flux:navbar.item href="#" icon="bell" badge="3" />
        <flux:navbar.item href="#" icon="magnifying-glass" />
    </flux:navbar>

    <flux:dropdown class="lg:hidden" wire:key="admin-mobile-profile">
        <flux:button variant="ghost" class="p-1 rounded-full">
            <flux:profile name="{{ Auth::user()->name ?? 'Administrador' }}" initials="{{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}" />
        </flux:button>
        <flux:menu>
            <flux:menu.item href="{{ route('perfil') }}" icon="user" wire:navigate>Perfil</flux:menu.item>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <flux:menu.item type="submit" icon="arrow-right-start-on-rectangle">Cerrar Sesión</flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:header>
