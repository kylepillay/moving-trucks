@props(['submit'])

<div {{ $attributes->merge(['class' => 'flex flex-1 flex-col w-full']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <form wire:submit.prevent="{{ $submit }}">
        <div class="flex flex-1 flex-col w-full">
            {{ $form }}
        </div>

        @if (isset($actions))
            <div class="flex flex-row justify-between mt-6 w-full">
                {{ $actions }}
            </div>
        @endif
    </form>
</div>
