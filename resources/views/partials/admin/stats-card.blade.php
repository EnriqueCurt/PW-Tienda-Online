@props(['title', 'value', 'icon', 'trend' => null, 'trendUp' => true])

<flux:card class="p-6 transition-all hover:shadow-lg hover:-translate-y-1">
    <div class="flex items-center justify-between mb-4">
        <div class="p-3 bg-brand-50 dark:bg-brand-900/30 rounded-2xl">
            <flux:icon :name="$icon" class="w-6 h-6 text-brand-600 dark:text-brand-400" />
        </div>
        @if($trend)
            <div @class([
                'flex items-center text-sm font-medium px-2.5 py-0.5 rounded-full',
                'bg-emerald-100 text-emerald-700 dark:bg-emerald-900/30 dark:text-emerald-400' => $trendUp,
                'bg-rose-100 text-rose-700 dark:bg-rose-900/30 dark:text-rose-400' => !$trendUp,
            ])>
                <flux:icon :name="$trendUp ? 'arrow-trending-up' : 'arrow-trending-down'" class="w-4 h-4 mr-1" />
                {{ $trend }}
            </div>
        @endif
    </div>
    
    <div>
        <flux:heading size="sm" level="3" class="text-zinc-500 dark:text-zinc-400 uppercase tracking-wider font-semibold">
            {{ $title }}
        </flux:heading>
        <flux:heading size="xl" class="mt-1 font-bold text-3xl">
            {{ $value }}
        </flux:heading>
    </div>
</flux:card>
