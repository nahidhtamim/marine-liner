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
use App\Http\Controllers\FrontendController;

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
Route::post('find-booking', [HomeController::class, 'track_booking']);

// Route::post('/track-booking', [HomeController::class, 'track_booking']);
Route::get('/tracking/{booking_id}', [HomeController::class, 'track']);

Route::post('getCntryPorts',[HomeController::class,'getCntryPorts'])->name('getCntryPorts');

Route::get('/ground', [HomeController::class, 'ground']);
Route::get('/logistics', [HomeController::class, 'logistics']);
Route::get('/ocean', [HomeController::class, 'ocean']);
Route::get('/storage', [HomeController::class, 'storage']);
Route::get('/trucking', [HomeController::class, 'trucking']);
Route::get('/warehousing', [HomeController::class, 'warehousing']);

Route::get('refresh_captcha',[ContactController::class, 'refreshCaptcha'])->name('refresh_captcha');
Route::post('/send-email', [ContactController::class, 'contactMail'])->name('contact.send');


Auth::routes();

Route::group(['middleware' => ['auth','verified']], function () {

    Route::post('/make-booking', [Booking_TrackingController::class, 'make_booking']);
    Route::get('/my-bookings', [Booking_TrackingController::class, 'my_bookings']);
;
    // Route::get('/status', [HomeController::class, 'status'])->name('status');
    // Route::get('/status/update', [HomeController::class, 'updateStatus'])->name('users.update.status');
 
    Route::get('/change-password', [FrontendController::class, 'change_password']);
    Route::post('/confirm-password', [FrontendController::class, 'confirm_password']);
    // Route::post('/update-password', [HomeController::class, 'updatePassword']);
 
 });

Route::group(['middleware' => ['auth','isAdmin','verified']], function () {

    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::post('/update-password', [DashboardController::class, 'update_password']);

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

    // Bookings Routes
    Route::get('/bookings', [BookingController::class, 'index']);
    Route::post('/save-booking', [BookingController::class, 'saveBooking']);
    Route::get('/edit-booking/{booking_id}', [BookingController::class, 'editBooking']);
    Route::post('/update-booking/{booking_id}', [BookingController::class, 'updateBooking']);
    Route::get('/delete-booking/{booking_id}', [BookingController::class, 'deleteBooking']);
    Route::post('getCountryPorts',[BookingController::class,'getCountryPorts'])->name('getCountryPorts');
    Route::post('/add-tracking/{booking_id}', [BookingController::class, 'addTrackingId']);
    Route::get('/mark-active/{booking_id}', [BookingController::class, 'markActive']);
    Route::get('/mark-complete/{booking_id}', [BookingController::class, 'markComplete']);

    
    // Trackings Routes
    Route::get('/trackings/{tracking_id}', [TrackingController::class, 'index']);
    Route::post('/save-tracking', [TrackingController::class, 'saveTracking']);
    Route::get('/edit-tracking/{id}', [TrackingController::class, 'editTracking']);
    Route::post('/update-tracking/{id}', [TrackingController::class, 'updateTracking']);
    Route::post('/update-tracking/{id}', [TrackingController::class, 'updateTracking']);
    Route::get('/delete-tracking/{id}', [TrackingController::class, 'deleteTracking']);
    Route::get('/tracking-departed/{id}', [TrackingController::class, 'trackingDeparted']);
    Route::get('/tracking-hold/{id}', [TrackingController::class, 'trackingHold']);
    Route::get('/tracking-active/{id}', [TrackingController::class, 'trackingActive']);
    Route::get('/tracking-complete/{id}', [TrackingController::class, 'trackingComplete']);

    // Route::get('/services', [CountryController::class, 'index']);
    // Route::get('/add-service', [CountryController::class, 'addService']);
    // Route::post('/save-service', [CountryController::class, 'saveService']);
    // Route::get('/edit-service/{id}', [CountryController::class, 'editService']);
    // Route::post('/update-service/{id}', [CountryController::class, 'updateService']);
    // Route::get('/delete-service/{id}', [CountryController::class, 'deleteService']);
    // Route::get('/service-active/{id}', [CountryController::class, 'active']);
    // Route::get('/service-deactive/{id}', [CountryController::class, 'deactive']);
 
 });

