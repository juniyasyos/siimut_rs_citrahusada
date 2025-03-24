@php
    $user = filament()->auth()->user();
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="flex items-start gap-x-4 p-4">
            <x-filament-panels::avatar.user size="xl" :user="$user" />
            <div class="flex-grow text-center md:text-left">
                <p class="text-sm">{{ $user->position->name }}</p>
                <h3 class="text-xl font-bold heading">{{ $user->name }}</h3>
                <div class="mt-4">
                    {{-- loop role yang dimiliki --}}
                    <span style="--c-50:var(--warning-50);--c-400:var(--warning-400);--c-600:var(--warning-600);"
                        class="fi-badge rounded-md text-xs font-medium ring-1 ring-inset px-2 py-1 fi-color-custom bg-custom-50 text-custom-600 ring-custom-600/10 dark:bg-custom-400/10 dark:text-custom-400 dark:ring-custom-400/30 fi-color-warning">Discrete
                        Math</span>
                </div>
            </div>
        </div>

        <form action="{{ filament()->getLogoutUrl() }}" method="post" class="my-auto flex justify-end">
            @csrf

            <x-filament::button color="gray" icon="heroicon-m-arrow-left-on-rectangle"
                icon-alias="panels::widgets.account.logout-button" labeled-from="sm" tag="button" type="submit">
                {{ __('filament-panels::widgets/account-widget.actions.logout.label') }}
            </x-filament::button>
        </form>
    </x-filament::section>
</x-filament-widgets::widget>
