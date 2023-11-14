<?php




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

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::prefix('products')->group( function (){
        Route::get('/', [ProductController::class,'index'])->name('products');
        Route::get('/create-products', [ProductController::class,'create'])->name('creat.products');
    });
    Route::prefix('category')->group(function (){
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::get('/create', [CategoryController::class,'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
    });
});