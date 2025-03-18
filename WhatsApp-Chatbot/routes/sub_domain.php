<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
     return 'Hi This is the Home Page';
});


Route::get('/getroute', function () {
     return 'Hi my name is Bhavesh...';
});
