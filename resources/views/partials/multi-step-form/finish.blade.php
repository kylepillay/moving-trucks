<div class="col-span-6 pl-12">
    <div class="flex flex-1 justify-between">
        <button wire:click.prevent="restartForm" type="button" class="bg-red-900 hover:bg-red-700 text-white font-bold h-14 px-6 rounded inline-flex items-center">
            New Quote
        </button>

        <a href="{{ route('login') }}">
            <button class="bg-blue-900 hover:bg-blue-700 text-white font-bold h-14 px-6 rounded inline-flex items-center" type="button">
                Go to Login
            </button>
        </a>
    </div>
</div>