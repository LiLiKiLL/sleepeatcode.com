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
    Route::get('blog/tag/{tag}', ['as' => 'blog_tag', 'uses' => 'PageController@blogTag']);
    Route::get('blog/tags', ['as' => 'blog_tags', 'uses' => 'PageController@blogTags']);
});


/**
 * 后台页面
 */
Route::group(['prefix' => 'dashboard', 'namespace' => 'End'], function () {
    Route::get('/', ['as' => 'end_index', 'uses' => 'IndexController@index']);
    Route::match(['get', 'post'], 'register', ['as' => 'admin_reg', 'uses' => 'AdminController@register']);
    Route::match(['get', 'post'], 'login', ['as' => 'admin_login', 'uses' => 'AdminController@login']);
    Route::get('logout', ['as' => 'admin_logout', 'uses' => 'AdminController@logout']);

    // 博客文章管理
    Route::group(['prefix' => 'article', 'middleware' => 'admin.auth'], function () {
        Route::match(['get', 'post'], 'add', ['as' => 'article_add', 'uses' => 'ArticleController@add']);
        Route::get('list', ['as' => 'article_list', 'uses' => 'ArticleController@getList']);
        Route::get('preview/{id}', ['as' => 'article_preview', 'uses' => 'ArticleController@preview']);
        Route::match(['get', 'post'], 'edit/{id}', ['as' => 'article_edit', 'uses' => 'ArticleController@edit']);
        Route::get('delete/{id}', ['as' => 'article_delete', 'uses' => 'ArticleController@delete']);
    });

    // 格言管理
    Route::group(['prefix' => 'motto', 'middleware' => 'admin.auth'], function () {
        Route::match(['get', 'post'], 'add', ['as' => 'motto_add', 'uses' => 'MottoController@add']);
        Route::get('list', ['as' => 'motto_list', 'uses' => 'MottoController@getList']);
        Route::match(['get', 'post'], 'edit/{id}', ['as' => 'motto_edit', 'uses' => 'MottoController@edit']);
    });

    // 书签管理
    Route::group(['prefix' => 'bookmark', 'middleware' => 'admin.auth'], function () {
        Route::get('add', ['as' => 'bookmark_add', 'uses' => 'BookmarkController@add']);
        Route::get('list', ['as' => 'bookmark_list', 'uses' => 'BookmarkController@getList']);
    });
});

/**
 * 通用接口
 */
Route::post('upload/image', ['as' => 'upload_image', 'uses' => 'CommonController@uploadImage']);
Route::get('download/image/{filename}', ['as' => 'download_image', 'uses' => 'CommonController@downloadImage']);

/**
 * 后台接口
 */
Route::group(['prefix' => 'api', 'namespace' => 'End'], function () {
    Route::post('admin/register', 'AdminController@register');
    Route::post('admin/login', 'AdminController@login');
});

Route::group(['prefix' => 'api/bookmark', 'namespace' => 'Bookmark'], function() {
    Route::post('addDir', 'BookmarkController@addDir');
});

Route::group(['prefix' => 'test'], function () {
    Route::get('session1', 'TestController@session1');
});