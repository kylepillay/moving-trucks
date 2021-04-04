<?php

namespace App\Http\Livewire;

use App\Models\Inventory;
use App\Models\QuoteLineItem;
use App\Models\QuoteRequest;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;

class UpdateQuote extends Component
{

    public int|null $modelId = null;
    public int $volumeTotal = 0;
    public int $selectedVersion;
    public Collection $versions;
    public array $versionsIterable;

    public QuoteRequest $quote;
    public User|array $user = ['name', 'email', 'phone'];
    public Collection|array $lineItems = [];
    public Collection|array $additionalLineItems = [];
    public bool $modalConfirmDeleteVisible = false;
    public Collection|array $inventory = [];
    public array $selected_inventory = [];

    /**
     * The validation rules
     *
     * @return array
     */
    #[ArrayShape(['quote.price' => "string", 'quote.terms' => "string"])] public function rules(): array
    {
        return [
            'user.name' => 'required|string',
            'user.phone' => 'required|string',
            'user.email' => 'string',
            'quote.from_address' => 'string',
            'quote.to_address' => 'string',
            'quote.requested_date' => 'string',
            'quote.timeslot' => 'string',
            'quote.collection_address_description' => 'string',
            'quote.delivery_address_description' => 'string',
            'quote.special_instructions' => 'string',
            'quote.price' => 'string',
            'quote.terms' => 'string',
            'selectedVersion' => 'string'
        ];
    }

    public function mount(QuoteRequest $quote) {

        if ($quote['id']) {
            $this->modelId = $quote['id'];
            $this->quote = QuoteRequest::findOrFail($this->modelId);
            $this->loadModel();
            $this->user = User::findOrFail($this->quote->user_id);
        } else {
            $this->quote = new QuoteRequest();
            $this->lineItems = $this->quote->lineItems()->where('is_additional', false)->get();
        }
        foreach ($this->lineItems as $lineItem) {
            $this->selected_inventory[($lineItem->inventory_id)] = $lineItem->quantity;
        };

        $this->versions = $this->quote->versions->reverse();
        $this->versionsIterable = $this->quote->versions->reverse()->all();
        $this->selectedVersion = $this->quote->versions->last()->version_id;

        $this->inventory = Inventory::all()->sortBy('position');
    }

    public function updateSelectedVersion() {
        $this->quote = $this->versions->where('version_id', $this->selectedVersion)->first()->getModel();
        $this->loadModel();
    }

    /**
     * Loads the model data
     * of this component.
     *
     * @return void
     */
    public function loadModel()
    {
        $this->lineItems = $this->quote->lineItems()->get();
        $this->volumeTotal = 0;

        foreach ($this->lineItems as $lineItem) {
            $this->selected_inventory[($lineItem->inventory_id)] = $lineItem->quantity;
            $this->volumeTotal += $lineItem->inventoryItem->volume;
        };

        if ($this->quote->price) {
            $this->quote->price = sprintf("%.2f", $this->quote->price);
        }

        $this->user = User::findOrFail($this->quote->user_id);
    }

    public function update() {
        $this->volumeTotal = 0;
        $this->quote->lineItems()->delete();

        foreach ($this->selected_inventory as $key => $value) {
            $lineItem = new QuoteLineItem([
                'quote_request_id' => $this->quote->id,
                'quantity' => $value,
                'inventory_id' => $key
            ]);
            $this->volumeTotal += $lineItem->inventoryItem->volume;
            $lineItem->save();
        }

        $this->quote->volume = $this->volumeTotal;
        $this->quote->save();
        $this->user->save();
    }

    /**
     * The delete function.
     *
     * @return void
     * @throws Exception
     * @throws Exception
     */
    public function delete()
    {
        $this->quote->delete();
        $this->modalConfirmDeleteVisible = false;
    }

    /**
     * Shows the delete confirmation modal.
     *
     * @return void
     */
    public function deleteShowModal()
    {
        $this->modalConfirmDeleteVisible = true;
    }

    public function render()
    {
        return view('livewire.update-quote');
    }
}
