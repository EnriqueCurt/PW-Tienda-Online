<x-layouts.app>
    <div class="flex h-screen overflow-hidden">
        @include('partials.admin.sidebar')

        <div class="flex-1 flex flex-col overflow-y-auto">
            @include('partials.admin.topbar')

            <div class="p-8 max-w-7xl mx-auto w-full">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <div>
                        <flux:heading size="xl" level="1">Productos</flux:heading>
                        <flux:subheading>Gestiona el inventario de tu tienda.</flux:subheading>
                    </div>
                    <flux:button variant="primary" icon="plus" href="/admin/products/new">Nuevo Producto</flux:button>
                </div>

                <flux:card class="mb-8">
                    <div class="flex flex-col md:flex-row gap-4">
                        <flux:input placeholder="Buscar productos..." icon="magnifying-glass" class="flex-1" />
                        <flux:select placeholder="Categoría" class="w-full md:w-48">
                            <flux:select.option>Todas</flux:select.option>
                            <flux:select.option>Calzado</flux:select.option>
                            <flux:select.option>Ropa</flux:select.option>
                        </flux:select>
                        <flux:button icon="funnel">Filtros</flux:button>
                    </div>
                </flux:card>

                <flux:card>
                    <flux:table>
                        <flux:table.columns>
                            <flux:table.column>Producto</flux:table.column>
                            <flux:table.column>Categoría</flux:table.column>
                            <flux:table.column>Precio</flux:table.column>
                            <flux:table.column>Stock</flux:table.column>
                            <flux:table.column>Estado</flux:table.column>
                            <flux:table.column align="end">Acciones</flux:table.column>
                        </flux:table.columns>

                        <flux:table.rows>
                            <flux:table.row>
                                <flux:table.cell class="flex items-center gap-3">
                                    <div class="w-10 h-10 bg-zinc-200 rounded-lg overflow-hidden">
                                        <img src="https://picsum.photos/seed/admin/100/100" alt="Producto" class="w-full h-full object-cover">
                                    </div>
                                    <span class="font-medium text-zinc-900 dark:text-white">Zapatillas Nike Air</span>
                                </flux:table.cell>
                                <flux:table.cell>Calzado</flux:table.cell>
                                <flux:table.cell>$129.99</flux:table.cell>
                                <flux:table.cell>45 unidades</flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge color="green">Activo</flux:badge>
                                </flux:table.cell>
                                <flux:table.cell align="end">
                                    <flux:dropdown>
                                        <flux:button variant="ghost" icon="ellipsis-horizontal" />
                                        <flux:menu>
                                            <flux:menu.item icon="pencil-square">Editar</flux:menu.item>
                                            <flux:menu.item icon="eye">Ver en tienda</flux:menu.item>
                                            <flux:menu.item icon="trash" variant="danger">Eliminar</flux:menu.item>
                                        </flux:menu>
                                    </flux:dropdown>
                                </flux:table.cell>
                            </flux:table.row>
                            <!-- More rows could be added here -->
                        </flux:table.rows>
                    </flux:table>
                </flux:card>
            </div>
        </div>
    </div>
</x-layouts.app>
