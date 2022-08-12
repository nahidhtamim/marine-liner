<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\PortController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\Admin\ContainerController;
use App\Http\Controllers\Admin\TrackingController;
use App\Http\Controllers\Booking_TrackingController;
use App\Http\Controllers\ContactController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteCountryProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [HomeController::class, 'about']);
Route::get('/contact', [HomeController::class, 'contact']);
Route::get('/booking', [HomeController::class, 'booking']);
Route::get('/tracking', [HomeController::class, 'tracking']);
Route::post('getCntryPorts',[HomeController::class,'getCntryPorts'])->name('getCntryPorts');

Route::get('refresh_captcha',[ContactController::class, 'refreshCaptcha'])->name('refresh_captcha');
Route::post('/send-email', [ContactController::class, 'contactMail'])->name('contact.send');


Auth::routes();

Route::group(['middleware' => ['auth','verified']], function () {

    Route::post('/make-booking', [Booking_TrackingController::class, 'make_booking']);
    Route::get('/my-bookings', [Booking_TrackingController::class, 'my_bookings']);
    Route::get('/tracking/{booking_id}', [Booking_TrackingController::class, 'track']);
    // Route::get('/status', [HomeController::class, 'status'])->name('status');
    // Route::get('/status/update', [HomeController::class, 'updateStatus'])->name('users.update.status');
 
    // Route::get('/my-profile', [HomeController::class, 'myProfile'])->name('my-profile');
    // Route::post('/update-details', [HomeController::class, 'updateDetails']);
    // Route::post('/update-password', [HomeController::class, 'updatePassword']);
 
 });

Route::group(['middleware' => ['auth','isAdmin','verified']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
 
    // Countries Routes
    Route::get('/countries', [CountryController::class, 'index']);
    Route::post('/save-country', [CountryController::class, 'saveCountry']);
    Route::get('/edit-country/{slug}', [CountryController::class, 'editCountry']);
    Route::post('/update-country/{slug}', [CountryController::class, 'updateCountry']);
    Route::get('/delete-country/{slug}', [CountryController::class, 'deleteCountry']);
    
    // Ports Routes
    Route::get('/ports', [PortController::class, 'index']);
    Route::post('/save-port', [PortController::class, 'savePort']);
    Route::get('/edit-port/{slug}', [PortController::class, 'editPort']);
    Route::post('/update-port/{slug}', [PortController::class, 'updatePort']);
    Route::get('/delete-port/{slug}', [PortController::class, 'deletePort']);

    // Containers Routes
    Route::get('/containers', [ContainerController::class, 'index']);
    Route::post('/save-container', [ContainerController::class, 'saveContainer']);
    Route::get('/edit-container/{slug}', [ContainerController::class, 'editContainer']);
    Route::post('/update-container/{slug}', [ContainerController::class, 'updateContainer']);
    Route::get('/delete-container/{slug}', [ContainerController::class, 'deleteContainer']);

    // Containers Routes
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/save-booking', [BookingController::class, 'saveBooking']);
    Route::get('/edit-booking/{tracking_id}', [BookingController::class, 'editBooking']);
    Route::post('/update-booking/{tracking_id}', [BookingController::class, 'updateBooking']);
    Route::get('/delete-booking/{tracking_id}', [BookingController::class, 'deleteBooking']);
    Route::post('getCountryPorts',[BookingController::class,'getCountryPorts'])->name('getCountryPorts');
    
    // Trackings Routes
    Route::get('/trackings/{booking_id}', [TrackingController::class, 'index']);
    Route::post('/save-tracking', [TrackingController::class, 'saveTracking']);
    Route::get('/edit-tracking/{booking_id}', [TrackingController::class, 'editTracking']);
    Route::post('/update-tracking/{booking_id}', [TrackingController::class, 'updateTracking']);
    Route::get('/delete-tracking/{booking_id}', [TrackingController::class, 'deleteTracking']);

    // Route::get('/services', [CountryController::class, 'index']);
    // Route::get('/add-service', [CountryController::class, 'addService']);
    // Route::post('/save-service', [CountryController::class, 'saveService']);
    // Route::get('/edit-service/{id}', [CountryController::class, 'editService']);
    // Route::post('/update-service/{id}', [CountryController::class, 'updateService']);
    // Route::get('/delete-service/{id}', [CountryController::class, 'deleteService']);
    // Route::get('/service-active/{id}', [CountryController::class, 'active']);
    // Route::get('/service-deactive/{id}', [CountryController::class, 'deactive']);
 
 });

