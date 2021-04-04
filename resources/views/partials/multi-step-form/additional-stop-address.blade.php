<div class="col-span-6">
    <x-jet-input id="additional_stop_address"  placeholder="Enter the pickup Address" type="text" class="mt-1 block w-full" wire:model.lazy="quoteRequest.additional_stop_address" />
    <x-jet-input-error for="quoteRequest.additional_stop_address" class="items-center px-4" />
</div>

<script>

    window.addEventListener('load', initializeGoogleMapsElements)

    function initializeGoogleMapsElements() {

        const fromAddress = document.getElementById('additional_stop_address');
        const fromAddressMapsInstance = new google.maps.places.Autocomplete(fromAddress);
        fromAddressMapsInstance.setComponentRestrictions({'country': 'ZA'});
    }
</script>


