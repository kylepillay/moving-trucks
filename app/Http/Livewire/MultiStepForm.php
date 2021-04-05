<?php

namespace App\Http\Livewire;

use App\Mail\NewQuoteRequest;
use App\Mail\NewQuoteRequestUser;
use App\Models\CostTiers;
use App\Models\Inventory;
use App\Models\QuoteLineItem;
use App\Models\QuoteRequest;
use App\Models\User;
use Auth;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use App\Classes\GoogleDistance;
use Str;

class MultiStepForm extends Component
{
    public QuoteRequest $quoteRequest;
    public User|null $user;
    public Collection $inventory;
    public array $selected_inventory = [];
    public array $selected_inventory_additional = [];
    public int $distance;
    public array $calculatedCosts = [];
    public Collection $costTiers;

    public array $stepData = [
        'message' => '',
        'rules' => [],
        'button_message' => ''
    ];

    protected array $rules = [

        'quoteRequest.from_address' => 'required|string',
        'quoteRequest.to_address' => 'required|string',
        'quoteRequest.requested_date' => 'required',
        'quoteRequest.distance' => 'required|string',
        'quoteRequest.collection_address_description' => 'required|string',
        'quoteRequest.delivery_address_description' => 'required|string',
        'quoteRequest.items_list' => 'string',
        'quoteRequest.special_instructions' => 'string',
        'quoteRequest.timeslot' => 'string',

        'user.name' => 'string|required',
        'user.email' => 'unique:users,email|required',
        'user.phone' => 'string|required'
    ];

    public array $formFlow;
    /**
     * @var int
     */
    public int $currentStep;
    /**
     * @var int
     */
    public int $previousStep = 1;
    /**
     * @var int
     */
    public int $maxStep = 0;

    public string $password = '';

    public bool $typing = false;

    public string $query = '';


    public function mount(User $user)
    {
        $this->quoteRequest = new QuoteRequest();

        if (Auth::check()) {
            $this->user = Auth::user();
        } else {
            $this->user = $user;
        }

        $this->distance = 0;
        $this->costTiers = CostTiers::all();
        $this->inventory = Inventory::all()->sortBy('position');

        foreach ($this->inventory as $item) {
            $this->selected_inventory[($item->id)] = 0;
            $this->selected_inventory_additional[($item->id)] = 0;
        }

        $this->getStepConfig();

        $this->currentStep = 1;
        $this->stepData = $this->formFlow[$this->currentStep];
    }

    public function calculateDistanceAndCosts()
    {
        $calculator = new GoogleDistance();
        $distanceInMetres = $calculator->calculate($this->quoteRequest->from_address, $this->quoteRequest->to_address);
        $distanceInKilometres = floor($distanceInMetres / 1000);
        $this->quoteRequest->distance = $distanceInKilometres;

        $numberOfPeople = 2;
        foreach ($this->costTiers as $costTier) {

            $calculatedItem = [
                'label' => $costTier['label'],
                'price' => ($costTier['cost_per_km'] * $distanceInKilometres) + $costTier['minimum_charge'],
                'numberOfPeople' => $numberOfPeople
            ];

            array_push($this->calculatedCosts, $calculatedItem);

            $numberOfPeople++;
        }
    }

