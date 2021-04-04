<div class="relative">
    <select class="mt-1 block w-full text-sm pl-4 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm py-2 px-6 text-lg" id="{{ $attributes['model'] }}" wire:model="{{ $attributes['model'] }}">
        @foreach($versions as $version)
            <option value="{{ $version }}">{{$version}}</option>
        @endforeach
    </select>
</div>