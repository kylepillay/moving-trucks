<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\QuoteRequest;

class VersionDropdown extends Component
{

    public array $versions;
    public QuoteRequest $quote;

    /**
     * Create a new component instance.
     *
     * @param QuoteRequest $quote
     */
    public function __construct(string $quote)
    {
        $this->quote = json_decode($quote);
        $this->versions = $quote->versions->first();
        ray($this->versions);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.select-field');
    }
}
