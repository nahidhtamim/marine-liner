<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index($booking_id){
        $countries = Country::all();
        $trackings = Tracking::get()->where('booking_id', $booking_id);
        return view('admin.trackings.index', compact('trackings', 'countries', 'booking_id'));
    }

    public function saveTracking(Request $request){

        $tracking = new Tracking();
        $tracking->booking_id = $request->input('booking_id');
        $tracking->current_country = $request->input('current_country');
        $tracking->current_port = $request->input('current_port');
        $tracking->status = $request->input('status');
        $tracking->save();
        return redirect()->back()->with('status', 'Tracking Added Successfully');
    
    }

    public function editTracking($booking_id){
        $countries = Country::all();
        $tracking = Tracking::where('booking_id', $booking_id)->first();
        return view('admin.trackings.edit', compact('tracking', 'countries'));
    }

    public function updateTracking($booking_id, Request $request){

        $tracking = Tracking::where('slug', $booking_id)->first();
        $tracking->current_country = $request->input('current_country');
        $tracking->current_port = $request->input('current_port');
        $tracking->status = $request->input('status');
        $tracking->update();
        return redirect('/trackings/'.$booking_id)->with('status', 'tracking Updated Successfully');
    
    }

    public function deleteTracking($booking_id){
        $tracking = Tracking::where('booking_id', $booking_id)->first();
        $tracking->delete();
        return redirect('/trackings/'.$booking_id)->with('warning', 'tracking Deleted Successfully');
    }
}
