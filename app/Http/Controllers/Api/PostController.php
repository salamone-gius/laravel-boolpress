<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo il Model su cui lavorare
use App\Post;

class PostController extends Controller
{
    public function index() {

        // salvo in $posts QUEI post che hanno un valore true nella colonna 'published' (i post pubblicati)
        // il metodo with() permette di passare (durante la query di filtraggio) anche gli oggetti (e tutte le loro informazioni) associati appartenenti ad altre tabelle legate a questa da una relazione
        $posts = Post::where('published', true)->with(['category', 'tags', 'user'])->get();

        // restituisco i post filtrati in formato json
        return response()->json($posts);
    }

    // passo lo slug come argomento del metodo show. Questa è l'informazione parametrica che gestisce la vista di un post rispetto ad un altro
    public function show($slug) {

        // attraverso una query filtro i dati che voglio. In questo caso il PRIMO POST DOVE dove lo slug è questo $slug (il parametro passato) INSIEME (inner join) ai dati delle tabelle relazionate (i nomi dei metodi nei model)
        $post = Post::where('slug', $slug)->with(['category', 'tags', 'user'])->first();

        // restituisco il risultato della query in formato json
        return response()->json($post);
    }
}
