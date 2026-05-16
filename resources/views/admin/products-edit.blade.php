<x-layouts.app>
    <div class="flex h-screen overflow-hidden">
        @include('partials.admin.sidebar')

        <div class="flex-1 flex flex-col overflow-y-auto">
            <div class="p-8 max-w-3xl mx-auto w-full">
                <div class="mb-8">
                    <flux:link href="{{ route('admin.products.index') }}" icon="arrow-left" class="mb-4">Volver a productos</flux:link>
                    <flux:heading size="xl" level="1">Editar Producto</flux:heading>
                    <flux:subheading>Modifica los detalles de "{{ $product->name }}".</flux:subheading>
                </div>

                <flux:card class="p-8">
                    <form action="{{ route('admin.products.update', $product) }}" method="POST" class="space-y-6">
                        @csrf
                        @method('PUT')
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <flux:field class="md:col-span-2">
                                <flux:label>Nombre del Producto</flux:label>
                                <flux:input name="name" value="{{ old('name', $product->name) }}" required />
                                @error('name') <flux:error>{{ $message }}</flux:error> @enderror
                            </flux:field>

                            <flux:field>
                                <flux:label>Categoría</flux:label>
                                <flux:select name="category_id" required>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </flux:select>
                                @error('category_id') <flux:error>{{ $message }}</flux:error> @enderror
                            </flux:field>

                            <flux:field>
                                <flux:label>Estado</flux:label>
                                <div class="pt-3">
                                    <label class="flex items-center gap-2 cursor-pointer">
                                        <input type="checkbox" name="is_active" value="1" class="w-5 h-5 rounded border-zinc-300 text-brand-500 focus:ring-brand-500 dark:border-zinc-700 dark:bg-zinc-900" {{ old('is_active', $product->is_active) ? 'checked' : '' }}>
                                        <span class="text-sm font-medium">Producto activo y visible</span>
                                    </label>
                                </div>
                            </flux:field>

                            <flux:field>
                                <flux:label>Precio ($)</flux:label>
                                <flux:input type="number" step="0.01" name="price" value="{{ old('price', $product->price) }}" required icon="banknotes" />
                                @error('price') <flux:error>{{ $message }}</flux:error> @enderror
                            </flux:field>

                            <flux:field>
                                <flux:label>Stock</flux:label>
                                <flux:input type="number" name="stock" value="{{ old('stock', $product->stock) }}" required icon="hashtag" />
                                @error('stock') <flux:error>{{ $message }}</flux:error> @enderror
                            </flux:field>
                        </div>

                        <flux:field>
                            <flux:label>Descripción</flux:label>
                            <flux:textarea name="description" rows="5">{{ old('description', $product->description) }}</flux:textarea>
                            @error('description') <flux:error>{{ $message }}</flux:error> @enderror
                        </flux:field>

                        <flux:field>
                            <flux:label>URL de la Imagen</flux:label>
                            <flux:input name="image_url" value="{{ old('image_url', $product->image_url) }}" icon="photo" />
                            @error('image_url') <flux:error>{{ $message }}</flux:error> @enderror
                        </flux:field>

                        <div class="flex gap-4 pt-4 border-t border-zinc-800">
                            <flux:button type="submit" variant="primary" class="flex-1">Guardar Cambios</flux:button>
                            <flux:button href="{{ route('admin.products.index') }}" variant="ghost" class="flex-1" wire:navigate>Cancelar</flux:button>
                        </div>
                    </form>
                </flux:card>
            </div>
        </div>
    </div>
</x-layouts.app>
