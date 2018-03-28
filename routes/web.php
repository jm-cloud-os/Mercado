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

/*
  Route::get('/', function () {
  return view('welcome');
  });
 */
Route::get('change/language/{locale}', function ($locale) {
    if (in_array($locale, \Config::get('app.locales'))) {
        Session::put('locale', $locale);
    }
    
    return redirect()->back();
})->name('change.language');

Auth::routes();
Route::middleware(['auth'])->group(function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::resource('todos', 'Productos\TodosController');
    Route::resource('productos', 'Productos\IndividualesController');
    Route::resource('paquetes', 'Productos\PaquetesController');
    Route::resource('ventas', 'VentasController');
    Route::resource('settings', 'Settings\SettingsController');
});

/**
 * All resource names in ajax group should start with x
 */
Route::group(['ajax'], function(){
    Route::resource('xproductos', 'Ajax\ProductosController', ['names' => [
            'index' => 'autocomplete.productos'
        ]
    ]);
});