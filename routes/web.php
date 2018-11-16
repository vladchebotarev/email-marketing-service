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

Route::get('/phpInfo', function() {
    phpinfo();
});

Route::get('/send', function() {
    $when = Carbon\Carbon::now()->addSeconds(20);

    Mail::to('vlad.bmx4@gmail.com')
        ->later($when, new MilanoMailCampaign());
        //->queue(new MilanoMailCampaign());

    return 'Mail send';
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
