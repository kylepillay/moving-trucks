<div class="col-span-6 pl-1 flex justify-center">
    <x-jet-label for="terms">
        <div class="flex items-center">
            <x-jet-checkbox class="form-checkbox" name="quoteRequest.bubble_wrap" id="bubble_wrap" wire:model="quoteRequest.bubble_wrap"/>
            <div class="ml-2 text-lg text-white">
                Any items wrapped in bubble wrap?
            </div>
        </div>
    </x-jet-label>
    <x-jet-input-error for="quoteRequest.bubble_wrap" class="mt-2" />
</div>

