<?php

namespace App\Mail;

use App\Models\Inventory;
use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Collection;

class NewQuoteRequestUser extends Mailable
{
    use Queueable, SerializesModels;

    public QuoteRequest $quote;
    public Collection $inventory;
    public int $volumeTotal = 0;

    /**
     * Create a new message instance.
     *
     * @param QuoteRequest $quote
     */
    public function __construct(QuoteRequest $quote)
    {
        $this->quote = $quote;
        $this->inventory = Inventory::all();

        foreach ($this->quote->lineItems->filter(function ($item) { return $item->quantity > 0; }) as $lineItem) {
            $this->volumeTotal += $lineItem->inventoryItem->volume;
        }
    }

    /**
     * Build the message.
     *
     * @return NewQuoteRequestUser
     */
    public function build(): NewQuoteRequestUser
    {
        return $this->markdown('emails.quotes.request-user')->with(
            ['total' => $this->volumeTotal,
                'quote' => $this->quote,
                'user' => $this->quote->user,
                'inventory' => $this->inventory])->subject(
                    $this->quote->identifier .' || '. $this->quote->user->name . ' from ' . $this->quote->from_address . ' to ' . $this->quote->to_address . ' || ' . $this->quote->requested_date);
    }
}
