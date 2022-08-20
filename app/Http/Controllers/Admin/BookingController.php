<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Helper;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Container;
use App\Models\Country;
use App\Models\Port;
use App\Models\Tracking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $booking_id = Helper::trackingNumberGenerate(new Booking, 'booking_id', 6, 'ML'); /** Generate Tracking Number */
        $booking = new Booking();
        $booking->booking_id = $booking_id;
        $booking->tracking_id = $request->input('tracking_id');
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

        return redirect('/bookings')->with('status', 'Booking Added Successfully');
    }

    public function editBooking($booking_id){
        $countries = Country::all();
        $ports = Port::all();
        $containers = Container::all();
        $booking = Booking::where('booking_id', $booking_id)->first();
        return view('admin.bookings.edit', compact('booking', 'countries', 'ports', 'containers'));
    }

    public function updateBooking($booking_id, Request $request){

        $booking = Booking::where('booking_id', $booking_id)->first();
        $booking->tracking_id = $request->input('tracking_id');
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

    public function deleteBooking($booking_id){
        $booking = Booking::where('booking_id', $booking_id)->first();
        $booking->delete();
        return redirect('/bookings')->with('warning', 'Booking Deleted Successfully');
    }

    public function addTrackingId($booking_id, Request $request){
        $booking = Booking::where('booking_id', $booking_id)->first();
        $booking->tracking_id = $request->input('tracking_id');
        $booking->update();
        return redirect('/bookings')->with('status', 'Booking Updated Successfully');
    }

    public function markActive($booking_id, Request $request){
        $booking = Booking::where('booking_id', $booking_id)->first();
        $booking->status = '1';
        $booking->update();
        return redirect('/bookings')->with('status', 'Booking Status Updated Successfully');
    }

    public function markComplete($booking_id, Request $request){
        $booking = Booking::where('booking_id', $booking_id)->first();
        $booking->status = '2';
        $booking->update();
        return redirect('/bookings')->with('status', 'Booking Status Updated Successfully');
    }

}
