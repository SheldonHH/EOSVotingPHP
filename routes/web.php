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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/phonebook/{name}', function(){
    return redirect('/');
})->where('name', '[A-Za-z]+');

Route::get('/eosvoting/{name}', function(){
  return redirect('/');
})->where('name', '[A-Za-z]+');

Route::resource('phonebook', 'PhonebookController');
Route::post('getData', 'PhonebookController@getData');

Route::resource('eosvoting', 'EosvotingController');
Route::post('getBPData', 'EosvotingController@getBPData');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
