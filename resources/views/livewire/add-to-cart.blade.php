<div>
    @if($variant === 'button')
        <flux:button variant="primary" class="w-full" icon="shopping-bag" wire:click="add" wire:loading.attr="disabled">
            <span wire:loading.remove>Añadir al Carrito</span>
            <span wire:loading>Añadiendo...</span>
        </flux:button>
    @else
        <flux:button variant="ghost" icon="shopping-cart" size="sm" class="bg-zinc-100 dark:bg-zinc-800 rounded-full" wire:click="add" wire:loading.attr="disabled" />
    @endif
</div>
