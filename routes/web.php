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

Route::get('/', function () {
    return view('index');
});

// Route::get('/inventaris', 'InventarisController@index')->name('inventaris');

Route::get('/inventaris/cetak-data', 'InventarisController@print')->name('inventaris.print');
Route::get('/inventory/cetak-data', 'InventoryController@print')->name('inventory.print');
Route::get('/ruangan/cetak-data', 'RuanganController@print')->name('ruangan.print');
Route::get('/ruangan/master-data', 'RuanganController@barangRuangan')->name('ruangan.barangruangan');
Route::resource('inventaris', 'InventarisController');
Route::resource('inventory', 'InventoryController');
Route::resource('ruangan', 'RuanganController');

