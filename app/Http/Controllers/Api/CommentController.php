<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// importo la Facades di supporto per le validazioni manuali
use Illuminate\Support\Facades\Validator;

// importo il Model dei commenti
use App\Comment;

class CommentController extends Controller
{
    // passo come argomento del metodo store() l'id del post in oggetto
    public function store(Request $request, $post_id) {

        // prendo tutti i dati dalla request e li salvo in $data
        $data = $request->all();

        // salvo l'id del post corrente
        $data['post_id'] = $post_id;

        // valido in dati in ingresso con una validazione manuale (il metodo validate() restituisce sempre un redirect che in questo caso non mi serve)
        $validator = Validator::make($data, [
            'author' => 'nullable|string|max:80',
            'content' => 'required|string',
            'post_id' => 'exists:posts,id',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                "errors" => $validator->errors()
            ], 400);
        }

        // creo il nuovo commento a db
        $newComment = new Comment();

        // imposto quali dati e come devono essere inseriti a db
        $newComment->post_id = $data['post_id'];
        $newComment->author = $data['author'];
        $newComment->content = $data['content'];

        // salvo il nuovo commento a db
        $newComment->save();

        // restituisco una risposta json positiva
        return $newComment;
    }
}
