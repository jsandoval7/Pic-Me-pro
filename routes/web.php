<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------


| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Currently routes to login page.. will make QRcode main page...

Route::get('/', [UserController::class, 'index']);

//Show Register Create Form
Route::get('/register', [UserController::class, 'create']);

//Create New User
Route::post('users', [UserController::class, 'store']);
//Show login form
Route::get('/login', [UserController::class, 'login']);

//Log in User
Route::post('/users/authenticate', [UserController::class, 'authenticate']);

//Log user out
Route::post('/logout', [UserController::class, 'logout']);

//Show User Info
Route::get('/show_account', [UserController::class, 'show']);

//Edit User Info
Route::put('/update_account',[UserController::class, 'profileUpdate']);

Route::get('/qr_blade', [UserController::class, 'qrCode']);

Route::get('/downloadImg/images/uploads/{file_name}', [UserController::class, 'downloadImage']);

Route::delete('/deleteImg/images/uploads/{file_name}', [UserController::class, 'destroyImage']);

Route::get('/gallary', [UserController::class, 'show_gallary']);