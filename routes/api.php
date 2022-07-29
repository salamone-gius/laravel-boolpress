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

// imposto la rotta che deve restituire il singolo post (e tutte le sue informazioni) attraverso il metodo show del PostController con namespace Api. Tra le graffe metterò la proprietà univoca che identifica quel post rispetto ad un altro
Route::get('posts/{slug}', 'Api\PostController@show');

// imposto la rotta che deve restituire tutte le categorie da gestire con il metodo index() del CategoryController con namespace Api
Route::get('categories', 'Api\CategoryController@index');

// imposto la rotta dinamica/parametrica che deve restituire tutti i post associati alla singola categoria (con lo slug come parametro) da gestire con il metodo show() del CategoryController con namespace Api
Route::get('categories/{slug}', 'Api\CategoryController@show');

// imposto la rotta che deve restituire tutti i tag da gestire con il metodo index() del TagController con namespace Api
Route::get('tags', 'Api\TagController@index');

// imposto la rotta dinamica/parametrica che deve restituire tutti i post associati al singolo tag (con lo slug come parametro) da gestire con il metodo show() del TagController con namespace Api
Route::get('tags/{slug}', 'Api\TagController@show');
