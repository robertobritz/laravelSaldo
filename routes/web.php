<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

route::middleware(['auth'])->group(function () {
        route::namespace('Admin')->group(function(){    
            route::get('admin/balance', 'BalanceController@index')->name('admin.balance'); //esse comando
            route::get('admin','AdminController@index')->name('admin');
    });
});
Route::get('/', 'site\siteController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
