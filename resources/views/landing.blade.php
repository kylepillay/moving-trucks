<x-guest-layout>
    <x-slot name="scrollText">
        <marquee>
            <span class="text-lg">Mini local moves from R 300</span>
            @include('partials.text-separator')
            <span class="text-lg">Small moves from R450 - R650</span>
            <span class="text-xl pl-2 pr-2 text-red-900 font-bold">|</span>
            <span class="text-lg">Medium moves from R1200</span>
            <span class="text-xl pl-2 pr-2 text-red-900 font-bold">|</span>
            <span class="text-lg">Long distance from R7.40 per km</span>
            <span class="text-xl pl-2 pr-2 text-red-900 font-bold">|</span>
            <span class="text-lg">Piano moves from R600 - R900</span>
        </marquee>
    </x-slot>

    <x-slot name="header">
        <div class="text-2xl text-red-600 font-bold flex flex-1 items-center justify-center">
            <img src="{{ asset('images/arrow-down.svg') }}" class="pr-4 mt-0.5 h-5">
            Instant Quotes
            <img src="{{ asset('images/arrow-down.svg') }}" class="pl-4 mt-0.5 h-5">
        </div>
    </x-slot>

    <div class="flex flex-1">
        <livewire:multi-step-form />
    </div>
</x-guest-layout>
