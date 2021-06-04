<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\HomeController;

Route::resource('', HomeController::class)->names('st');
