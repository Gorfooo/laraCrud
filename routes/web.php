<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
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

Route::get('/cancel',function(){
    return redirect('home');
})->name('/cancel');

Route::get('/home', [ContactController::class, 'index'])->name('home');

Route::namespace('App\Http\Controllers')->group(function(){
    Route::get('contacts/create', 'ContactController@create')->name('contacts.create');
    Route::post('contacts/store', 'ContactController@store')->name('contacts.store');
    Route::get('contacts/{contact}/edit', 'ContactController@edit')->name('contacts.edit');
    Route::post('contacts/{contact}/update', 'ContactController@update')->name('contacts.update');
    Route::get('contacts/{contact}/destroy', 'ContactController@destroy')->name('contacts.destroy');
    Route::get('contacts/search', 'ContactController@search')->name('contacts.search');
});