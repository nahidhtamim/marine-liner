<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Container;
use App\Models\Country;
use App\Models\Port;
use App\Models\Tracking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(){
        $bookings = Booking::all();
        $countries = Country::all();
        $ports = Port::all();
        $containers = Container::all();
        return view('admin.bookings.index', compact('bookings', 'countries', 'ports', 'containers'));
    }

    public function getCountryPorts(Request $request)
    {
        $country_port=Port::where('country_id', $request->country_id)->orderBy('name')->get();
        return $country_port;
    }

    public function saveBooking(Request $request){

        $randomNumber = random_int(100000, 999999);

        $booking = new Booking();
        $booking->tracking_id = 'ML'. $randomNumber;
        $booking->company_name = $request->input('company_name');
        $booking->company_address = $request->input('company_address');
        $booking->from_country = $request->input('from_country');
        $booking->from_port = $request->input('from_port');
        $booking->destination_country = $request->input('destination_country');
        $booking->destination_port = $request->input('destination_port');
        $booking->container_id = $request->input('container_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->goods = $request->input('goods');
        $booking->save();

        return redirect('/bookings')->with('status', 'Booking Added Successfully');
    }

    public function editBooking($tracking_id){
        $countries = Country::all();
        $ports = Port::all();
        $containers = Container::all();
        $booking = Booking::where('tracking_id', $tracking_id)->first();
        return view('admin.bookings.edit', compact('booking', 'countries', 'ports', 'containers'));
    }

    public function updateBooking($tracking_id, Request $request){

        $booking = Booking::where('tracking_id', $tracking_id)->first();
        $booking->company_name = $request->input('company_name');
        $booking->company_address = $request->input('company_address');
        $booking->from_country = $request->input('from_country');
        $booking->from_port = $request->input('from_port');
        $booking->destination_country = $request->input('destination_country');
        $booking->destination_port = $request->input('destination_port');
        $booking->container_id = $request->input('container_id');
        $booking->booking_date = $request->input('booking_date');
        $booking->goods = $request->input('goods');
        $booking->update();

        return redirect('/bookings')->with('status', 'Booking Updated Successfully');
    }

    public function deleteBooking($tracking_id){
        $booking = Booking::where('tracking_id', $tracking_id)->first();
        $booking->delete();
        return redirect('/bookings')->with('warning', 'Booking Deleted Successfully');
    }


}
