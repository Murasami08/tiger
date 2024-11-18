<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SmsNumberController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/getNumber', [SmsNumberController::class, 'getNumber']);
Route::get('/getSms', [SmsNumberController::class, 'getSms']);
Route::get('/cancelNumber', [SmsNumberController::class, 'cancelNumber']);
Route::get('/getStatus', [SmsNumberController::class, 'getStatus']);