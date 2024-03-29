<?php

use App\Http\Controllers\LevenshteinController;
use App\Models\User;
use App\Models\Message;
use App\Models\Product;
use App\Models\TempProduct;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TempProductController;
use App\Models\Alias;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\SearchController;

use function PHPUnit\Framework\isEmpty;

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

Route::get('/login',[UserController::class, 'login'])->name('login');
Route::post('/users/authenticate',[UserController::class, 'authenticate']);
Route::get('/import',[ProductController::class, 'importExcel']);

Route::get('/home', function () {
    return view('home', [
        'users' => User::get()
    ]);
})->middleware('auth');
//////////////////////////////To create a user outside auth limits
Route::get('/addUser',function(){
    return view('addUser');
});
///////////////////////////////////////

//CHANGE TO ->name('store')->middleware('auth') after creating a user and modifying canDelete column
//in database to 1 to allow account to delete all users
Route::post('/users/store',[UserController::class,'store'])->name('store');
Route::post('/logout',[UserController::class, 'logout'])->name('logout');

Route::get('/Not_Found', function () {
    return view('error');
})->name('error');

Route::post('/deleteUser',[UserController::class, 'destroy'])->middleware('auth');

Route::get('/products',function(){
    return view('temp_products',[
        'tempProducts' => TempProduct::get()
    ]);
});
// ->middleware('auth');
Route::get('/perm_products', [SearchController::class, 'search']);

Route::get('/calculate-distance', [LevenshteinController::class, 'calculateDistance']);
Route::post('/product/store',[ProductController::class, 'store'])->middleware('auth');
Route::post('/product/update',[ProductController::class, 'update'])->middleware('auth');
Route::post('/product/delete',[ProductController::class, 'destroy'])->middleware('auth');
Route::post('/tempProduct/store',[TempProductController::class, 'store'])->middleware('auth');
Route::post('/tempProduct/update',[TempProductController::class, 'update'])->middleware('auth');
Route::post('/tempProduct/delete',[TempProductController::class, 'destroy'])->middleware('auth');

Route::get('/messages',function(){
    return view('message',[
        'messages'=> Message::orderBy('id',"desc")->get()
    ]);
})->middleware('auth');
Route::post('/messages/store',[MessageController::class, 'store'])->middleware('auth');



Route::get('/barcode',function(){
    return view('barcode');
});


Route::get('/',function(){
   return redirect('/perm_products');
});