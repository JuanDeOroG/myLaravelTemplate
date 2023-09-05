<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post("/login", function( Request $request){
    $credentials = $request->only(['email','password']);

    if(!$token = auth()->attempt($credentials)){
        abort(401, "Sin autorización");

    }

    return response()->json([
        "data" => [
            "token" => $token,
            "token_type" => "bearer",
            "expires_in" => auth()->factory()->getTTL()*60
    ]
        ]);
});


Route::prefix('user')->group(function(){
    Route::post('/register',[UserController::class, 'register']);
    Route::post('/create', [UserController::class, 'create'])->name('usuarios.create');
    Route::get('/show', [UserController::class, 'show'])->name('usuarios.show');
    Route::put('/update', [UserController::class, 'update'])->name('usuarios.update');
    

});