
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

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');


Route::get('/getTeachers', 'MessageController@getTeachers');
Route::get('/getClassesFromTeacherId/{teacher}', 'MessageController@getClassesFromTeacherId');
Route::get('/getMessagesFromClass/{class}', 'MessageController@getMessagesFromClass');
Route::get('/getSubjects', 'MessageController@getSubjects');
Route::get('/getClassesFromSubject/{subject}', 'MessageController@getClassesFromSubject');
Route::get('/getEnrolledClasses/{user}','MessageController@getEnrolledClasses');
Route::get('/enrollInClass/{user}/{class}','MessageController@enrollInClass');
Route::post('/addMessage/{class}/{user}', 'MessageController@addMessage');
Route::get('/getClasses', 'MessageController@getClasses');
Route::post('/login', 'MessageController@login');
