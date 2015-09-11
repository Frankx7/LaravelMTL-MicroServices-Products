<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['prefix' => '/api/v1'], function() use ($app) {
    $app->get('products', 'App\Http\Controllers\ProductController@index');
    $app->get('products/{id}', 'App\Http\Controllers\ProductController@show');
    $app->post('products', 'App\Http\Controllers\ProductController@store');
});

// Benchmark routes
$app->get('/benchmark', function() {
    return 'Hello world';
});