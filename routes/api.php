<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Models\Photo;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('photo', PhotoController::class);

/*Route::get('/photo', 'PhotoController@index')->name('photo.index');

Route::post('/photo', 'PhotoController@store')->name('photo.store');
Route::get('/photo/{id}/comment', 'CommentController@index')->name('comment.index');
Route::post('/photo/{id}/comment', 'CommentController@add')->name('comment.add');
Route::get('/chat', 'ChatController@index')->name('chat.index');
Route::post('/chat', 'ChatController@add')->name('chat.add');
 */

 Route::get('/photos', function(){
     return Photo::all();
 });
