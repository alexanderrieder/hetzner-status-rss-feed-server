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
    if (request()->getBaseUrl() == 'hetzner-status.lkdev.co') {
        return view('welcome');
    } else {
        if (auth()->check()) {
            return redirect()->to('/home');
        }

        return redirect()->to('/login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('messages', 'Web\Messages');
