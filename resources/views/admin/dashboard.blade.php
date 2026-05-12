<x-layouts.app>
    <div class="flex h-screen overflow-hidden">
        @include('partials.admin.sidebar')

        <div class="flex-1 flex flex-col overflow-y-auto">
            @include('partials.admin.topbar')

            <div class="p-8 max-w-7xl mx-auto w-full">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <div>
                        <flux:heading size="xl" level="1">Dashboard</flux:heading>
                        <flux:subheading>Bienvenido de nuevo, {{ Auth::user()->name }}.</flux:subheading>
                    </div>
                    <flux:button variant="primary" icon="plus" href="{{ route('admin.products.create') }}" wire:navigate>Nuevo Producto</flux:button>
                </div>

                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    @include('partials.admin.stats-card', [
                        'title' => 'Ventas Totales',
                        'value' => '$24,500',
                        'icon' => 'currency-dollar',
                        'trend' => '12%',
                        'trendUp' => true
                    ])
                    @include('partials.admin.stats-card', [
                        'title' => 'Nuevos Clientes',
                        'value' => '124',
                        'icon' => 'users',
                        'trend' => '5%',
                        'trendUp' => true
                    ])
                    @include('partials.admin.stats-card', [
                        'title' => 'Pedidos Pendientes',
                        'value' => '12',
                        'icon' => 'clock',
                        'trend' => '2%',
                        'trendUp' => false
                    ])
                    @include('partials.admin.stats-card', [
                        'title' => 'Productos Activos',
                        'value' => '450',
                        'icon' => 'shopping-bag'
                    ])
                </div>

                <!-- Recent Activity Table -->
                <flux:card>
                    <div class="flex items-center justify-between mb-6">
                        <flux:heading size="lg">Pedidos Recientes</flux:heading>
                        <flux:button variant="ghost" size="sm">Ver todos</flux:button>
                    </div>

                    <flux:table>
                        <flux:table.columns>
                            <flux:table.column>ID Pedido</flux:table.column>
                            <flux:table.column>Cliente</flux:table.column>
                            <flux:table.column>Fecha</flux:table.column>
                            <flux:table.column>Estado</flux:table.column>
                            <flux:table.column align="end">Total</flux:table.column>
                        </flux:table.columns>

                        <flux:table.rows>
                            <flux:table.row>
                                <flux:table.cell class="font-medium">#ORD-001</flux:table.cell>
                                <flux:table.cell>Juan Pérez</flux:table.cell>
                                <flux:table.cell>Hace 2 horas</flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge color="green">Completado</flux:badge>
                                </flux:table.cell>
                                <flux:table.cell align="end" class="font-bold">$120.00</flux:table.cell>
                            </flux:table.row>
                            <flux:table.row>
                                <flux:table.cell class="font-medium">#ORD-002</flux:table.cell>
                                <flux:table.cell>María García</flux:table.cell>
                                <flux:table.cell>Hace 5 horas</flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge color="yellow">Pendiente</flux:badge>
                                </flux:table.cell>
                                <flux:table.cell align="end" class="font-bold">$85.50</flux:table.cell>
                            </flux:table.row>
                            <flux:table.row>
                                <flux:table.cell class="font-medium">#ORD-003</flux:table.cell>
                                <flux:table.cell>Carlos López</flux:table.cell>
                                <flux:table.cell>Ayer</flux:table.cell>
                                <flux:table.cell>
                                    <flux:badge color="blue">Enviado</flux:badge>
                                </flux:table.cell>
                                <flux:table.cell align="end" class="font-bold">$210.00</flux:table.cell>
                            </flux:table.row>
                        </flux:table.rows>
                    </flux:table>
                </flux:card>
            </div>
        </div>
    </div>
</x-layouts.app>
