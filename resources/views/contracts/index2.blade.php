<x-app-layout>
    @push('styles')
        @livewireStyles
    @endpush
    @push('scripts')
        @livewireScripts
    @endpush
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All Contracts') }}
        </h2>
    </x-slot>

    <livewire:dynamic-contracts-table :contract_statuses="$contract_statuses"/>
</x-app-layout>
