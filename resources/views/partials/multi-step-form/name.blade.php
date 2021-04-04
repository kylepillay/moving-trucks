<div class="col-span-6">
    <x-jet-input id="name" placeholder="First Name" type="text" class="mt-1 block w-full" wire:model="user.name" autocomplete="name" />
    <x-jet-input-error for="user.name" class="items-center px-4" />
</div>