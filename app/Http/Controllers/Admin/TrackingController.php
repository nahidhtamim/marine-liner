<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Tracking;
use Illuminate\Http\Request;

class TrackingController extends Controller
{
    public function index($tracking_id){
        $countries = Country::all();
        $trackings = Tracking::get()->where('tracking_id', $tracking_id);
        return view('admin.trackings.index', compact('trackings', 'countries', 'tracking_id'));
    }

    public function saveTracking(Request $request){

        $tracking = new Tracking();
        $tracking->tracking_id = $request->input('tracking_id');
        $tracking->current_country = $request->input('current_country');
        $tracking->current_port = $request->input('current_port');
        $tracking->status = $request->input('status');
        $tracking->save();
        return redirect()->back()->with('status', 'Tracking Added Successfully');
    
    }

    public function editTracking($tracking_id){
        $countries = Country::all();
        $tracking = Tracking::where('tracking_id', $tracking_id)->first();
        return view('admin.trackings.edit', compact('tracking', 'countries'));
    }

    public function updateTracking($tracking_id, Request $request){

        $tracking = Tracking::where('tracking_id', $tracking_id)->first();
        $tracking->current_country = $request->input('current_country');
        $tracking->current_port = $request->input('current_port');
        $tracking->status = $request->input('status');
        $tracking->update();
        return redirect('/trackings/'.$tracking_id)->with('status', 'tracking Updated Successfully');
    
    }

    public function deleteTracking($tracking_id){
        $tracking = Tracking::where('tracking_id', $tracking_id)->first();
        $tracking->delete();
        return redirect('/trackings/'.$tracking_id)->with('warning', 'tracking Deleted Successfully');
    }

    public function markComplate($tracking_id, Request $request){
        $tracking = Tracking::where('tracking_id', $tracking_id)->first();
        $tracking->status = '1';
        $tracking->update();
        return redirect('/trackings/'.$tracking_id)->with('status', 'tracking Updated Successfully');
    }
}
