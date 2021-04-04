<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-600 leading-tight">
        @if(Auth::user()->hasRole('admin')){{ __('Manage Quotes') }}@else{{ __('My Quotes') }}@endif
    </h2>
</x-slot>
<div class="py-8">
    <div class="max-w-7xl mx-auto">
        <livewire:quotes />
    </div>
</div>