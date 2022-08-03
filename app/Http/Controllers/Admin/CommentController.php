<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo la Facades che mi restituisce l'utente loggato
use Illuminate\Support\Facades\Auth;

// importo il Model dei commenti
use App\Comment;

class CommentController extends Controller
{
    // creo un metodo index() che restituisce una view che mostra la lista di tutti i commenti da approvare
    public function index() {

        // salvo in $user_id l'id dell'utente attualmente loggato
        $user_id =Auth::id();

        // salvo in $comments i commenti da approvare relativi all'autore che è loggato
        // whereHas() permette di fare sub-query con la tabella relazionata posts (utilizzando il nome del metodo)
        // la funzione use() permette di prendere variabili al di fuori dello scope
        $comments = Comment::whereHas('post', function($q) use($user_id) {
            $q->where('user_id', $user_id);
        })->where('is_approved', false)->get();

        // restituisco una view che mostra i commenti da approvare e i commenti formattati
        return view('admin.comments.index', compact('comments'));
    }

    // creo un metodo update() passando come argomento il singolo commento
    public function update(Comment $comment) {

        // cambia il valore del campo 'is_approved' della tabella 'comments' da false a true
        $comment->is_approved = true;

        // salvo la modifica a db
        $comment->save();

        // restituisco un reindirizzamento alla pagina con tutti i commenti da approvare
        return redirect()->route('admin.comments.index');
    }

    // creo un metodo destroy() passando come argomento il singolo commento
    public function destroy(Comment $comment) {

        // cancello il commento
        $comment->delete();

        // restituisco un reindirizzamento alla pagina con tutti i commenti da approvare
        return redirect()->route('admin.comments.index');
    }

}
