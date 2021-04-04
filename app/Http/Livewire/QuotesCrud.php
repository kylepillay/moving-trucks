<?php

namespace App\Http\Livewire;

use App\Mail\QuoteRequestRemind;
use App\Mail\QuoteRequestUpdated;
use App\Models\QuoteRequest;
use App\Models\User;
use DB;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use JetBrains\PhpStorm\ArrayShape;
use Livewire\Component;
use Livewire\WithPagination;

class QuotesCrud extends Component
{
    use WithPagination;

    public bool $modalFormVisible = false;
    public bool $modalConfirmDeleteVisible = false;
    public int|null $modelId = null;
    public string $query = '';
    public int $perPage = 10;
    public int $volumeTotal = 0;


    /**
     * Put your custom public properties here!
     */
    public QuoteRequest|array $quote = [];
    public User|array $user = ['name', 'email', 'phone'];
    public Collection|array $lineItems = [];
    public Collection|array $additionalLineItems = [];

    /**
     * The validation rules
     *
     * @return array
     */
    #[ArrayShape(['quote.price' => "string", 'quote.terms' => "string"])] public function rules(): array
    {
        return [
            'quote.price' => 'required|string',
            'quote.terms' => 'string'
        ];
    }

    public function mount(QuoteRequest $quote) {
        if ($quote->id) {
            $this->updateShowModal($quote->id);
        } else {
            $this->quote = new QuoteRequest();
            $this->lineItems = $this->quote->lineItems()->where('is_additional', false)->get();
            $this->user = new User();
        }
    }


    /**
     * The update function
     *
     * @return void
     */
    public function send(int $id)
    {
        $this->modelId = $id;
        $this->quote = QuoteRequest::findOrFail($id);

        \Mail::to(User::findOrFail($this->quote->user_id))->send(new QuoteRequestUpdated($this->quote));

        session()->flash('message', 'Quote update email successfully sent.');
    }

    /**
     * The update function
     *
     * @return void
     */
    public function remind(int $id)
    {
        $this->modelId = $id;
        $this->quote = QuoteRequest::findOrFail($id);

        \Mail::to(User::findOrFail($this->quote->user_id))->send(new QuoteRequestRemind($this->quote));

        session()->flash('message', 'Quote reminder successfully sent.');
    }

    public function render(): Factory|View|Application
    {
        return view('livewire.quotes-crud');
    }
}