<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


use App\Http\Controllers\MemberController;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\DetailCRUDController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\MoneyController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\BringController;
use App\Http\Controllers\Auth\ResetPasswordController;


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

Route::resource('companies', CRUDController::class);
Route::delete('companies/{id}', 'CRUDController@destroy')->name('companies.destroy');
Route::get('companeisMember', [CRUDController::class, 'member'])->name('companies.member');
Route::delete('destroyImg/{id}', [CRUDController::class, 'destroyImg'])->name('destroyImg');
Route::get('pdfCompany', [CRUDController::class, 'pdf']);
Route::get('detailCompany/{id}', [CRUDController::class, 'detailCompany'])->name('detailCompany');
Route::get('detailMember/{id}', [CRUDController::class, 'detailMember'])->name('detailMember');


//การค้นหาหน้า Admin
Route::get('/search', [SearchController::class, 'search'])->name('web.search');
Route::get('/find', [SearchController::class, 'find'])->name('web.find'); //หน้า Admin หลัก
Route::get('pdfSearch', [SearchController::class, 'pdf']);

//การค้นหาหน้า Member
Route::get('/finduser', [SearchController::class, 'finduser'])->name('web.finduser');
Route::get('/searchMember', [SearchController::class, 'searchMember'])->name('web.searchMember');

Route::resource('money', MoneyController::class);
Route::post('createdetail/fetch', [MoneyController::class, 'fetch'])->name('dynamicdependent.fetch');
Route::get('/createdetail', [MoneyController::class, 'index']);
Route::get('/createUser', [MoneyController::class, 'createUser'])->name('createUser');
Route::post('/createUserstore', [MoneyController::class, 'createUserstore'])->name('createUserstore');

Route::resource('user', ManageUserController::class);
Route::put('/users/{id}', [ManageUserController::class, 'update'])->name('users.update');

Route::resource('bring', BringController::class);
Route::get('/bringMember', [BringController::class, 'member'])->name('bring.member');
Route::get('member', [BringController::class, 'member'])->name('member');

Route::resource('detail_companies', DetailCRUDController::class);

Route::resource('member', MemberController::class);

Route::get('/', function () {
    return view('auth/login');
});

Auth::routes();

Route::get('home', [HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
