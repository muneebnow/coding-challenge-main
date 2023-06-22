<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReceivedController;

Route::middleware('auth')->group(function () {

    Route::get('/home',[SuggestionController::class,'index'])->name('home');
    Route::post('/get_suggestions',[SuggestionController::class,'index'])->name('get_suggestions');
    Route::post('/connect',[SuggestionController::class,'store'])->name('connect');
    Route::post('/sent_requests',[RequestController::class,'index'])->name('sent_requests');
    Route::post('/withdraw_requests',[RequestController::class,'destroy'])->name('withdraw_requests');
    Route::post('/received_requests',[ReceivedController::class,'index'])->name('received_requests');
    Route::post('/accept_request',[ReceivedController::class,'update'])->name('accept_request');
    Route::post('/get_connections',[ConnectionController::class,'index'])->name('get_connections');
    Route::post('/remove_connections',[ConnectionController::class,'destroy'])->name('remove_connections');
});

