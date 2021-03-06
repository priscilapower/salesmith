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



Route::redirect('/home', '/dashboard');

Route::get('/', function () {
    if (!Auth::user()) {
        return redirect()->route('login');
    }
    return redirect()->route('dashboard');
});

Auth::routes();

Route::middleware('auth')->group(function() {

    /*DASHBOARD*/
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');;

    /*POOLS*/
    Route::get( '/pool/{id}', function ($id) {
        return view( 'pool' , ['id' => $id, 'pool' => \App\Pool::find($id)]);
    } );
    Route::get( '/pools', function () {
        return view( 'pools' );
    } );

    /*CLIENTS*/
    Route::get( '/client/{id}', function ($id) {
        return view( 'client' , ['id' => $id, 'client' => \App\Client::find($id)]);
    } );
    Route::get( '/clients', function () {
        return view( 'clients' );
    } );

    /*CONTACTS*/
    Route::get( '/contacts', function () {
        return view( 'contacts' );
    } );

    /*PRODUCTS*/
    Route::get( '/products', function () {
        return view( 'products' );
    } );

    /*PRODUCTS*/
    Route::get( '/type-clients', function () {
        return view( 'type_clients' );
    } );
});