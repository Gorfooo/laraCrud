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

Route::get('/home', [ContactController::class, 'index'])->name('home');

Route::get('/create',function(){
    $routeParameter = 'Contacts/store';
    return view('insertContact',compact('routeParameter'));
})->name('/create');

Route::get('/edit',function(){
    $routeParameter = 'Contacts/update';
    return view('editContact',compact('routeParameter'));
})->name('/edit');

Route::get('/cancel',function(){
    return redirect('home');
})->name('/cancel');

Route::namespace('App\Http\Controllers')->group(function(){
    Route::post('Contacts/store', 'ContactController@store')->name('Contacts/store');
    Route::post('Contacts/{contact}', 'ContactController@update')->name('Contacts/update');
});