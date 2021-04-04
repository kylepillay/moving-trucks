@props(['for'])

@error($for)
<div class="rounded-md bg-white mt-2 bg-opacity-50 flex items-center py-2">
    <div {{ $attributes->merge(['class' => 'text-md text-red-600']) }}>{{ $message }}</div>
</div>
@enderror
