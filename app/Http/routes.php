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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('test', function() {
    return view(' test');
});

/**
 * 前台页面
 */
Route::group(['namespace' => 'Front'], function() {
    Route::get('/', ['as' => 'home', 'uses' => 'PageController@home']);
    Route::get('blog', ['as' => 'blog', 'uses' => 'PageController@blog']);
    Route::get('blog/{id}', ['as' => 'blog_view', 'uses' => 'PageController@blogView']);
    Route::get('resume', ['as' => 'resume', 'uses' => 'PageController@resume']);
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

    // 博客文章管理
    Route::group(['prefix' => 'article'], function () {
        Route::match(['get', 'post'], 'add', ['as' => 'article_add', 'uses' => 'ArticleController@add']);
        Route::get('list', ['as' => 'article_list', 'uses' => 'ArticleController@getList']);
        Route::get('preview/{id}', ['as' => 'article_preview', 'uses' => 'ArticleController@preview']);
        Route::match(['get', 'post'], 'edit/{id}', ['as' => 'article_edit', 'uses' => 'ArticleController@edit']);
        Route::get('delete/{id}', ['as' => 'article_delete', 'uses' => 'ArticleController@delete']);
    });
});

/**
 * 后台接口
 */
Route::group(['prefix' => 'api', 'namespace' => 'End\Admin'], function () {
    Route::post('admin/register', 'AdminController@register');
    Route::post('admin/login', 'AdminController@login');
});

Route::group(['prefix' => 'api/bookmark', 'namespace' => 'Bookmark'], function() {
    Route::post('addDir', 'BookmarkController@addDir');
});

Route::group(['prefix' => 'test'], function () {
    Route::get('session1', 'TestController@session1');
});