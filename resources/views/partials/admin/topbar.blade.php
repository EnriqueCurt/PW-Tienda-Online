<flux:header class="bg-white/80 dark:bg-zinc-950/80 backdrop-blur-md sticky top-0 z-10 border-b border-zinc-200 dark:border-zinc-800">
    <flux:sidebar.toggle class="lg:hidden" />

    <flux:spacer />

    <flux:navbar class="mr-4">
        <flux:navbar.item href="#" icon="bell" badge="3" />
        <flux:navbar.item href="#" icon="magnifying-glass" />
    </flux:navbar>

    <flux:dropdown class="lg:hidden">
        <flux:profile name="Admin" initials="AD" />
        <flux:menu>
            <flux:menu.item icon="user">Perfil</flux:menu.item>
            <flux:menu.item icon="arrow-right-start-on-rectangle">Salir</flux:menu.item>
        </flux:menu>
    </flux:dropdown>
</flux:header>
