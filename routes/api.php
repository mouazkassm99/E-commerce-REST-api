<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware'=>'auth:api'], function (){

    Route::group(['prefix'=>'{user}/cart'], function (){
        /*
         * -get all products
         * -add product to cart
         * -empty the whole cart
         * */
        Route::get('/', [CartController::class, 'index']);
        Route::put('/',[CartController::class, 'updateCart']);
        Route::delete('/', [CartController::class, 'emptyCart']);

    });


   /*
    * Product resource
    * */
   Route::apiResource('product', ProductController::class)  ;
});

Route::get('test', function (\Illuminate\Http\Request $request){
//    return \App\Models\User::with('role')->find($request->id);
    echo "in test \n";
    return auth()->user();
})->middleware('permission:admin');

Route::post('/login', [UserController::class, 'login']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:api');
