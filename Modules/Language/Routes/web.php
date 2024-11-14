<?php

use Modules\Language\Http\Controllers\LanguageController;

Route::group(['as'=> 'admin.', 'prefix' => 'admin', 'middleware' => ['XSS','DEMO','auth:admin']],function (){

    Route::resource('language', LanguageController::class);

    Route::get('theme-language', [LanguageController::class, 'theme_language'])->name('theme-language');

    Route::post('update-theme-language', [LanguageController::class, 'update_theme_language'])->name('update-theme-language');
});

