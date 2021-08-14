<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\OcrDataController;
use App\Models\Photo;

use App\Http\Controllers\AuthController;
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


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::get('user-profile', [AuthController::class, 'userProfile']);
});


Route::group(['middleware' => ['api']], function() {
 
    Route::apiResource('photo', PhotoController::class);
    Route::get('/ocrdata/latest', [OcrDataController::class, 'latestSavedSelection']);
    Route::apiResource('ocrdata', OcrDataController::class);
});

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
 */

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
