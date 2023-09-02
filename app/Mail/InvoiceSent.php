<?php

namespace App\Mail;

use App\Models\Tenant;
use App\Services\InvoiceTenant;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class InvoiceSent extends Mailable
{
    use Queueable, SerializesModels;


    public $tenant;
    public $new_data;

    public function __construct(Tenant $tenant, array $new_data)
    {
        $this->tenant = $tenant;
        $this->new_data = $new_data;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Invoice',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'emails.invoicesent',
            with: ['tenant' => $this->tenant]
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [
            Attachment::fromData(fn () => InvoiceTenant::invoiceTenant($this->tenant, $this->new_data), 'Invoice.pdf')
                ->withMime('application/pdf')
        ];
    }
}
