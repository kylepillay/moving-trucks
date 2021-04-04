<div class="col-span-6">
    <select class="rounded-md w-full" id="collection_address_description" wire:model="quoteRequest.collection_address_description">
        <option value="" selected="selected">Select an Option</option>
        <option value="Ground floor (no stairs)">Ground floor (no stairs)</option>
        <option value="Double storey">Double storey</option>
        <option value="1st floor">1st floor</option>
        <option value="2nd floor">2nd floor</option>
        <option value="3rd floor">3rd floor</option>
        <option value="Building with a lift">Building with a lift</option>
    </select>
    <x-jet-input-error for="quoteRequest.collection_address_description" class="items-center px-4" />
</div>
