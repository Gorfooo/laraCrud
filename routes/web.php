<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('components.teste');
});

Auth::routes();

Route::get('/lang',function(){
    if(app()->getLocale() == 'en'){
        session(['language' => 'pt_BR']);
    }else{
        session(['language' => 'en']);
    }
    return redirect()->back();
})->name('/lang');

Route::get('/home', [ContactController::class, 'index'])->name('home');

Route::get('/cancel',function(){
    return redirect('home');
})->name('/cancel');

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('Contacts/create', 'ContactController@create');
    Route::post('Contacts/store', 'ContactController@store');
    Route::get('Contacts/edit', 'ContactController@edit');
    // Route::get('Contacts/update', 'ContactController@update')->name('Contacts/update');
});