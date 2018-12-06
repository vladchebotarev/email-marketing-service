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

Route::get('/send', 'SendController@index')->name('send');
Route::get('/mail', function () {
    return (new App\Mail\MilanoMailCampaign())->render();
});

Auth::routes();

Route::group(['prefix' => 'dashboard',  'middleware' => ['auth', 'web']], function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('profile/password', 'ProfileController@changePassword')->name('profile.password');

    Route::get('/campaigns', 'CampaignsController@index')->name('campaigns');
    Route::get('/subscribers', 'SubscribersController@index')->name('subscribers');
    Route::get('/templates', 'TemplatesController@index')->name('templates');
    Route::get('/schedules', 'SchedulesController@index')->name('schedules');
    Route::get('/faq', function () {
        return view('dashboard.faq');
    });
});

