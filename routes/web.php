<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
|-----------------------------------------------------------
|  动作   |         URI          |   行为   |    路由名称     |
|-----------------------------------------------------------
| GET    | /photos              | index   | photos.index   |
|-----------------------------------------------------------
| GET    | /photos/create       | create  | photos.create  |
|-----------------------------------------------------------
| POST   | /photos              | store   | photos.store   |
|-----------------------------------------------------------
| GET    | /photos/{photo}      | show    | photos.show    |
|-----------------------------------------------------------
| GET    | /photos/{photo}/edit | edit    | photos.edit    |
|-----------------------------------------------------------
| PUT    | /photos/{photo}      | update  | photos.update  |
|-----------------------------------------------------------
| DELETE | /photos/{photo}      | destroy | photos.destroy |
|-----------------------------------------------------------
*/

Route::get('/', 'PagesController@root')->name('root');


/*
$this->get('login', 'Auth\LoginController@showLoginForm')->name('login');
$this->post('login', 'Auth\LoginController@login');
$this->post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
$this->get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
$this->post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset');
*/
Auth::routes();

//用户
//Route::resource('users','UsersController',['only'=>['show','update','edit']]);
Route::get('users/{user}', 'UsersController@show')->name('users.show');//用户个人中心
Route::get('users/{user}/edit', 'UsersController@edit')->name('users.edit');//用户编辑页面
Route::put('users/{user}', 'UsersController@update')->name('users.update');//用户编辑页面提交

//话题
Route::get('topics', 'TopicsController@index')->name('topics.index');
Route::get('topics/create', 'TopicsController@create')->name('topics.create');
Route::post('topics', 'TopicsController@store')->name('topics.store');
Route::get('topics/{topic}/edit', 'TopicsController@edit')->name('topics.edit');
Route::put('topics/{topic}', 'TopicsController@update')->name('topics.update');
Route::delete('topics/{topic}', 'TopicsController@destroy')->name('topics.destroy');
Route::get('topics/{topic}/{slug?}', 'TopicsController@show')->name('topics.show');//该路由放到topics.edit上面会冲突

//分类
Route::resource('categories', 'CategoriesController', ['only' => ['show']]);

//上传图片
Route::post('images', 'ImagesController@store')->name('images.store');