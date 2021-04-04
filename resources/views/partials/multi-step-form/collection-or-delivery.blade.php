<div class="col-span-6 pl-1 flex justify-center">
    <x-jet-label for="terms">
        <div class="flex items-center">
            <x-jet-checkbox class="form-checkbox" name="quoteRequest.collection_or_delivery_stop" id="collection_or_delivery_stop" wire:model="quoteRequest.collection_or_delivery_stop"/>
            <div class="ml-2 text-lg text-white">
                Is this a collection stop?
            </div>
        </div>
    </x-jet-label>
    <x-jet-input-error for="quoteRequest.collection_or_delivery_stop" class="mt-2" />
</div>

