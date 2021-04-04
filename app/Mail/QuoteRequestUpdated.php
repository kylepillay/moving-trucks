<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestUpdated extends Mailable
{
    use Queueable, SerializesModels;

    public QuoteRequest $quote;

    /**
     * Create a new message instance.
     *
     * @param QuoteRequest $quote
     */
    public function __construct(QuoteRequest $quote)
    {
        $this->quote = $quote;
    }

    /**
     * Build the message.
     *
     * @return QuoteRequestUpdated
     */
    public function build(): QuoteRequestUpdated
    {
        return $this->markdown('emails.quotes.updated')->with(['quote' => $this->quote]);
    }
}
