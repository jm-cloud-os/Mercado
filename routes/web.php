<?php

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
    return view('welcome');
});

Route::get('change/language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }

    return redirect()->back();
})->name('change.language');

Auth::routes();
Route::middleware(['auth'])->prefix('panel')->group(function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('todos', 'Productos\TodosController');
    Route::resource('productos', 'Productos\IndividualesController');
    Route::resource('paquetes', 'Productos\PaquetesController');
    Route::resource('ventas', 'VentasController');


    Route::prefix('configuracion')->namespace('Settings')->group(function() {
        Route::resource('cupones', 'CuponesController');
        Route::resource('almacenes', 'AlmacenesController');
        Route::resource('canales', 'CanalesController');
        Route::resource('calidades', 'CalidadesController');
    });
});

/**
 * All resource names in ajax group should start with x
 */
Route::prefix('ajax')->group(function() {
    Route::resource('xproductos', 'Ajax\ProductosController', ['names' => [
            'index' => 'autocomplete.productos'
        ]
    ]);
});
