<?php

use Modules\Country\Http\Controllers\CountryController;

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


Route::group(['as'=> 'admin.', 'prefix' => 'admin/listing', 'middleware' => ['XSS','DEMO','auth:admin']],function (){

    Route::resource('country', CountryController::class);

});
