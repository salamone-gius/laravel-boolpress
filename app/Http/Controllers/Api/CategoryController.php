<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo il Model delle categorie
use App\Category;

class CategoryController extends Controller
{
    public function index() {

        // attraverso una query prendo TUTTE le categorie dal db
        $categories = Category::all();

        // restituisco tutte le categorie
        return $categories;
    }

    // passo lo slug con la dependancy injection
    public function show($slug) {

        // per effettuare una sub-query su qualcosa a cui il dato è relazionato, parto con il with e dentro metto le condizioni del sotto-dato su cui voglio filtrare
        // prendo la PRIMA categoria DOVE la proprietà slug è uguale allo $slug passato come argomento del metodo INSIEME CON [ => quel post ($query) nella tabella posts (nello specifico) DOVE published è uguale a 1 (ovvero true = pubblicato)]
        // passo al with un array associativo dove la chiave è il metodo del model che definisce il tipo di relazione, => il valore è una funzione anonima che restituisce il risultato della sub-query
        $category = Category::with(['posts' => function($query) {
            $query->where('published', 1);
        }])->where('slug', $slug)->first();

        // restituisco la singola categoria con le relazioni con i post
        return $category;
    }
}
