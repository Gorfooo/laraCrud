<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['auth']],function(){
    Route::get('/lang',function(){
        if(app()->getLocale() == 'en'){
            session(['language' => 'pt_BR']);
        }else{
            session(['language' => 'en']);
        }
        return redirect()->back();
    })->name('/lang');
    
    Route::get('/home', [ContactController::class, 'index'])->name('home');
    
    Route::prefix('contacts')->namespace('App\Http\Controllers')->group(function(){
        Route::get('/create', 'ContactController@create')->name('contacts.create');
        Route::post('/store', 'ContactController@store')->name('contacts.store');
        Route::get('/{contact}/edit', 'ContactController@edit')->name('contacts.edit');
        Route::post('/{contact}/update', 'ContactController@update')->name('contacts.update');
        Route::get('/{contact}/destroy', 'ContactController@destroy')->name('contacts.destroy');
        Route::get('/search', 'ContactController@search')->name('contacts.search');
        Route::get('/cancel', 'ContactController@cancel')->name('contacts.cancel');
        Route::post('/upload', 'ContactController@upload');
        Route::delete('/upload/revert', 'ContactController@revertUpload');
    });
});