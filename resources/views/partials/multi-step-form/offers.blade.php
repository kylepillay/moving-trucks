<div class="w-full h-full">
    <div class="w-full">
        <div class="rounded-md bg-white">
            <div class="text-gray-600 text-sm px-4 py-2 mb-3">Distance calculated: <span class="text-gray-900 font-bold">{{ $quoteRequest->distance }} Km</span>
            </div>
        </div>
    </div>
    @foreach($calculatedCosts as $calculatedCost)
        <div class="flex flex-row items-center py-1 rounded-md bg-white mb-2">
            <div class="flex flex-1">
                <div class="flex flex-col items-start text-left content-start w-full">
                    <div class="font-bold text-sm text-gray-900 w-full flex flex-row justify-between border-b border-gray-200 py-1 pl-4">
                        <div class="w-18">{{$calculatedCost['label']}}</div>
                        <div class="flex items-end justify-start flex-row px-2 w-1/3 mr-6">
                            @for ($i = 0; $i < $calculatedCost['numberOfPeople']; $i++)
                                <img src="{{ asset('images/person-standing-icon.svg') }}" class="w-3 max-h-6 pl-1" />
                            @endfor
                        </div>
                        <div class="flex items-end justify-end {{ $loop->index === 4 ? 'pl-4' : '' }}">
                            <div>
                                <img src="{{ asset('images/truck-icon.svg') }}" class="w-{{ $loop->index === 4 ? 12 : $loop->index + 5 }} pl-1" />
                            </div>
                        </div>
                    </div>
                    <div class="font-bold text-sm text-gray-600 text w-full flex flex-row py-1 pl-4">Estimate:  <div class="pl-3 text-red-500">R {{ $loop->index > 0 ? round($calculatedCosts[ $loop->index - 1]['price'], 2) : '300' }} - {{ round($calculatedCost['price'], 2) }}</div></div>
                </div>
            </div>
            <div class="flex items-center content-center px-4">
                <button wire:loading.attr="disabled" type="submit" class="bg-red-800 hover:bg-gray-700 text-white font-bold w-16 py-2 rounded flex flex-1 items-center content-center text-sm">
                    <div class="w-full text-center">{{  __('Explore Quote') }}</div>
                </button>
            </div>
        </div>
    @endforeach
</div>