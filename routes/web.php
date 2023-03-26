<?php

use Src\Route;

Route::add('GET', '/hello', [Controller\Site::class, 'hello'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/signup', [Controller\Site::class, 'signup']);
Route::add(['GET', 'POST'], '/login', [Controller\Site::class, 'login']);
Route::add('GET', '/logout', [Controller\Site::class, 'logout']);
Route::add('GET', '/users', [Controller\Site::class, 'users'])
    ->middleware('auth');
Route::add(['GET', 'POST'], '/subscriber_add', [Controller\Site::class, 'subscriber_add'])
    ->middleware('admin');
Route::add('GET', '/subscriber', [Controller\Site::class, 'subscriber'])
    ->middleware('auth');

