<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-600 leading-tight">
        @if(Auth::user()->hasRole('admin')){{ __('Manage Quotes') }}@else{{ __('My Quotes') }}@endif
    </h2>
</x-slot>
<div class="py-8">
    <div class="max-w-7xl mx-auto">
        <div class="p-5 flex items-start justify-between">
            <div class="flex flex-col">
                <img class="mb-4 w-32" src="{{ asset('/images/moving-trucks-logo-dark.png') }}">
                <span class="text-gray-600 font-bold text-xl">{{ __('Quote: ') }} <span
                            class="text-gray-500 font-medium">{{$quote->identifier.Str::padLeft($versionsIterable[sizeof($versionsIterable) - 1]['version_id'], 3 ,'000') }}</span></span>
            </div>

            <div class="flex flex-col justify-center">
                <span class="text-gray-500 text-2xl"><span class="font-bold mr-4">Estimate:</span><span
                            class="{{ $quote->price ? 'text-green-600' : 'text-yellow-600' }} font-bold">{{ $quote->price ? 'R '.sprintf("%.2f", $quote->price) : 'Pending'  }}</span></span>
                <div class="flex flex-col mt-4">
                    <div class="text-gray-500 text-xl flex flex-row items-center">
                        <span class="font-bold mr-4">Version:</span>
                        <select class="block w-28 text-sm pl-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm py-1 px-4 text-lg"
                                id="selectedVersion" wire:model="selectedVersion" wire:change="updateSelectedVersion">
                            @foreach($versionsIterable as $version)
                                <option value="{{ $version['version_id'] }}">{{ $version['version_id'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

            </div>


            @can('manage')
                @if( $quote->status_id > 1)
                    <div class="flex flex-row items-center">
                        <button wire:click="remind" wire:loading.attr="disabled"
                                class="text-xl bg-gray-500 hover:bg-blue-500 text-white font-bold py-4 px-10 rounded-xl inline-flex items-center">
                            <span>Remind</span>
                        </button>
                    </div>
                @endif
            @endif

        </div>
        <div class="grid grid-cols-12 gap-4">
            <!-- BEGIN: Profile Menu -->
            <div class="col-span-12 lg:col-span-12 xxl:col-span-12 flex lg:block flex-col text-sm">
                <div>
                    <div class="p-5">
                        <x-text-field title="Client Name" model="user.name"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Client Phone Number" model="user.phone"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Client Email Address" model="user.email"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Collection Address" model="quote.from_address"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Delivery Address" model="quote.to_address"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Requested Delivery Date" model="quote.requested_date"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-select-field title="Time Slot" model="quote.timeslot"></x-select-field>
                    </div>
                    <x-jet-input-error for="quoteRequest.timeslot" class="items-center px-4"></x-jet-input-error>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Collection Address Description"
                                      model="quote.collection_address_description"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Delivery Address Description"
                                      model="quote.delivery_address_description"></x-text-field>
                    </div>
                    <div class="p-5 border-t border-gray-200">
                        <x-text-field title="Special Instructions" model="quote.special_instructions"></x-text-field>
                    </div>
                </div>
            </div>
            <!-- END: Profile Menu -->
            <div class="col-span-12 lg:col-span-12 xxl:col-span-12">
                <!-- BEGIN: Daily Sales -->
                <div class="intro-y box lg:mt-5 p-5">
                    <div class="flex items-center py-5 sm:py-3 border-b border-gray-200">
                        <h1 class="mr-auto">Item List</h1>
                    </div>
                    <div class="py-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-gray-200">
                                <tbody>
                                @foreach($inventory as $item)
                                    @if($selected_inventory[$item['id']] > 0)
                                        <div class="bg-gray-200 flex flex-row rounded-md mb-2 ">
                                            <div class="flex flex-1 items-center pl-3 text-sm">{{ $item['item'] }}</div>
                                            <div class="w-36 py-2 mr-3 ml-2 flex flex-row items-center">
                                                <img src="{{ asset('images/minus.svg') }}"
                                                     class="w-5 h-5 active:opacity-50 cursor-pointer"
                                                     wire:click="decrementItem({{ $item['id'] }})"/>
                                                <input id="selected_inventory.{{ $item['id'] }}" type="number"
                                                       class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm text-lg w-full mx-2 text-center"
                                                       wire:model="selected_inventory.{{ $item['id'] }}"/>
                                                <img src="{{ asset('images/add.svg') }}"
                                                     wire:click="incrementItem({{ $item['id'] }})"
                                                     class="w-5 h-5 active:opacity-50 cursor-pointer"/>
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach
                                        @can('manage')
                                            <tr class="bg-gray-200 text-gray-700 text-sm">
                                                <td class="px-6 py-4">#</td>
                                                <td class="px-6 py-4 font-bold">Total Volume:</td>
                                                <td class="px-6 py-4"></td>

                                                <td class="px-6 py-4">{{ $volumeTotal }}</td>
                                            </tr>
                                        @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- END: Daily Sales -->
                @if(Auth::user()->hasRole('admin'))
                    <div class="intro-y box lg:mt-5">
                        <div class="flex items-center px-5 py-5 sm:py-3 border-b border-gray-200">
                            <h2 class="mr-auto">Administration</h2>
                        </div>
                        <div class="p-5">
                            <label class="text-gray-600">Price</label>
                            <div class="relative">
                                <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 dark:bg-dark-1 dark:border-dark-4 border text-gray-600">
                                    R
                                </div>
                                <x-jet-input id="name" type="text" class="mt-1 block w-full text-sm pl-12"
                                             wire:model="quote.price" autocomplete="none"></x-jet-input>
                                <x-jet-input-error for="quote.price" class="items-center px-4"></x-jet-input-error>
                            </div>

                            <div class="mt-3">
                                <label class="text-gray-600">Terms and Conditions</label>
                                <textarea id="quote_terms" rows="50"
                                          class="text-sm border border-gray-300 block h-36 w-full rounded-md"
                                          placeholder="Enter any terms associated with the price given"
                                          wire:model.lazy="quote.terms"></textarea>
                                <x-jet-input-error for="quote.terms" class="items-center px-4"/>
                            </div>
                            <div class="w-full py-4">
                                <x-jet-button wire:loading.attr="disabled"
                                              class="bg-{{$quote->status_id === 1 ? 'green' : 'gray'}}-500 hover:bg-{{$quote->status_id === 1 ? 'green' : 'gray'}}-600 w-full"
                                              wire:click="update">
                                    @if($quote->status_id === 1)
                                        Send
                                    @elseif($quote->status_id === 2)
                                        Remind
                                    @endif
                                </x-jet-button>
                            </div>
                        </div>

                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
