<?php

namespace App\Mail;

use App\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderPlaced extends Mailable
{
    use Queueable, SerializesModels;

    public $order;
    public $ongkirs;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($order, $ongkirs)
    {
        $this->order = $order;
        $this->ongkirs = $ongkirs;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return  $this->from('email@gmail.com')
                    ->to('email@gmail.com')
                    ->subject('Pembelian BibitBunga.com')
                    ->markdown('emails.orders.placed');
    }
}
