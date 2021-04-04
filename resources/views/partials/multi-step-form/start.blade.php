<div class="col-span-6">
    <x-jet-input id="from_address"  placeholder="Collection address" type="text" class="mt-1 block w-full" wire:model.lazy.debounce.500ms="quoteRequest.from_address" />
    <x-jet-input-error for="quoteRequest.from_address" class="items-center px-4" />
</div>

<div class="col-span-6 mt-3">
    <x-jet-input id="to_address" placeholder="Delivery address" type="text" class="mt-1 block w-full" wire:model.lazy.debounce.500ms="quoteRequest.to_address" />
    <x-jet-input-error for="quoteRequest.to_address" class="items-center px-4" />
</div>

<script>

    window.addEventListener('load', initializeGoogleMapsElements)

    function initializeGoogleMapsElements() {

        const fromAddress = document.getElementById('from_address');
        const toAddress = document.getElementById('to_address');

        const fromAddressMapsInstance = new google.maps.places.Autocomplete(fromAddress);
        const toAddressMapsInstance = new google.maps.places.Autocomplete(toAddress);

        fromAddressMapsInstance.addListener('place_changed', function() {
            let ev = new InputEvent("input");
            fromAddress.dispatchEvent(ev);
            toAddress.dispatchEvent(ev);
        })

        fromAddressMapsInstance.setComponentRestrictions({'country': 'ZA'});
        toAddressMapsInstance.setComponentRestrictions({'country': 'ZA'});
    }
</script>