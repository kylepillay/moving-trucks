<div class="col-span-6 h-full relative">
    <div class="p-2 bg-gray-700 sticky top-4 rounded-md mx-2 mb-4">
        <x-input-small wire:model="query" id="query" class="block w-full text-gray-600" type="text"
                       placeholder="Search item"/>
    </div>
    <div class="h-full overflow-scroll">
        @foreach($inventory as $item)
            <div class="bg-gray-{{ $loop->even ? '200' : '100' }} flex flex-row rounded-md mb-2 ">
                <div class="flex flex-1 items-center pl-3 text-sm">{{ $item['item'] }}</div>
                <div class="w-36 py-2 mr-3 ml-2 flex flex-row items-center">
                    <img src="{{ asset('images/minus.svg') }}" class="w-5 h-5 active:opacity-50 cursor-pointer"
                         wire:click="decrementItem({{ $item['id'] }})"/>
                    <input id="selected_inventory.{{ $item['id'] }}" type="number"
                                 class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-lg w-full mx-2 text-center"
                                 wire:model="selected_inventory.{{ $item['id'] }}"/>
                    <img src="{{ asset('images/add.svg') }}" wire:click="incrementItem({{ $item['id'] }})"
                         class="w-5 h-5 active:opacity-50 cursor-pointer"/>
                </div>
            </div>
        @endforeach
    </div>
    <textarea id="items_list" rows="50" class="text-sm border border-gray-300 block h-24 w-full rounded-md"
              placeholder="Enter any additional items (and their quantities) not included in the list here."
              wire:model.lazy="quoteRequest.items_list"></textarea>
</div>