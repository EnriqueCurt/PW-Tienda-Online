<flux:sidebar sticky stashable class="bg-zinc-50 dark:bg-zinc-900 border-r border-zinc-200 dark:border-zinc-800">
    <flux:sidebar.toggle class="lg:hidden" />

    <flux:brand href="/admin/dashboard" logo="https://fluxui.dev/img/demo/logo.png" name="Admin Panel" class="px-2 dark:text-white" />

    <flux:navlist variant="outline">
        <flux:navlist.item href="/admin/dashboard" icon="home">Dashboard</flux:navlist.item>
        <flux:navlist.item href="/admin/products" icon="shopping-bag">Productos</flux:navlist.item>
        <flux:navlist.item href="/admin/products/new" icon="plus-circle">Nuevo Producto</flux:navlist.item>
        <flux:navlist.item href="/admin/orders" icon="clipboard-document-list">Pedidos</flux:navlist.item>
        <flux:navlist.item href="/admin/users" icon="users">Usuarios</flux:navlist.item>
    </flux:navlist>

    <flux:spacer />

    <flux:navlist variant="outline">
        <flux:navlist.item href="/admin/settings" icon="cog-6-tooth">Configuración</flux:navlist.item>
        <flux:navlist.item href="/" icon="arrow-left-start-on-rectangle">Volver a Tienda</flux:navlist.item>
    </flux:navlist>

    <flux:dropdown position="top" align="start" class="max-lg:hidden">
        <flux:profile name="{{ Auth::user()->name ?? 'Administrador' }}" initials="{{ strtoupper(substr(Auth::user()->name ?? 'AD', 0, 2)) }}" />

        <flux:menu>
            <flux:menu.item href="/perfil" icon="user">Mi Perfil</flux:menu.item>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <flux:menu.item type="submit" icon="arrow-right-start-on-rectangle">Cerrar Sesión</flux:menu.item>
            </form>
        </flux:menu>
    </flux:dropdown>
</flux:sidebar>
