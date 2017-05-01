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

Route::get('/', ['uses' => 'HomeController@index'])->name('home');
//Route::get('/home', ['uses' => 'HomeController@index'])->name('test3');


//Route::group([], function () {
//    Route::get('/admin', ['as' => 'home', 'uses' => 'HomeController@index'])->name('test');

    Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function () {
        Route::get('/', ['as' => 'home', 'uses' => 'DashboardController'])->name('dashboard');
        Route::group(['prefix' => 'client'], function () {
            Route::get('/', ['uses' => 'ClientController@index'])->name('admin.client.index');
            Route::get('/edit', ['uses' => 'ClientController@index'])->name('admin.client.edit');
        });
    });



//});

Route::group(['namespace' => 'Auth', 'prefix' => 'panel'], function () {
    Route::get('/', ['uses' => 'PanelController'])->name('panel');
//    Route::get('/dd', ['uses' => 'ClientController@index'])->name('testa');

//        $this->middleware('subscribed')->except('store');
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});



Route::get('/panel', ['as' => 'home', 'uses' => 'HomeController@index'])->name('home');






