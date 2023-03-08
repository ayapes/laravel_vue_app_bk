<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/{any}', function () {
    return view('welcome');
})->where('any','.*');

// これはどのURIにアクセスしても（any）、LaravelからVueへの橋渡しになるwelcome.blade.phpファイルを指定するものになります。
// URIによるルーティングはVueRouter側で行いたいので、Laravel側ではこのような設定を基本的には利用します。
// これがないと、vue-routerによるルーティングが正常に動作しません.
