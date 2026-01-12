<?php

use App\Http\Controllers\ShipmentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('layout');
});

Route::resource('shipments', ShipmentController::class);
Route::get('shipments/{shipment}', [ShipmentController::class, 'show']);

