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

Auth::routes();

//Route::get('/', ['as' => 'home', 'uses' => function () {
//    return view('welcome');
//}])->name('home');

Route::get('/helper', ['uses' => function(){
    $token = new Token();

    return $token;
}]);


Route::get('/downloads', ['uses' => 'DownloadController@index'])->name('downloads');

//Route::group(['prefix' => 'api/v1', 'as' => 'api.', 'middleware' => 'token'], function () {
Route::group(['prefix' => 'api/v1', 'as' => 'api.'], function () {
    Route::get('/loodbutton/{id?}', ['uses' => 'ApiController@loadButton'])->name('loodbutton.show');
    Route::post('/login', ['uses' => 'ApiController@authenticate'])->name('login');
});

//'headers' => [
//    'Accept' => 'application/json',
//    'Authorization' => 'Bearer '.$accessToken,
//],

//Route::get('/downloads', ['uses' => 'DownloadController@index'])->name('downloads');



Route::get('/', ['uses' => 'HomeController@index'])->name('home');
Route::get('/home', ['uses' => 'HomeController@index']);

Route::get('/producten', ['uses' => 'ProductController@index'])->name('product.index');
Route::get('/producten/indoorzuil', ['uses' => 'ProductController@indoorzuil'])->name('product.indoorzuil');
Route::get('/services', ['uses' => 'ServiceController@index'])->name('service.index');
Route::get('/nieuws', ['uses' => 'NewsController@index'])->name('nieuws.index');
Route::get('/nieuws/{title}-{id}', ['uses' => 'NewsController@show'])->name('nieuws.show');
Route::get('/contact', ['uses' => 'ContactController@index'])->name('contact.index');
Route::post('/contact', ['uses' => 'ContactController@store'])->name('contact.store');
//Route::get('/home', ['uses' => 'HomeController@index'])->name('test3');

//Route::group([], function () {
//    Route::get('/admin', ['as' => 'home', 'uses' => 'HomeController@index'])->name('test');

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::get('/', ['uses' => 'DashboardController'])->name('dashboard');
        Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
            Route::get('/', ['uses' => 'ClientController@index'])->name('index');
            Route::get('/create', ['uses' => 'ClientController@create'])->name('create');
            Route::get('/edit/{id}', ['uses' => 'ClientController@edit'])->name('edit');
            Route::post('/store', ['uses' => 'ClientController@store'])->name('store');
            Route::patch('/update/{id}', ['uses' => 'ClientController@update'])->name('update');
            Route::delete('/delete/{id}', ['uses' => 'ClientController@destroy'])->name('delete');
        });
//        Route::group(['prefix' => 'client', 'as' => 'client.'], function () {
//            Route::get('/', ['uses' => 'ClientController@index'])->name('index');
//            Route::get('/create', ['uses' => 'ClientController@create'])->name('create');
//            Route::get('/edit/{id}', ['uses' => 'ClientController@edit'])->name('edit');
//            Route::post('/store', ['uses' => 'ClientController@store'])->name('store');
//            Route::patch('/update/{id}', ['uses' => 'ClientController@update'])->name('update');
//            Route::delete('/delete/{id}', ['uses' => 'ClientController@destroy'])->name('delete');
//        });
    });



//});

Route::group(['namespace' => 'Auth', 'prefix' => 'panel'], function () {
    Route::get('/', ['uses' => 'PanelController'])->name('panel');
    Route::get('/ticket', ['uses' => 'TicketController@index'])->name('panel.ticket');
//    Route::get('/dd', ['uses' => 'ClientController@index'])->name('testa');

//        $this->middleware('subscribed')->except('store');
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});



//Route::get('/panel', ['as' => 'home', 'uses' => 'HomeController@index'])->name('home');






