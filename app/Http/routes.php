<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'host', function () {
    return view('welcome');
}]);

/**
 * 后台页面
 */
Route::group(['prefix' => 'dashboard', 'namespace' => 'End\Page'], function () {
    Route::get('/', 'IndexController@index');
    Route::get('register', ['as' => 'admin_reg', 'uses' => 'AuthController@register']);
    Route::get('login', ['as' => 'admin_login', 'uses' => 'AuthController@login']);

    // 书签管理
    Route::group(['prefix' => 'bookmark'], function () {
        Route::get('add', 'BookmarkController@add');
    });
});

/**
 * 后台接口
 */
Route::group(['prefix' => 'api'], function () {
    Route::post('admin/register', 'End\Admin\AdminController@register');
    Route::post('admin/login', 'End\Admin\AdminController@login');
});