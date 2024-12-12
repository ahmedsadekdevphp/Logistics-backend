<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class OrderStatusEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $order;
    public $subject;
    public $body;


    /**
     * Create a new message instance.
     */
    public function __construct($order, $subject, $body)
    {
        $this->order = $order;
        $this->subject = $subject;
        $this->body = $body;
    }


    public function build()
    {
        return $this->subject($this->subject)
        ->view('emails.order-status') 
                    ->with([
                        'order' => $this->order,
                        'body' => $this->body,
                    ]);
    }



    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.order-status',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
