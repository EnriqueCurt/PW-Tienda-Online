<div
    x-data="{ show: @entangle('show') }"
    x-show="show"
    x-on:hide-toast.window="setTimeout(() => { show = false }, 3000)"
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-4"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-300"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-4"
    class="fixed bottom-8 right-8 z-[100]"
    style="display: none;"
>
    <flux:card class="flex items-center gap-4 bg-zinc-900 text-white border-zinc-800 py-3 px-6 shadow-2xl">
        <flux:icon.check-circle class="size-6 text-green-500" />
        <span class="text-sm font-medium">{{ $message }}</span>
        <button x-on:click="show = false" class="text-zinc-400 hover:text-white transition-colors">
            <flux:icon.x-mark class="size-4" />
        </button>
    </flux:card>
</div>
