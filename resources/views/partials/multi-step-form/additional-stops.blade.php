<div class="col-span-6 pl-1 flex justify-center">
    <x-jet-label for="terms">
        <div class="flex items-center">
            <x-jet-checkbox class="form-checkbox" name="quoteRequest.make_additional_stop" id="make_additional_stop" wire:model="quoteRequest.make_additional_stop"/>
            <div class="ml-2 text-lg text-white">
                Make additional stop?
            </div>
        </div>
    </x-jet-label>
    <x-jet-input-error for="quoteRequest.make_additional_stop" class="mt-2" />
</div>

