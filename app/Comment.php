<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    // creo un metodo pubblico che si chiama come la tabella principale (al singolare in caso di relazione uno a molti)
    public function post() {

        // traduzione: restituisci $questoModel(un singolo commento) che APPARTIENE A ('il Model legato') (un singolo post)
        return $this->belongsTo('App\Post');
    }
}
