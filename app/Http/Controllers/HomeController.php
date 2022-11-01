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
        $tracking_id = $request->input('tracking_id');
        $trackings = Tracking::where('tracking_id', $tracking_id)->orderBy('id', 'DESC')->get();
        $booking = Booking::where('tracking_id', $tracking_id)->first();
        return redirect('/tracking/'.$tracking_id)->with( [ 'trackings' => $trackings, 'countries' => $countries, 'tracking_id' => $tracking_id, 'booking' => $booking ] );
    }

    public function track($tracking_id){
        $countries = Country::all();
        $trackings = Tracking::where('tracking_id', $tracking_id)->orderBy('id', 'DESC')->get();
        $booking = Booking::where('tracking_id', $tracking_id)->first();
        return view('item-tracking', compact('trackings', 'countries', 'tracking_id', 'booking'));
    }


    public function ground(){
        return view('services.ground');
    }

    public function logistics(){
        return view('services.logistics');
    }
    public function ocean(){
        return view('services.ocean');
    }

    public function storage(){
        return view('services.storage');
    }
    public function trucking(){
        return view('services.trucking');
    }

    public function warehousing(){
        return view('services.warehousing');
    }

}
