<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo il model dei tag
use App\Tag;

class TagController extends Controller
{
    public function index() {

        // attraverso una query prendo TUTTI i tag
        $tags = Tag::all();

        // restituisco tutti i tag
        return $tags;
    }

    public function show($slug) {

        // per effettuare una sub-query su qualcosa a cui il dato è relazionato, parto con il with e dentro metto le condizioni del sotto-dato su cui voglio filtrare
        // prendo il PRIMO tag DOVE la proprietà slug è uguale allo $slug passato come argomento del metodo INSIEME CON [ => quel post ($query) nella tabella posts (nello specifico) DOVE published è uguale a 1 (ovvero true = pubblicato)]
        // passo al with un array associativo dove la chiave è il metodo del model che definisce il tipo di relazione, => il valore è una funzione anonima che restituisce il risultato della sub-query
        $tag = Tag::with(['posts' => function($query) {
            $query->where('published', 1);
        }])->where('slug', $slug)->first();

        // restituisco il tag singolo con le relazioni con i post
        return $tag;
    }
}
