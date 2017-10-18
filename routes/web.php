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
 * Data call from Xampp\htdocs\Crowdsource_translator\public/outputsJson/......
 */
Route::post('fileToDatabase', function () {

 try{
     $file_name = public_path().'/input/full.txt';
     foreach(file($file_name) as $line) {
         $senttence = new \App\Sentence();
         $senttence->sentence = $line;
         $senttence->save();
     }

    // return 'Data storte successfully';
     return redirect()->route('dashboard')->with('success', 'Data storte successfully');
 }catch (Exception $ex){
     return 'Something went wrong';
 }

});



/**
 * Sentence with corresponding Translation Json Format
 * Please open with notepad++
 *Saved at  Xampp\htdocs\Crowdsource_translator\public/outputsJson/......
 */
Route::get('sentenceJson', function () {
//Maximum execution time of 30 seconds default, we set 5 mins
    ini_set('max_execution_time', 300);
    //path initialization
    $destinationPath = public_path().'/outputsJson/';
    //output file name
    $file_name = 'output'.time().'.json';
    //folder check , if not then automatic create
    if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }

    $sentences = \App\Sentence::all();
    foreach ($sentences as $sentence ){
        $sentence['translation'] = \App\Translation::where('sentence_id', $sentence->id)->get();
    }
    File::put($destinationPath.$file_name, json_encode($sentences)); //write the file
    return response()->download($destinationPath.$file_name);
    return redirect()->route('dashboard')->with('success', 'Json Data Imported successfully');
});


/**
 * Database to File Save
 * Data saved at Xampp\htdocs\Crowdsource_translator\public/outputs/......
 * Please open with notepad++
 */
Route::get('databaseToFile', function () {
    //Maximum execution time of 30 seconds default, we set 5 mins
    ini_set('max_execution_time', 300);
    //path initialization
    $destinationPath = public_path().'/outputs/';
    //output file name
    $file_name = 'output'.time().'.txt';
    //folder check , if not then automatic create
    if (!is_dir($destinationPath)) {  mkdir($destinationPath,0777,true);  }
    //array for store data
    $contents = [];
    //grab all the sentence list
    $sentences = \App\Sentence::all();
    //get the sentence corresponding data one by one with foreach(for) loop and save data
    foreach ($sentences as $sentence ){
        //getting the sentence id and sentence in one line
        $data =$sentence->id.'. '. $sentence->sentence;
        //getting the sentece corresponding translation
        $sentence['translation'] = \App\Translation::where('sentence_id', $sentence->id)->pluck('translate').PHP_EOL;

        //string procssing
        $arr =[
            "," => ",\n", //replace logic for the comma with newline
            "[" => "",    //replace logic for the third parenthess beginning with empty
            "]" => " "   //relplce logic the ....with space
         ];
        $string2 = strtr( $sentence['translation'],$arr);  //here replace function works
        $string = str_replace('"', ' ', $string2); // replace quatation with space
        //end of strinf processing

        $contents[] = $data."\n".$string."\n";   //sentence and translation in one variable with processing data
        File::put($destinationPath.$file_name, $contents); //write the file

    }
    //download file
     return response()->download($destinationPath.$file_name);

    return redirect()->route('dashboard')->with('success', 'Data Exported Successfully in.['.$destinationPath.$file_name.']');

});