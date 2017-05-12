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

Route::group(['prefix' => 'api/v1', 'as' => 'admin.'], function () {
    Route::get('/loodbutton/{id}', ['uses' => 'ApiController@loadButton'])->name('loodbutton.show');
});



Route::get('/downloads', ['uses' => 'DownloadController@index'])->name('downloads');



Route::get('/', ['uses' => 'HomeController@index'])->name('home');
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
//    Route::get('/dd', ['uses' => 'ClientController@index'])->name('testa');

//        $this->middleware('subscribed')->except('store');
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});



Route::get('/panel', ['as' => 'home', 'uses' => 'HomeController@index'])->name('home');






