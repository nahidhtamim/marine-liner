<?php

namespace App\Http\Controllers;

use App\Helpers\Helper;
use App\Models\Booking;
use App\Models\Country;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Booking_TrackingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make_booking(Request $request){

        $booking_id = Helper::trackingNumberGenerate(new Booking, 'booking_id', 6, 'ML'); /** Generate Tracking Number */
        $booking = new Booking();
        $booking->booking_id = $booking_id;
        $booking->company_name = $request->input('company_name');
        $booking->company_address = $request->input('company_address');
        $booking->from_country = $request->input('from_country');
        $booking->from_port = $request->input('from_port');
        $booking->destination_country = $request->input('destination_country');
        $booking->destination_port = $request->input('destination_port');
        $booking->container_id = $request->input('container_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->goods = $request->input('goods');
        $booking->user_id = Auth::user()->id;
        $booking->save();

        return redirect()->back()->with('status', 'Booking Added Successfully');
    }


    public function my_bookings(){
        $bookings = Booking::get()->where('user_id', Auth::user()->id);
        return view('my-bookings', compact('bookings'));
    }
    
}
