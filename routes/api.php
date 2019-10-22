<?php

use Illuminate\Http\Request;

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
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::prefix('clientes')->group(function(){

    Route::get('/', 'ClienteController@index')->name('index_cliente');
    Route::get('/{id}', 'ClienteController@show')->name('single_cliente');

    Route::post('/', 'ClienteController@store')->name('store_cliente');
    Route::put('/{id}', 'ClienteController@update')->name('update_cliente');

    Route::delete('/{id}', 'ClienteController@delete')->name('delete_cliente');
});


/*
Route::get('/clientes', 'ClienteController@index')->name('buscarTodos');

Route::get('/clientes/{$id}', 'ClienteController@buscar')->name('buscar');

Route::post('/clientes', 'ClienteController@create')->name('criar');
//Route::put('/clientes/{$id}', 'ClienteController@update')->name('atualizar');
//Route::delete('/clientes/{$id}', 'ClienteController@delete')->name('deletar');
*/