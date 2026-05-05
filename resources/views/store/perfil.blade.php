<x-layouts.app>
    @include('partials.store.navbar')

    <main class="max-w-7xl mx-auto px-4 lg:px-8 py-12">
        <div class="flex flex-col md:flex-row gap-12">
            <!-- Sidebar Nav -->
            <aside class="w-full md:w-64">
                <div class="flex flex-col items-center mb-8 p-6 bg-zinc-50 dark:bg-zinc-900 rounded-3xl">
                    <div class="w-24 h-24 bg-brand-500 rounded-full flex items-center justify-center text-white text-3xl font-bold mb-4 shadow-xl shadow-brand-500/20">
                        JP
                    </div>
                    <flux:heading size="lg">Juan Pérez</flux:heading>
                    <p class="text-zinc-500 text-sm">Miembro desde 2024</p>
                </div>

                <flux:navlist variant="outline">
                    <flux:navlist.item href="#" icon="user" current>Mi Perfil</flux:navlist.item>
                    <flux:navlist.item href="#" icon="shopping-bag">Mis Pedidos</flux:navlist.item>
                    <flux:navlist.item href="#" icon="map-pin">Direcciones</flux:navlist.item>
                    <flux:navlist.item href="#" icon="heart">Lista de Deseos</flux:navlist.item>
                    <flux:navlist.item href="#" icon="arrow-right-start-on-rectangle" class="text-rose-500">Cerrar Sesión</flux:navlist.item>
                </flux:navlist>
            </aside>

            <!-- Main Content -->
            <div class="flex-1 space-y-12">
                <section>
                    <flux:heading size="xl" class="mb-8">Información de la Cuenta</flux:heading>
                    <flux:card class="p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <flux:field>
                                <flux:label>Nombre</flux:label>
                                <flux:input value="Juan" />
                            </flux:field>
                            <flux:field>
                                <flux:label>Apellidos</flux:label>
                                <flux:input value="Pérez" />
                            </flux:field>
                            <flux:field class="md:col-span-2">
                                <flux:label>Correo Electrónico</flux:label>
                                <flux:input value="juan.perez@ejemplo.com" icon="envelope" />
                            </flux:field>
                        </div>
                        <div class="mt-8">
                            <flux:button variant="primary">Guardar Cambios</flux:button>
                        </div>
                    </flux:card>
                </section>

                <section>
                    <flux:heading size="xl" class="mb-8">Pedidos Recientes</flux:heading>
                    <flux:table>
                        <flux:table.columns>
                            <flux:table.column>Pedido</flux:table.column>
                            <flux:table.column>Fecha</flux:table.column>
                            <flux:table.column>Estado</flux:table.column>
                            <flux:table.column align="end">Total</flux:table.column>
                        </flux:table.columns>

                        <flux:table.rows>
                            <flux:table.row>
                                <flux:table.cell class="font-bold">#ORD-9921</flux:table.cell>
                                <flux:table.cell>15 Abr, 2024</flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge color="green">Entregado</flux:badge>
                                </flux:table.cell>
                                <flux:table.cell align="end" class="font-bold">$124.50</flux:table.cell>
                            </flux:table.row>
                            <flux:table.row>
                                <flux:table.cell class="font-bold">#ORD-9845</flux:table.cell>
                                <flux:table.cell>02 Mar, 2024</flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge color="green">Entregado</flux:badge>
                                </flux:table.cell>
                                <flux:table.cell align="end" class="font-bold">$89.00</flux:table.cell>
                            </flux:table.row>
                        </flux:table.rows>
                    </flux:table>
                </section>
            </div>
        </div>
    </main>
</x-layouts.app>
