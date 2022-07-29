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

        // attraverso una query prendo la PRIMA categoria DOVE la proprietà slug è uguale allo $slug passato come argomento del metodo INSIEME CON tutte le relazioni con la tabella posts
        $category = Category::where('slug', $slug)->with('posts')->first();
        
        // restituisco la singola categoria con le relazioni con i post
        return $category;
    }
}
