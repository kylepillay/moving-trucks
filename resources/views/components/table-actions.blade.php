<div class="flex flex-row justify-between">
    @if(Auth::user()->hasRole('admin'))
        @if($text === 'Pending')
            <a href="{{ route('admin.quote', [ $row->{'quote_requests.id'} ]) }}"
                    class="bg-red-500 hover:bg-red-600 text-white font-bold h-9 px-3 rounded inline-flex items-center mr-4 text-sm w-28 flex items-center justify-center">
                <img class="w-4 h-4 mr-2"
                     src="{{ asset('images/edit-white.svg') }}"/>
                <span class="pt-0.5">View</span>
            </a>
        @elseif($text === 'Confirmed')
            <a href="{{ route('admin.quote', [ $row->{} ]) }}"
                    class="bg-green-500 hover:bg-green-600 text-white font-bold h-9 px-3 rounded inline-flex items-center mr-4 text-sm w-28 flex items-center justify-center">
                <img class="w-4 h-4 mr-2"
                     src="{{ asset('images/edit-white.svg') }}"/>
                <span class="pt-0.5">Send</span>
            </a>
        @elseif($text === 'Complete')
            <a href="{{ route('admin.quote', [ $row->{'quote_requests.id'} ]) }}"
                    class="bg-gray-500 hover:bg-gray-600 text-white font-bold h-9 px-3 rounded inline-flex items-center mr-4 text-sm w-28 flex items-center justify-center">
                <img class="w-4 h-4 mr-2"
                     src="{{ asset('images/edit-white.svg') }}"/>
                <span class="pt-0.5">Remind</span>
            </a>
        @endif
    @else
        <button
                class="bg-blue-500 hover:bg-blue-600 text-white font-bold h-9 px-3 rounded inline-flex items-center mr-4 text-sm">
            <img class="w-4 h-4 mr-2"
                 src="{{ asset('images/edit-white.svg') }}"/>
            <span class="pt-0.5">{{ __('View') }}</span>
        </button>
    @endif
</div>