<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return "";
});


Route::get('users', [UserController::class, 'index']);
Route::post('adduser', [UserController::class, 'addUser']);
Route::delete('deleteuser/{id}', [UserController::class, 'deleteUser']); // Delete a user by ID
Route::put('updateuser/{id}', [UserController::class, 'updateUser']); // Update a user by ID

