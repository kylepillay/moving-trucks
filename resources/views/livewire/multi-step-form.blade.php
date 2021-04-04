<div class="flex flex-1 flex-col items-center">
    <div class="xl:w-5/12 lg:w-6/12 md:w-8/12 w-full flex items-center flex-col px-4"
         x-data="{ typing: false, stepNow: @entangle('currentStep'), dataForStep: @entangle('stepData') }"
         x-init="$watch('stepNow', value => { if (!dataForStep.delay) return; typing = true; setTimeout(() => typing = false, (dataForStep.delay + 1) * 1000) })">
        @if($stepData['message'])
            <div class="flex flex-row w-full mx-4 mt-8 shadow-md ">
                <div class="w-12 h-12 mr-2">
                    <img class="w-12 h-12 rounded-full border-white border-opacity-40 border-2" src="{{ asset('images/raj.jpg') }}" />
                </div>
                <div class="flex flex-row w-full items-center bg-white px-6 py-3 rounded-2xl rounded-tl-none border-2 border-red-400">
                    <div class="dot-pulse ml-3" x-show="typing"></div>
                    <div class="text-gray-600 text-left" x-show="!typing">@foreach(explode(':', $stepData['message']) as $line)<div>{{ $line }}</div>@endforeach</div>
                </div>
            </div>
        @endif

        <div x-show="!typing" class="flex flex-col w-full items-center {{ array_key_exists('background', $stepData) ? 'bg-white p-5': 'bg-transparent' }} {{ array_key_exists('marginTop', $stepData) ? 'mt-8': 'mt-4' }} rounded-2xl mb-8">
            <x-jet-form-section submit="nextStep">
                <x-slot name="title"></x-slot>
                <x-slot name="description"></x-slot>
                <x-slot name="form">
                    <input type="hidden" autocomplete="false" />
                    @if($stepData['markup'])
                        @include('partials.multi-step-form.'.$stepData['markup'], ['step' => $currentStep, 'inventory' => $inventory])
                    @endif
                </x-slot>
                <x-slot name="actions">
                    <x-jet-action-message class="mr-3" on="saved">
                        {{ __('Saved.') }}
                    </x-jet-action-message>

                    <div class="flex flex-1 justify-between">
                        @if($stepData['back_button_message'])
                            <x-jet-button wire:click.prevent="goToPreviousStep" type="button"
                                          class="bg-blue-900 hover:bg-blue-800 mr-4">
                                {{ $stepData['back_button_message'] }}
                            </x-jet-button>
                        @else
                            <div class="flex flex-1"></div>
                        @endif

                        @if($stepData['button_message'])
                            <x-jet-button wire:loading.attr="disabled" wire:click.prevent="nextStep"
                                          class="bg-red-900 hover:bg-red-800 {{ $stepData['back_button_message'] ? '' : 'w-full' }}">
                                {{$stepData['button_message']}}
                            </x-jet-button>
                        @endif
                    </div>
                </x-slot>
            </x-jet-form-section>
        </div>
    </div>
</div>
