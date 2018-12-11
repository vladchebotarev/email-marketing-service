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

Route::get('/mail', function () {
    return (new App\Mail\MilanoMailCampaign())->render();
});

Auth::routes();

Route::group(['prefix' => 'dashboard',  'middleware' => ['auth', 'web']], function() {
    Route::get('/', 'DashboardController@index')->name('dashboard');

    Route::get('/profile', 'ProfileController@index')->name('profile');
    Route::post('profile/password', 'ProfileController@changePassword')->name('profile.password');

    Route::prefix('/campaigns')->group(function() {
        Route::get('/', 'CampaignsController@index')->name('campaigns');
        Route::get('/send-campaign', 'CampaignsController@sendCampaignShow');
        Route::post('/send-campaign', 'CampaignsController@sendCampaign')->name('campaigns.send');
    });

    Route::prefix('/subscribers')->group(function() {
        Route::get('/', 'SubscribersController@index')->name('subscribers');
        Route::get('/create-list', 'SubscribersController@createListShow');
        Route::post('/create-list', 'SubscribersController@createList')->name('subscribers.create_list');
    });

    Route::get('/templates', 'TemplatesController@index')->name('templates');
    Route::get('/schedules', 'SchedulesController@index')->name('schedules');
    Route::get('/faq', function () {
        return view('dashboard.faq');
    });
});

