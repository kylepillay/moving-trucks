<div class="col-span-6 pl-1 flex justify-center">
    <x-jet-label for="terms">
        <div class="flex items-center">
            <x-jet-checkbox class="form-checkbox" name="quoteRequest.plastic_covers" id="plastic_covers" wire:model="quoteRequest.plastic_covers"/>
            <div class="ml-2 text-lg text-white">
                Any items wrapped in plastic covers?
            </div>
        </div>
    </x-jet-label>
    <x-jet-input-error for="quoteRequest.plastic_covers" class="mt-2" />
</div>

