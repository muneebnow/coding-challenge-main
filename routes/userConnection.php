<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\SuggestionController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\ReceivedController;


Route::get('/home',[SuggestionController::class,'index'])->name('home');
Route::post('/sent_requests',[RequestController::class,'index'])->name('sent_requests');
Route::post('/received_requests',[ReceivedController::class,'index'])->name('received_requests');
Route::post('/get_connections',[ConnectionController::class,'index'])->name('get_connections');

