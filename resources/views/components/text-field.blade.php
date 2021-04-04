<div class="mr-auto">
    <div class="font-medium">{{ $attributes['title'] }}</div>
    <div class="relative">
        <x-jet-input id="{{ $attributes['model'] }}" type="text" class="mt-1 block w-full text-sm pl-4" wire:model="{{ $attributes['model'] }}" autocomplete="none"></x-jet-input>
        <x-jet-input-error for="{{ $attributes['model'] }}" class="items-center px-4"></x-jet-input-error>
    </div>
</div>