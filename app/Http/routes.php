<?php

Route::get('/', function () {
    return view('welcome');// resources/views/welcome.blade.php
});

// 基础页面
Route::get('about', 'PageController@home');// App/Http/Controllers/PageController.php

// 前端页面路由


// 格言
Route::group(['prefix' => 'motto', 'namespace' => 'Motto'], function () {
    Route::get('/', 'MottoController@home');
    Route::get('{motto}', 'MottoController@detail');
});

// 后端数据API路由
Route::group(['prefix' => 'api'], function () {
    Route::group(['prefix' => 'motto', 'namespace' => 'Motto'], function () {
        Route::get('index', 'MottoController@index');
    });
});