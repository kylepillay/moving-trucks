<?php

namespace App\Mail;

use App\Models\QuoteRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuoteRequestRemind extends Mailable
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
     * @return QuoteRequestRemind
     */
    public function build(): QuoteRequestRemind
    {
        return $this->markdown('emails.quotes.remind')->with(['quote' => $this->quote]);
    }
}
