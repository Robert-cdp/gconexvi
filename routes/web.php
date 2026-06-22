<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.index');
})->name('index');

Route::get('/services', function () {
    return view('services.index');
});

Route::get('/jobs', function () {
    return view('jobs.index');
});

Route::get('/forum', function () {
    return view('forum.index');
});

Route::get('/p2p', function () {
    return view('p2p.index');
});
