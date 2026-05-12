<div>
    <flux:button href="/carrito" variant="ghost" icon="shopping-cart" class="relative" wire:navigate>
        @if($count > 0)
            <flux:badge color="brand" class="absolute -top-1 -right-1 text-[10px] px-1 min-w-[18px] h-[18px] flex items-center justify-center">
                {{ $count }}
            </flux:badge>
        @endif
    </flux:button>
</div>
