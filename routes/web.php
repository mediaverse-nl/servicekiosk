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
    Route::get('/loadbuttons', ['uses' => 'ApiController@loadButton']);
    Route::post('/postbuttons', ['uses' => 'ApiController@postButton']);
    Route::post('/login', ['uses' => 'ApiController@authenticate']);
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
Route::get('/nieuws/{id}/{title}', ['uses' => 'NewsController@show'])->name('nieuws.show');
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
            Route::patch('/edit/{id}', ['uses' => 'ClientController@update'])->name('update');
            Route::delete('/delete/{id}', ['uses' => 'ClientController@destroy'])->name('delete');
        });

        Route::group(['prefix' => 'blog', 'as' => 'blog.'], function(){
            Route::get('/', ['uses' => 'BlogController@index'])->name('index');
            Route::get('/create', ['uses' => 'BlogController@create'])->name('create');
            Route::post('/create', ['uses' => 'BlogController@store'])->name('create');;
            Route::get('/update/{id}', ['uses' => 'BlogController@edit'])->name('update');
            Route::patch('/update/{id}', ['uses' => 'BlogController@update'])->name('update');
            Route::get('/delete/{id}', ['uses' => 'BlogController@destroy'])->name('delete');
        });

        Route::group(['prefix' => 'ticket', 'as' => 'ticket.'], function(){
            Route::get('/', ['uses' => 'TicketController@index'])->name('index');
            Route::get('/view/{id}', ['uses' => 'TicketController@view'])->name('view');
            Route::post('/view/{id}', ['uses' => 'TicketController@store'])->name('store');
        });

        Route::group(['prefix' => 'sub', 'as' => 'subs.'], function(){
            
            Route::get('/', ['uses' => 'SubController'])->name('index');

            Route::group(['prefix' => 'subscription', 'as' => 'subscription.'], function(){
                Route::get('/', ['uses' => 'SubscriptionController@index'])->name('index');
                Route::get('/view/{id}', ['uses' => 'SubscriptionController@show'])->name('view');
                Route::patch('/view/{id}', ['uses' => 'SubscriptionController@update'])->name('update');
                Route::get('/create', ['uses' => 'SubscriptionController@create'])->name('create');
                Route::post('/create', ['uses' => 'SubscriptionController@store'])->name('store');
                Route::get('/delete/{id}', ['uses' => 'SubscriptionController@destroy'])->name('destroy');
            });

            Route::group(['prefix' => 'subscriptiontype', 'as' => 'subscriptiontype.'], function(){
                Route::get('/', ['uses' => 'SubscriptiontypeController@index'])->name('index');
                Route::get('/view/{id}', ['uses' => 'SubscriptiontypeController@show'])->name('view');
                Route::patch('/view/{id}', ['uses' => 'SubscriptiontypeController@update'])->name('update');
                Route::get('/create', ['uses' => 'SubscriptiontypeController@create'])->name('create');
                Route::post('/create', ['uses' => 'SubscriptiontypeController@store'])->name('store');
                Route::get('/delete/{id}', ['uses' => 'SubscriptiontypeController@destroy'])->name('destroy');
            });
        });

        Route::group(['prefix' => 'service', 'as' => 'service.'], function(){
            Route::get('/', ['uses' => 'ServiceController@index'])->name('index');
            Route::get('/view/{id}', ['uses' => 'ServiceController@show'])->name('view');
            Route::patch('/view/{id}', ['uses' => 'ServiceController@update'])->name('view');
            Route::get('/create', ['uses' => 'ServiceController@create'])->name('create');
            Route::post('/create', ['uses' => 'ServiceController@store'])->name('store');
            Route::get('/delete/{id}', ['uses' => 'ServiceController@destroy'])->name('destroy');
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

    Route::group(['prefix' => 'ticket'], function() {
        Route::get('/', ['uses' => 'TicketController@index'])->name('panel.ticket');
        Route::get('/create', ['uses' => 'TicketController@create'])->name('panel.ticket.create');
        Route::post('/create', ['uses' => 'TicketController@save'])->name('panel.ticket.create');
    });

    Route::group(['prefix' => 'account', 'as' => 'panel.account.'], function(){
        Route::get('/', ['uses' => 'AccountController@index'])->name('index');
        Route::patch('/update/{id}', ['uses' => 'AccountController@update'])->name('update');
    });

//    Route::post('/panel/account/password', ['uses' => 'PasswordController'])->name('panel.password');

    Route::get('/view/{id}', ['uses' => 'TicketController@view'])->name('panel.view');
    Route::post('/view/{id}', ['uses' => 'TicketController@store'])->name('panel.store');
//    Route::get('/dd', ['uses' => 'ClientController@index'])->name('testa');

//        $this->middleware('subscribed')->except('store');
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
});


Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/user/test', ['uses' => function(){
        return 'ok';
    }])->middleware('auth:api');
});


//Route::get('/panel', ['as' => 'home', 'uses' => 'HomeController@index'])->name('home');
