<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/contacte', function () {
    return view('pages.contact');
});

Route::get('/about', function () {
    return view('pages.about');
});


/*                                "_________________________________".
                                 "|                                 |".
                                 "| -------|-------|--------|-------|".
                                 "| -------|-------|--------|-------|_____ ".
                                 "|                                  |-----\ ".
                                 "|   _____            _____         |-----|".
                                 "|__/-----\__________/-----\_________\___|".
                                 "   \_____/          \_____/"
                                 */