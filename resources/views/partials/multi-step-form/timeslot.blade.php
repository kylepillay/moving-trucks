<div class="col-span-6">
    <select class="rounded-md w-full" id="timeslot" wire:model="quoteRequest.timeslot">
        <option value="" selected="selected">Select an Option</option>
        <option value="Morning">Morning</option>
        <option value="Midday">Midday</option>
        <option value="Afternoon">Afternoon</option>
        <option value="Flexible">Flexible</option>
        Morning
        Midday
        Afternoon
        Flexible
    </select>
    <x-jet-input-error for="quoteRequest.timeslot" class="items-center px-4" />
</div>
