<div class="col-span-6 pl-1">
    <div class="pb-1 flex justify-end">
        <x-date-picker placeholder="Enter the Delivery Date" hidden_element="requested_date_hidden"
                       class="mt-1 block w-full rounded-md"/>
        <input type="hidden" id="requested_date_hidden" wire:model.lazy="quoteRequest.requested_date">
        <x-jet-input-error for="quoteRequest.requested_date" class="items-center px-4"/>
    </div>
    @if($quoteRequest->requested_date)
        <div class="ml-12 h-8 bg-white text-gray-900 text-sm rounded-md flex items-center justify-center">{{ $quoteRequest->requested_date }}</div>
    @endif
</div>

