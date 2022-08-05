<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

// importo il Model dei commenti:
use App\Comment;


class CommentMailMarkdown extends Mailable
{
    use Queueable, SerializesModels;

    // definisco una proprietà pubblica $comment in cui andrò a salvare:
    public $comment;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    // passo l'oggetto $comment come argomento del metodo _construct()
    public function __construct(Comment $comment)
    {
        // inietto l'oggetto $comment nella proprietà pubblica $comment
        $this->comment = $comment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.comment-markdown');
    }
}
