<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // imposto le condizioni per il mass assignment (protezione dei campi)
    // passando 'tags' all'interno, escludo dal mass assignment quella colonna
    protected $guarded = ['tags', 'user_id', 'image'];

    // definisco il nuovo attributo che voglio aggiungere senza modificare fisicamente il dato a db
    protected $appends = ['image_path'];

    // aggiungo ad ogni post l'attributo image_path attraverso un accessor (metodo getImagePathAttribute()) che aggiunge l'attributo ma lascia immutato il dato a db
    public function getImagePathAttribute() {
        // aggiungo un controllo: restituisco $this->image SE (?) esiste, ALTRIMENTI (:) lo setto a null
        return $this->image ? asset("storage/{$this->image}") : null;
    }

    // creo un metodo pubblico che si chiama come la tabella principale (al singolare in caso di relazione uno a molti)
    public function category() {

        // traduzione: restituisci $questoModel(un singolo post)->appartiene a('il Model legato') (una categoria)
        return $this->belongsTo('App\Category');
    }

    // creo un metodo pubblico che si chiama come la tabella collegata (al plurale in caso di relazione molti a molti)
    public function tags() {

        // traduzione: restituisci $questoModel(un singolo post)->appartiene (è legato) a('il Model legato') (più tag)
        return $this->belongsToMany('App\Tag');
    }

    // creo un metodo pubblico che si chiama come la tabella principale (al singolare in caso di relazione uno a molti)
    public function user() {

        // traduzione: restituisci $questoModel(un singolo post)->appartiene a('il Model legato') (un singolo utente)
        return $this->belongsTo('App\User');
    }

    // creo un metodo pubblico che si chiama come la tabella dipendente (al plurale in caso di relazione uno a molti)
    public function comments() {

        // traduzione: restituisci $questoModel(un singolo post) che HA MOLTI ('il Model legato') (commenti)
        return $this->hasMany('App\Comment');
    }

}
