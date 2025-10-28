<?php 


use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;

Route::resource('vendor', VendorController::class);

Route::get('/halo', function () {
    return 'Welcome to my API';
}); 

