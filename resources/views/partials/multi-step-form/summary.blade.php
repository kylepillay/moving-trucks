<div class="col-span-6 flex flex-col text-sm bg-white rounded-md py-4">
    <div class="px-5 py-3 border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Client Name</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $user->name }}</div>
        </div>
    </div>
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Date</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->requested_date }}</div>
        </div>
    </div>
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Timeslot</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->timeslot }}</div>
        </div>
    </div>
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Collection Address</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->from_address }}</div>
        </div>
    </div>
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Collection Address Description</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->collection_address_description }}</div>
        </div>
    </div>
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Delivery Address</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->to_address }}</div>
        </div>
    </div>
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Delivery Address Description</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->delivery_address_description }}</div>
        </div>
    </div>
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Mileage</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->distance }} KM</div>
        </div>
    </div>
    @if(sizeof($selected_inventory) > 0)
        <div class="flex flex-row justify-between h-8 pl-5 mt-4 mb-3">
            <div class="flex flex 1 font-bold items-center mb-2 ml-4">Selected Items:</div>
        </div>
        <div class="mb-3 w-full">
            @foreach($inventory as $inventoryItem)
                @if($selected_inventory[$inventoryItem['id']] > 0)
                    <div class="bg-gray-100 flex flex-row mx-8 border-b">
                        <div class="flex flex-1 items-center pl-4">{{ $inventoryItem['item'] }}</div>
                        <div class="py-3 mr-4 ml-2">
                            {{ $selected_inventory[$inventoryItem['id']] }}
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    @endif
    @if($quoteRequest->items_list)
        <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
            <div class="ml-4 mr-auto">
                <div class="font-medium">Additional Items</div>
                <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->items_list }}</div>
            </div>
        </div>
    @endif
    <div class="px-5 py-3 border-t border-gray-200 dark:border-dark-5">
        <div class="ml-4 mr-auto">
            <div class="font-medium">Special Instructions</div>
            <div class="text-gray-600 mr-5 sm:mr-5">{{ $quoteRequest->special_instructions }}</div>
        </div>
    </div>
</div>

