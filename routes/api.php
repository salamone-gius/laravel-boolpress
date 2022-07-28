<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// imposto la rotta che deve restituire le informazioni della tabella 'posts' attraverso il metodo index del PostController con namespace Api
Route::get('posts', 'Api\PostController@index');

// imposto l'endpoint che deve restituire il singolo post (e tutte le sue informazioni) attraverso il metodo show del PostController con namespace Api. Tra le graffe metterò la proprietà univoca che identifica quel post rispetto ad un altro
Route::get('posts/{slug}', 'Api\PostController@show');