<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaCompra extends Mailable
{
    use Queueable, SerializesModels;
    public $compra;
    public $movie;
    public $ticketsVendidos;
    public $sala;
    public $cartelera;
    /**
     * Create a new message instance.
     */
    public function __construct($compra, $movie, $ticketsVendidos,$sala,$cartelera)
    {
        $this->compra = $compra;
        $this->movie = $movie;
        $this->ticketsVendidos = $ticketsVendidos;
        $this->sala = $sala;
        $this->cartelera = $cartelera;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Compra',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'view.NuevaCompra',
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
