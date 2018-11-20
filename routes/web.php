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

use App\Mail\MilanoMailCampaign;
use Illuminate\Support\Facades\Mail;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/send', 'SendController@index')->name('send');
Route::get('/mail', function () {
    return (new App\Mail\MilanoMailCampaign())->render();
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
