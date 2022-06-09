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

//メインページ表示
Route::get('/ryokan/main', 'App\Http\Controllers\RyokanController@index')->name('ryokan');

//福岡県の温泉旅館一覧表示
Route::get('/ryokan/hukuoka', 'App\Http\Controllers\RyokanController@hukuokaList')->name('hukuoka');
//佐賀県の温泉旅館一覧表示
Route::get('/ryokan/saga', 'App\Http\Controllers\RyokanController@sagaList')->name('saga');
//長崎県の温泉旅館一覧表示
Route::get('/ryokan/nagasaki', 'App\Http\Controllers\RyokanController@nagasakiList')->name('nagasaki');
//熊本県の温泉旅館一覧表示
Route::get('/ryokan/kumamoto', 'App\Http\Controllers\RyokanController@kumamotoList')->name('kumamoto');
//大分県の温泉旅館一覧表示
Route::get('/ryokan/oita', 'App\Http\Controllers\RyokanController@oitaList')->name('oita');
//宮崎県の温泉旅館一覧表示
Route::get('/ryokan/miyazaki', 'App\Http\Controllers\RyokanController@miyazakiList')->name('miyazaki');
//鹿児島県の温泉旅館一覧表示
Route::get('/ryokan/kagosima', 'App\Http\Controllers\RyokanController@kagosimaList')->name('kagosima');


//旅館の新規登録画面を表示する
Route::get('/ryokan/create', 'App\Http\Controllers\RyokanController@ryokanCreate')->name('create');
//旅館の新規登録
Route::post('/ryokan/store', 'App\Http\Controllers\RyokanController@exeStore')->name('store');
//旅館の編集画面を表示
Route::get('/ryokan/edit/{id}', 'App\Http\Controllers\RyokanController@ryokanEdit')->name('edit');
//旅館の編集登録
Route::post('/ryokan/updata', 'App\Http\Controllers\RyokanController@exeUpdata')->name('updata');
//旅館を削除する
Route::post('/ryokan/delete/{id}', 'App\Http\Controllers\RyokanController@exeDelete')->name('delete');


//旅館の詳細画面を表示
Route::get('/ryokan/detail/{id}', 'App\Http\Controllers\RyokanController@ryokanDetail')->name('detail');
//マイページにいいねした旅館を表示
Route::get('/ryokan/mypage/{id}', 'App\Http\Controllers\RyokanController@ryokanGood')->name('mypage');

//楽天トラベルの予約ページに遷移
Route::get('/ryokan/rakuten/{name}', 'App\Http\Controllers\RyokanController@rakuten')->name('rakuten');


//ログイン画面表示
Route::get('/ryokan/login', 'App\Http\Controllers\LoginController@showLogin')->name('show');
//ログイン処理
Route::post('/ryokan', 'App\Http\Controllers\LoginController@ryokanSignup')->name('signup');


//ユーザ新規登録画面を表示する
Route::get('/ryokan/user', 'App\Http\Controllers\LoginController@userCreate')->name('user');
//ユーザ新規登録する
Route::post('/ryokan/register', 'App\Http\Controllers\LoginController@userRegister')->name('register');
//パスワード再設定画面を表示する
Route::get('/ryokan/pass', 'App\Http\Controllers\LoginController@userPass')->name('pass');
//パスワード再設定をする
Route::post('/ryokan/reset', 'App\Http\Controllers\LoginController@passReset')->name('reset');


//旅館のレビュー一覧をする
Route::get('/ryokan/review/{id}', 'App\Http\Controllers\ReviewController@ryokanReview')->name('review');
//旅館のレビューを投稿画面を表示する
Route::get('/ryokan/reviewform/{id}', 'App\Http\Controllers\ReviewController@reviewForm')->name('form');
//旅館のレビューを投稿する
Route::post('/ryokan/reviewPost/{id}', 'App\Http\Controllers\ReviewController@reviewPost')->name('post');


//いいね
Route::post('/ryokan/good', 'App\Http\Controllers\GoodController@ryokanGood')->name('good');

//検索機能
Route::get('/ryokan/search', 'App\Http\Controllers\RyokanController@ryokanSearch')->name('search');
