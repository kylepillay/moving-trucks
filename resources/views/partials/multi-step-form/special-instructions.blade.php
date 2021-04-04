<div class="col-span-6">
    <textarea id="special_instructions" rows="50" class="text-lg border border-gray-300 block h-36 w-full rounded-md"
              placeholder="Enter your special instructions" wire:model.lazy="quoteRequest.special_instructions"></textarea>
    <x-jet-input-error for="quoteRequest.special_instructions" class="items-center px-4"/>
</div>
