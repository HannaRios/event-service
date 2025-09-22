<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;

Route::get('/events', [EventController::class, 'index']);      
Route::get('/events/{id}', [EventController::class, 'show']);  
Route::post('/events', [EventController::class, 'store']);     
Route::put('/events/{id}', [EventController::class, 'update']); 
Route::delete('/events/{id}', [EventController::class, 'destroy']); 