    private function getStepConfig(): array
    {
        return $this->formFlow = [
            1 => [
                'message' => false,
                'button_message' => 'Get Offers',
                'back_button_message' => false,
                'markup' => 'start',
                'rules' => [
                    'quoteRequest.from_address' => 'required',
                    'quoteRequest.to_address' => 'required'
                ],
                'back_function' => false,
                'delay' => 0
            ],
            2 => [
                'message' => false,
                'button_message' => false,
                'markup' => 'offers',
                'rules' => [],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 0
            ],
            3 => [
                'message' => "Hi Raj here from Moving Trucks.:I will assist with your quote.:Tell me your name?",
                'rules' => [
                    'user.name' => 'string'
                ],
                'markup' => 'name',
                'button_message' => 'Continue',
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            4 => [
                'message' => 'Hi ' . $this->user->name . '!:With a few quick questions I\'ll get you the best price for the move.',
                'button_message' => 'Continue',
                'markup' => 'greeting',
                'rules' => [],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            5 => [
                'message' => 'Describe the collection address ' . $this->quoteRequest->from_address . '?',
                'button_message' => 'Continue',
                'markup' => 'collection-address',
                'rules' => [
                    'quoteRequest.collection_address_description' => 'required'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 1
            ],
            6 => [
                'message' => 'Describe the delivery address ' . $this->quoteRequest->to_address . '?',
                'button_message' => 'Continue',
                'markup' => 'delivery-address',
                'rules' => [
                    'quoteRequest.delivery_address_description' => 'required'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 1
            ],
            7 => [
                'message' => 'Choose the date.',
                'button_message' => 'Continue',
                'markup' => 'requested-date',
                'rules' => [
                    'quoteRequest.requested_date' => 'required'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            8 => [
                'message' => 'Choose a timeslot.',
                'button_message' => 'Continue',
                'markup' => 'timeslot',
                'rules' => [
                    'quoteRequest.timeslot' => 'required'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            9 => [
                'message' => 'Let\'s see what we are moving for you?',
                'button_message' => 'Continue',
                'markup' => 'inventory-form',
                'rules' => [],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            10 => [
                'message' => 'Are there any special instructions you would like the team to know about?',
                'button_message' => 'Continue',
                'markup' => 'special-instructions',
                'rules' => [
                    'quoteRequest.special_instructions' => 'string'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            11 => [
                'message' => 'Here is a summary of your selections. You may click the back button to go back and edit any of your answers.',
                'button_message' => 'Calculate',
                'markup' => 'summary',
                'rules' => [],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            12 => [
                'message' => 'I will need a few minutes to find you the best team and the best price.',
                'button_message' => 'Continue',
                'markup' => false,
                'rules' => [],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            13 => [
                'message' => 'Give me your cellphone number to call you back when the quote is ready.',
                'button_message' => 'Continue',
                'markup' => 'cell-number',
                'rules' => [
                    'quoteRequest.phone' => 'string'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            14 => [
                'message' => 'Give me your email address so I email you the formal quote.',
                'button_message' => 'Continue',
                'markup' => 'email-address',
                'rules' => [
                    'user.email' => 'unique:users,email'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            15 => [
                'message' => 'Please choose a password to use for logging in and viewing your quotes.',
                'button_message' => 'Continue',
                'markup' => 'password',
                'rules' => [
                    'quoteRequest.password' => 'string|required'
                ],
                'back_function' => 'goToPreviousStep',
                'back_button_message' => 'Go Back',
                'delay' => 2
            ],
            16 => [
                'message' => 'Thank you for the information. I will email you the quote shortly.',
                'button_message' => false,
                'markup' => 'finish',
                'rules' => [],
                'back_function' => false,
                'back_button_message' => false,
                'delay' => 3
            ],
        ];
    }

    public function render(): Factory|View|Application
    {
        $this->getStepConfig();

        if ($this->stepData['markup'] === 'inventory-form') {
            $query = '%' . $this->query . '%';
            $this->inventory = Inventory::where('item', 'like', $query)->get()->sortBy('position');
        }

        return view('livewire.multi-step-form');
    }

    public function decrementItem($id)
    {
        $this->selected_inventory[($id)] = $this->selected_inventory[($id)] <= 0 ? 0 : $this->selected_inventory[($id)] - 1;
    }

    public function incrementItem($id)
    {
        $this->selected_inventory[($id)] = $this->selected_inventory[($id)] + 1;
    }

    public function changeStep($step)
    {
        if ($this->maxStep < $step) {
            return;
        }

        $this->currentStep = $step;
    }

    public function goToPreviousStep(int $step = 0)
    {
        $tempCurrent = $this->currentStep;
        $this->currentStep = $tempCurrent - 1;
        $this->previousStep = $tempCurrent - 2;
        $this->stepData = $this->formFlow[$this->currentStep];
    }

    public function restartForm(int $step = 1)
    {
        $this->quoteRequest = new QuoteRequest();
        $this->currentStep = $step;
        $this->stepData = $this->formFlow[$this->currentStep];
    }

    public function nextStep()
    {
        if ($this->currentStep === 15) {

            if (!Auth::check()) {
                $this->user->password = Hash::make($this->password);
                $this->user->identifier = 'identifier';
                $this->user->save();

                $this->user->assignRole(['client']);
            }

            $this->quoteRequest->user_id = $this->user->id;
            $this->quoteRequest->identifier = $this->user->identifier.'-'.strval(mt_rand(1000, 9999));

            $volumeTotal = 0;

            foreach ($this->selected_inventory as $key => $value) {
                $inventoryItem = Inventory::findOrFail($key);
                $volumeTotal += $inventoryItem->volume;
            }

            $this->quoteRequest->volume = $volumeTotal;
            $this->quoteRequest->save();

            foreach ($this->selected_inventory as $key => $value) {
                $lineItem = new QuoteLineItem([
                    'quote_request_id' => $this->quoteRequest->id,
                    'quantity' => $value,
                    'inventory_id' => $key
                ]);
                $lineItem->save();
            }

            $this->currentStep = 16;

            $this->stepData = $this->formFlow[$this->currentStep];

            \Mail::to(User::findOrFail(1))->queue(new NewQuoteRequest($this->quoteRequest));
            \Mail::to(User::findOrFail($this->user->id))->queue(new NewQuoteRequestUser($this->quoteRequest));

            $this->emit('stepChanged', $this->stepData['delay']);

            return;
        }

        foreach ($this->formFlow[$this->currentStep]['rules'] as $key => $value) {
            $this->validateOnly($key);
        }

        $this->previousStep = $this->currentStep;

        if ($this->currentStep === 1) {
            $this->calculateDistanceAndCosts();
        }

        if (Auth::check()) {
            $this->currentStep = match ($this->currentStep) {
                2 => 4,
                12, 13, 14, 15 => 16,
                default => $this->currentStep + 1,
            };
        } else {
            $this->currentStep = $this->currentStep + 1;
        }

        $this->emit('stepChanged', $this->stepData['delay']);

        $this->stepData = $this->formFlow[$this->currentStep];
        $this->maxStep = max($this->maxStep, $this->currentStep);
    }
}
