<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\MainController;
use App\Http\Controllers\Api\PhotoController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\RequestController;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'api', 'prefix' => 'auth'], function($router){
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/user-profile', [AuthController::class, 'userProfile']);
});

// Categories
Route::get('categories', [MainController::class, 'getAllCategories']);

//Services
Route::get('services', [MainController::class, 'getAllServices']);

// Products
Route::get('products', [ProductController::class, 'index']);
Route::post('store', [ProductController::class, 'store'])->middleware('auth:api');
Route::get('show/{id}', [ProductController::class, 'show']);
Route::put('update/{id}', [ProductController::class, 'update'])->middleware('auth:api');
Route::delete('delete/{id}', [ProductController::class, 'destroy'])->middleware('auth:api');


// Photos
Route::get('photos', [PhotoController::class, 'index']);
Route::post('store', [PhotoController::class, 'store'])->middleware('auth:api');
Route::get('show/{id}', [PhotoController::class, 'show']);
Route::put('update/{id}', [PhotoController::class, 'update'])->middleware('auth:api');
Route::delete('delete/{id}', [PhotoController::class, 'destroy'])->middleware('auth:api');


// Requests
Route::get('publicRequests', [RequestController::class, 'publicRequests']);
Route::get('privateRequests', [RequestController::class, 'privateRequests']);
Route::post('createRequest', [RequestController::class, 'createRequest']);
Route::get('getPublicRequestById/{id}', [RequestController::class, 'getPublicRequestById']);
Route::get('getPrivateRequestById/{id}', [RequestController::class, 'getPrivateRequestById']);


