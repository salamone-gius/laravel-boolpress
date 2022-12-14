<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// BACKOFFICE - AREA PUBBLICA (AREA DI AUTENTICAZIONE: REGISTRAZIONE, LOGIN, RECUPERO PASSWORD) (blade) \\

Auth::routes();


// BACKOFFICE - AREA PRIVATA (CRUD, VISIBILE SOLO ALL'UTENTE REGISTRATO) (blade) \\

// definisco dentro un gruppo tutte le rotte che voglio proteggere con l'autenticazione:

// tutte le rotte avranno lo stesso middleware ('auth');
Route::middleware('auth')

    // tutte le rotte avranno lo stesso namespace (i controller saranno dentro la sottocartella 'Admin');
    ->namespace('Admin')

    // i nomi di tutte le rotte inizieranno con 'admin.';
    ->name('admin.')

    // tutte le rotte avranno lo stesso prefisso url '/admin/';
    ->prefix('admin')

    // inserisco tutte le rotte che devono essere protette da autenticazione (backoffice)
    ->group(function () {

    // /home/admin/
    Route::get('/home', 'HomeController@index')->name('home');

    // aggiungo la rotta per il PostController. Il metodo resource() nel middleware crea in automatico tutte le rotte del PostController utili per tutte le operazioni di CRUD (index, create, ecc...)
    Route::resource('posts', 'PostController');

    // aggiungo la rotta per il CategoryController. Il metodo resource() nel middleware crea in automatico tutte le rotte del CategoryController utili per tutte le operazioni di CRUD (index, create, ecc...)
    Route::resource('categories', 'CategoryController');

    // aggiungo la rotta per il TagController. Il metodo resource() nel middleware crea in automatico tutte le rotte del TagController utili per tutte le operazioni di CRUD (index, create, ecc...)
    Route::resource('tags', 'TagController');

    // aggiungo la rotta per il metodo index() del CommentController
    Route::get('comments', 'CommentController@index')->name('comments.index');

    // aggiungo la rotta parametrica/dinamica per il metodo update() del CommentController passando il singolo commento
    Route::patch('comments/{comment}', 'CommentController@update')->name('comments.update');

    // aggiungo la rotta parametrica/dinamica per il metodo update() del CommentController passando il singolo commento
    Route::delete('comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
    });


// FRONTOFFICE - AREA PUBBLICA (rendering con Vue.js)\\

// sotto tutte le altre rotte, ne definisco una di fallback che reindirizza tutte le rotte che non fanno parte dal backoffice alla pagina Vue.js che gestir?? il frontoffice 
Route::get('{any?}', function() {
    return view('guest.home');
})->where('any', '.*')->name('guest.home');
