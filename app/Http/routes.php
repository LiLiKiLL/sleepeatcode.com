<?php

Route::group(['middleware' => 'web'], function () {

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

    // 文章
    Route::group(['prefix' => 'article', 'namespace' => 'Article'], function () {
        Route::get('/', 'ArticleController@index');
        Route::get('{article}', 'ArticleController@detail');
        Route::post('{article}/comment', 'ArticleCommentController@add');
        Route::get('{article}/comment/{comment}/edit', 'ArticleCommentController@edit');
        Route::patch('{article}/comment/{comment}', 'ArticleCommentController@update');// 资源路由patch:update-更新操作
    });

    // 后端数据API路由
    Route::group(['prefix' => 'api'], function () {
        Route::group(['prefix' => 'motto', 'namespace' => 'Motto'], function () {
            Route::get('index', 'MottoController@index');
        });
    });

});

