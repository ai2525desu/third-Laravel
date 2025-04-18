<?php

use Illuminate\Support\Facades\Route;

// AuthControllerの呼び出し
use App\Http\Controllers\AuthController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// indexアクションを呼び出す設定
// Route::get('/', [AuthController::class, 'index']);

// 上記に追記を加えて、ログイン状態の場合のみトップページであるindexアクションを呼び出せるようにする
Route::middleware('auth')->group(function () {
    Route::get('/', [AuthController::class, 'index']);
});
