<?php


namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Barryvdh\DomPDF\Facade\Pdf;

class PaymentInvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }

    public function build()
    {
        // return $this->subject('Your Payment Invoice')
        //             ->view('emails.payment_invoice');

        // PDF তৈরি করা
        $pdf = Pdf::loadView('emails.invoice', ['order' => $this->order])->setOptions(['isRemoteEnabled' => true]);

        return $this->subject('Payment Invoice')
            ->view('emails.payment_invoice') // আপনার ইমেইলের Blade view
            ->attachData($pdf->output(), 'invoice.pdf', [
                'mime' => 'application/pdf',
            ]);


    }
}
