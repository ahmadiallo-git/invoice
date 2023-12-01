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

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrderController;

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
    //Category Routes
    Route::prefix('category')->group(function (){
        Route::get('/', [CategoryController::class,'index'])->name('category.index');
        Route::get('/create', [CategoryController::class,'create'])->name('category.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/category/cancel', [CategoryController::class, 'cancel'])->name('category.cancel');
        Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
        Route::delete('/category/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::put('/category/{category}', [CategoryController::class, 'update'])->name('category.update');



    });


      //Products Routes
      Route::prefix('product')->group(function (){
        Route::get('/', [ProductController::class,'index'])->name('product.index');
        Route::get('/create', [ProductController::class,'create'])->name('product.create');
        Route::post('/store', [ProductController::class, 'store'])->name('product.store');
        Route::get('/product/cancel', [ProductController::class, 'cancel'])->name('product.cancel');
        Route::get('/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
        Route::delete('/product/{product}', [ProductController::class, 'destroy'])->name('product.destroy');
        Route::put('/product/{product}', [ProductController::class, 'update'])->name('product.update');
    });

     //Cart Routes
     Route::prefix('carts')->group(function (){
       Route::post('/', [CartController::class, 'store'])->name('cart.store');
    });
    Route::prefix('orders')->group(function ()
    {
        Route::get('/', [OrderController::class,'index'])->name('oders.index');
        Route::get('/store', [OrderController::class, 'store'])->name('orders.store');
    });

    Route::get('/cart', [InvoiceController::class, 'cart']);
    Route::get('/invoices/{invoice}', [InvoiceController::class, 'show'])->name('invoice.show');
    

});