<x-layouts.app>
    <div class="flex h-screen overflow-hidden">
        @include('partials.admin.sidebar')

        <div class="flex-1 flex flex-col overflow-y-auto">
            @include('partials.admin.topbar')

            <div class="p-8 max-w-4xl mx-auto w-full">
                <div class="mb-8">
                    <flux:link href="/admin/products" icon="arrow-left" class="mb-4">Volver al listado</flux:link>
                    <flux:heading size="xl" level="1">Añadir Nuevo Producto</flux:heading>
                    <flux:subheading>Completa la información para publicar un nuevo artículo en la tienda.</flux:subheading>
                </div>

                <form action="/admin/products" method="POST" class="space-y-8">
                    @csrf
                    <flux:card class="p-6 space-y-6">
                        <flux:heading size="lg">Información General</flux:heading>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <flux:field class="md:col-span-2">
                                <flux:label>Nombre del Producto</flux:label>
                                <flux:input placeholder="Ej: Zapatillas Deportivas Ultra" required />
                            </flux:field>

                            <flux:field>
                                <flux:label>Categoría</flux:label>
                                <flux:select placeholder="Selecciona una categoría">
                                    <flux:select.option>Calzado</flux:select.option>
                                    <flux:select.option>Ropa</flux:select.option>
                                    <flux:select.option>Accesorios</flux:select.option>
                                </flux:select>
                            </flux:field>

                            <flux:field>
                                <flux:label>Precio ($)</flux:label>
                                <flux:input type="number" step="0.01" placeholder="0.00" icon="currency-dollar" />
                            </flux:field>

                            <flux:field class="md:col-span-2">
                                <flux:label>Descripción Corta</flux:label>
                                <flux:textarea rows="3" placeholder="Breve descripción para el listado..." />
                            </flux:field>
                        </div>
                    </flux:card>

                    <flux:card class="p-6 space-y-6">
                        <flux:heading size="lg">Inventario y Envío</flux:heading>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <flux:field>
                                <flux:label>Stock Inicial</flux:label>
                                <flux:input type="number" placeholder="0" />
                            </flux:field>

                            <flux:field>
                                <flux:label>SKU</flux:label>
                                <flux:input placeholder="PROD-001" />
                            </flux:field>

                            <flux:field>
                                <flux:label>Peso (kg)</flux:label>
                                <flux:input type="number" step="0.1" placeholder="0.5" />
                            </flux:field>
                        </div>
                    </flux:card>

                    <div class="flex justify-end gap-4">
                        <flux:button variant="ghost">Cancelar</flux:button>
                        <flux:button type="submit" variant="primary" icon="check">Guardar Producto</flux:button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-layouts.app>
