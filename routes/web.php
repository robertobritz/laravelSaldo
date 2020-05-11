<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

route::middleware(['auth'])->group(function () {
        route::namespace('Admin')->group(function(){  
            route::prefix('admin')->group(function(){     
               
                route::any('historic-search', 'BalanceController@searchHistoric')->name('historic.search');    
                route::get('historic', 'BalanceController@historic')->name('admin.historic');    

                route::get('balance/transfer', 'BalanceController@transfer')->name('balance.transfer');
                route::post('balance/transfer', 'BalanceController@transferStore')->name('transfer.store');
                route::post('balance/transfer-finish', 'BalanceController@transferFinish')->name('transfer.finish');


                route::post('balance/withdraw', 'BalanceController@withdrawStore')->name('withdraw.store');
                route::get('balance/withdraw', 'BalanceController@withdraw')->name('balance.withdraw');
                

                route::post('balance/deposit', 'BalanceController@depositStore')->name('deposit.store');
                route::get('balance/deposit', 'BalanceController@deposit')->name('balance.deposit');
                route::get('balance', 'BalanceController@index')->name('admin.balance'); //esse comando
                route::get('/','AdminController@index')->name('admin.home');
    });
});
});

route::post('atualizar-perfil', 'Admin\UserController@profileUpdate')->name('profile.update')->middleware('auth');
route::get('meu-perfil', 'Admin\UserController@profile')->name('profile')->middleware('auth');

Route::get('/', 'site\siteController@index');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
