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
    return view('index');
    // return view('welcome');
}]);

/**
 * 前台页面
 */
Route::get('blog', function() {
    return view('front/blog');
});
Route::get('resume', function() {
    return view('front/resume');
});

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
Route::group(['prefix' => 'api', 'namespace' => 'End'], function () {
    Route::post('admin/register', 'Admin\AdminController@register');
    Route::post('admin/login', 'Admin\AdminController@login');
});

Route::group(['prefix' => 'api/bookmark', 'namespace' => 'Bookmark'], function() {
    Route::post('addDir', 'BookmarkController@addDir');
});

Route::group(['prefix' => 'test'], function () {
    Route::get('session1', 'TestController@session1');
});