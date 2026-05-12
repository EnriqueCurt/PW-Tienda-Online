<x-layouts.app>
    <div class="flex h-screen overflow-hidden">
        @include('partials.admin.sidebar')

        <div class="flex-1 flex flex-col overflow-y-auto">
            <div class="p-8 max-w-7xl mx-auto w-full">
                <div class="flex flex-col md:flex-row md:items-center justify-between mb-8 gap-4">
                    <div>
                        <flux:heading size="xl" level="1">Productos</flux:heading>
                        <flux:subheading>Gestiona el inventario de tu tienda.</flux:subheading>
                    </div>
                    <flux:button variant="primary" icon="plus" href="{{ route('admin.products.create') }}">Nuevo Producto</flux:button>
                </div>

                @if(session('success'))
                    <flux:card class="mb-6 bg-green-50 dark:bg-green-950/50 border-green-200 dark:border-green-800 p-4">
                        <div class="flex items-center gap-2 text-green-700 dark:text-green-400">
                            <flux:icon.check-circle class="size-5" />
                            <span>{{ session('success') }}</span>
                        </div>
                    </flux:card>
                @endif

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
                            @forelse($products as $product)
                                <flux:table.row>
                                    <flux:table.cell class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-zinc-200 rounded-lg overflow-hidden shrink-0">
                                            <img src="{{ $product->image_url ?? 'https://picsum.photos/seed/'.$product->id.'/100/100' }}" alt="{{ $product->name }}" class="w-full h-full object-cover">
                                        </div>
                                        <span class="font-medium text-zinc-900 dark:text-white truncate max-w-[200px]">{{ $product->name }}</span>
                                    </flux:table.cell>
                                    <flux:table.cell>{{ $product->category->name }}</flux:table.cell>
                                    <flux:table.cell>${{ number_format($product->price, 2) }}</flux:table.cell>
                                    <flux:table.cell>{{ $product->stock }} unidades</flux:table.cell>
                                    <flux:table.cell>
                                        @if($product->is_active)
                                            <flux:badge color="green">Activo</flux:badge>
                                        @else
                                            <flux:badge color="zinc">Inactivo</flux:badge>
                                        @endif
                                    </flux:table.cell>
                                    <flux:table.cell align="end">
                                        <div class="flex justify-end gap-2">
                                            <flux:button variant="ghost" icon="pencil-square" href="{{ route('admin.products.edit', $product) }}" />
                                            
                                            <flux:modal.trigger name="delete-product-{{ $product->id }}">
                                                <flux:button variant="ghost" icon="trash" class="text-red-500 hover:text-red-600" />
                                            </flux:modal.trigger>

                                            <flux:modal name="delete-product-{{ $product->id }}" class="max-w-md">
                                                <div class="space-y-6">
                                                    <div>
                                                        <flux:heading size="lg">¿Eliminar producto?</flux:heading>
                                                        <flux:subheading>Esta acción no se puede deshacer. Se eliminará "{{ $product->name }}".</flux:subheading>
                                                    </div>

                                                    <div class="flex gap-3">
                                                        <flux:modal.close>
                                                            <flux:button variant="ghost" class="flex-1">Cancelar</flux:button>
                                                        </flux:modal.close>

                                                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" class="flex-1">
                                                            @csrf
                                                            @method('DELETE')
                                                            <flux:button type="submit" variant="danger" class="w-full">Eliminar</flux:button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </flux:modal>
                                        </div>
                                    </flux:table.cell>
                                </flux:table.row>
                            @empty
                                <flux:table.row>
                                    <flux:table.cell colspan="6" class="text-center py-8 text-zinc-500">
                                        No hay productos registrados.
                                    </flux:table.cell>
                                </flux:table.row>
                            @endforelse
                        </flux:table.rows>
                    </flux:table>
                </flux:card>
            </div>
        </div>
    </div>
</x-layouts.app>
