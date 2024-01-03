<?php

namespace App\Mail;

use App\Models\Tarea;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NuevaTareaMail extends Mailable
{
    use Queueable, SerializesModels;

    public $tarea;
    public $fecha_limite;
    public $url;
    /**
     * Create a new message instance.
     */
    public function __construct(Tarea $tarea)
    {
        $this->tarea = $tarea->tarea;
        $this->fecha_limite = $tarea->fecha_limite;
        $this->url = route('tarea.show',['tarea'=>$tarea->id]);
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Nueva Tarea Mail',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            markdown: 'email.nueva-tarea',
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
