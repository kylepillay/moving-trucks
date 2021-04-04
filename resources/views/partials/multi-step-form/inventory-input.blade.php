<div class="col-span-6">
    <textarea id="items_list" rows="50" class="text-lg border border-gray-300 block h-36 w-full rounded-md"
              placeholder="Enter your list of items" wire:model.lazy="quoteRequest.items_list"></textarea>
    <x-jet-input-error for="quoteRequest.items_list" class="items-center px-4"/>
</div>
