<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use PDF;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public $invoice;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $invoice)
    {
        $this->order = $order;

        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.order.placed')
            ->attachData($this->invoice, 'invoice.pdf', [
                'mime' => 'application/pdf',
            ]);
    }
}
