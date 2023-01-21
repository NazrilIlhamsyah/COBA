<?php
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CostumerController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\BajuController;
use App\Http\Controllers\usercontroller;
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


Route::get('/', [usercontroller::class, 'Home']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
    Route::resource('barang', BarangController::class);
    Route::resource('supplier', SupplierController::class);
    Route::resource('transaksi', TransaksiController::class);
    Route::resource('costumer', CostumerController::class);
});


// Route::get('/cart', [App\Http\Controllers\BarangController::class, 'cart']);
// Route::get('/store', [BarangController::class, 'storee']);
// Route::get('/product/{barang}', [BarangController::class, 'product']);
// Route::get('/checkout', [TransaksiController::class, 'checkout']);


Route::group(['prefix' => '/'], function () {
    Route::get('/store', [BarangController::class, 'storee']);
    Route::get('/product/{barang}', [BarangController::class, 'product'])->name('barang');
    Route::get('/cart/{barang}', [BarangController::class, 'cart'])->name('barang');
    Route::get('/checkout/{barang}', [BarangController::class, 'checkout'])->name('costumer');
    Route::get('/status', [CostumerController::class, 'status']);

});
Route::get('/test', function () {
    return view('customer.status');
});