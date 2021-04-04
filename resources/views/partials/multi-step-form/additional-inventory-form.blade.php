<div class="col-span-6">
    <div class="flex flex-row">
        <div class="flex flex-1 items-center pl-4 text-lg font-bold text-white">Item</div>
        <div class="w-16 py-4 mr-4 ml-2 text-lg font-bold text-white">Quantity</div>
    </div>
    @foreach($inventory as $item)
        <div class="bg-gray-{{ $loop->even ? '200' : '100' }} flex flex-row rounded-md mb-2">
            <div class="flex flex-1 items-center pl-4">{{ $item['item'] }}</div>
            <div class="w-32 py-4 mr-4 ml-2">
                <x-jet-input id="selected_inventory_additional.{{ $item['id'] }}" type="number" class="w-full" wire:model="selected_inventory_additional.{{ $item['id'] }}" />
            </div>
        </div>
    @endforeach
</div>

