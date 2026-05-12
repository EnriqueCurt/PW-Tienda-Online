<flux:sidebar sticky stashable class="bg-zinc-900 border-r border-zinc-800">
    <flux:sidebar.toggle class="lg:hidden" />

    <flux:brand href="{{ route('admin.dashboard') }}" logo="https://fluxui.dev/img/demo/logo.png" name="Admin Panel" class="px-2 text-white" />

    <flux:navlist variant="outline">
        <flux:navlist.item href="{{ route('admin.dashboard') }}" icon="home" wire:navigate>Dashboard</flux:navlist.item>
        <flux:navlist.item href="{{ route('admin.products.index') }}" icon="shopping-bag" wire:navigate>Productos</flux:navlist.item>
        <flux:navlist.item href="{{ route('admin.products.create') }}" icon="plus-circle" wire:navigate>Nuevo Producto</flux:navlist.item>
        <flux:navlist.item href="{{ route('admin.orders.index') }}" icon="clipboard-document-list" wire:navigate>Pedidos</flux:navlist.item>
        <flux:navlist.item href="{{ route('admin.users.index') }}" icon="users" wire:navigate>Usuarios</flux:navlist.item>
    </flux:navlist>

    <flux:spacer />

    <flux:navlist variant="outline">
        <flux:navlist.item href="{{ route('admin.settings') }}" icon="cog-6-tooth" wire:navigate>Configuración</flux:navlist.item>
        <flux:navlist.item href="/" icon="arrow-left-start-on-rectangle" wire:navigate>Volver a Tienda</flux:navlist.item>
    </flux:navlist>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile name="{{ Auth::user()->name ?? 'Administrador' }}" initials="{{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}" />

        <flux:menu>
            <flux:menu.item href="{{ route('perfil') }}" icon="user" wire:navigate>Mi Perfil</flux:menu.item>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <flux:menu.item type="submit" icon="arrow-right-start-on-rectangle">Cerrar Sesión</flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>
