<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Container;
use App\Models\Country;
use App\Models\Port;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Mockery\Matcher\Contains;

class HomeController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function about(){
        return view('about');
    }

    public function contact(){
        return view('contact');
    }

    public function publication(){
        return view('publication');
    }

    public function booking(){
        $countries = Country::all();
        $ports = Port::all();
        $containers = Container::all();
        return view('booking', compact('countries', 'ports', 'containers'));
    }

    public function getCntryPorts(Request $request)
    {
        $country_port=Port::where('country_id', $request->country_id)->orderBy('name')->get();
        return $country_port;
    }



    public function tracking(){
        return view('tracking');
    }

    public function track_booking(Request $request){
        $countries = Country::all();
        $booking_id = $request->input('booking_id');
        $trackings = Tracking::get()->where('booking_id', $booking_id);
        $booking = Booking::where('tracking_id', $booking_id)->first();
        return redirect('/tracking/'.$booking_id)->with( [ 'trackings' => $trackings, 'countries' => $countries, 'booking_id' => $booking_id, 'booking' => $booking ] );
    }


    public function track($booking_id){
        $countries = Country::all();
        $trackings = Tracking::get()->where('booking_id', $booking_id);
        $booking = Booking::where('tracking_id', $booking_id)->first();
        return view('item-tracking', compact('trackings', 'countries', 'booking_id', 'booking'));
    }
}
