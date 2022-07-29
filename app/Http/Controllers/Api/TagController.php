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

        // attraverso una query prendo il PRIMO tag DOVE la proprietà slug è uguale allo $slug passato come argomento del metodo INSIEME CON tutte le relazioni con la tabella posts
        $tag = Tag::where('slug', $slug)->with('posts')->first();

        // restituisco il tag singolo con le relazioni con i post
        return $tag;
    }
}
