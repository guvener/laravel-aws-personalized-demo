<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => '\App\Http\Controllers'], function($router){
    $router->get('/', 'ViewerController@index');
    $router->get('/movies', 'MovieController@index');
    $router->get('/viewers/random/', 'ViewerController@random');
    $router->get('/viewers/{viewer}', 'ViewerController@show');
    $router->get('/viewers/{viewer}/personalize', 'PersonalizeController@show');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
