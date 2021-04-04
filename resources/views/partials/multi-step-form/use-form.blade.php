<div class="col-span-6 pl-1 flex justify-center">
    <x-jet-label for="terms">
        <div class="flex items-center">
            <x-jet-checkbox class="form-checkbox" name="quoteRequest.use_form" id="use_form" wire:model="quoteRequest.use_form"/>
            <div class="ml-2 text-lg text-white">
                Use our form?
            </div>
        </div>
    </x-jet-label>
    <x-jet-input-error for="quoteRequest.use_form" class="mt-2" />
</div>

