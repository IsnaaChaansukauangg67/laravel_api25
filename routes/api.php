<?php 
use App\Http\Controllers\Api\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/halo', function () {
    return 'Welcome to my API';
}); 

Route::apiResource('/products', ProductController::class);