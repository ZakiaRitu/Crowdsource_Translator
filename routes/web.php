<?php

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

//Route::get('reset_password/{token}', ['as' => 'password.reset', function($token)
//{
//Route::controller('password', 'RemindersController');
//}]);




Route::get('/', function () {
    if(Auth::check()){
        return Redirect::route('dashboard');
    }else{
        return Redirect::route('login');
    }

});


Route::group(['middleware' => 'guest'], function(){

//    Route::get('login', ['as'=>'login','uses' => 'Auth\AuthController@login']);
//    Route::post('login', array('uses' => 'Auth\AuthController@doLogin'));

    Route::get('login', ['as'=> 'login','uses' => 'Auth\AuthController@login']);
    Route::post('login', ['as'=> 'postlogin','uses' => 'Auth\AuthController@doLogin']);
    Route::post('login/pw', ['as'=> 'login.secure','uses' => 'Auth\AuthController@secureLogin']);

    // social login route
    Route::get('login/fb', ['as'=>'login/fb','uses' => 'SocialController@loginWithFacebook']);
    Route::get('login/gp', ['as'=>'login/gp','uses' => 'SocialController@loginWithGoogle']);


});



Route::group(array('middleware' => 'auth'), function()
{

    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\AuthController@logout']);
    Route::get('profile', ['as' => 'profile', 'uses' => 'Auth\AuthController@profile']);
    Route::get('dashboard', array('as' => 'dashboard', 'uses' => 'Auth\AuthController@dashboard'));
    Route::get('change-password', array('as' => 'password.change', 'uses' => 'Auth\AuthController@changePassword'));
    Route::post('change-password', array('as' => 'password.doChange', 'uses' => 'Auth\AuthController@doChangePassword'));


    Route::get('sentence',['as' => 'sentence.index', 'uses' => 'SentenceController@index']);
    Route::get('sentence/create', array('as' => 'sentence.create', 'uses' => 'SentenceController@create'));
    Route::post('sentence', array('as' => 'sentence.store', 'uses' => 'SentenceController@store'));
    Route::get('sentence/{id}/edit', array('as' => 'sentence.edit', 'uses' => 'SentenceController@edit'));
    Route::put('sentence/{id}/update', array('as' => 'sentence.update', 'uses' => 'SentenceController@update'));
    Route::get('sentence/{id}/show',['as' => 'sentence.show', 'uses' => 'SentenceController@show']);
    Route::delete('sentence/{id}', array('as' => 'sentence.delete', 'uses' => 'SentenceController@destroy'));
    Route::get('mysentence', array('as' => 'sentence.own', 'uses' => 'SentenceController@mysentence'));


    Route::get('translation/create', array('as' => 'translation.create', 'uses' => 'TranslationController@create'));
    Route::post('translation', array('as' => 'translation.store', 'uses' => 'TranslationController@store'));


    Route::get('leaderboard', array('as' => 'leaderboard', 'uses' => 'TranslationController@leaderBoard'));
    Route::get('history', array('as' => 'history', 'uses' => 'TranslationController@history'));

});






/**
 * For Importing file data into database
 *
 */
Route::get('fileToDatabase', function () {

    foreach(file('full.txt') as $line) {
        $senttence = new \App\Sentence();
        $senttence->sentence = $line;
        $senttence->save();
    }
     return "Data storte successfully";
});