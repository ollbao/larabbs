<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|您可以在这里为您的应用程序注册API路线。 这些路由由RouteServiceProvider在分配了“api”中间件组的组内加载。 享受建立您的API！
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
