<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Port;
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

    public function editTracking($id){
        $countries = Country::all();
        $ports = Port::all();
        $tracking = Tracking::where('id', $id)->first();
        return view('admin.trackings.edit', compact('tracking', 'countries', 'ports'));
    }

    public function updateTracking($id, Request $request){

        $tracking = Tracking::where('id', $id)->first();
        $tracking->current_country = $request->input('current_country');
        $tracking->current_port = $request->input('current_port');
        $tracking->update();
        return redirect('/trackings/'.$tracking->tracking_id)->with('status', 'Tracking Updated Successfully');
    
    }

    public function deleteTracking($id){
        $tracking = Tracking::where('id', $id)->first();
        $tracking->delete();
        return redirect()->back()->with('warning', 'Tracking Deleted Successfully');
    }

    public function tackingComplete($id){
        $tracking = Tracking::where('id', $id)->first();
        $tracking->status = '1';
        $tracking->update();
        return redirect()->back()->with('status', 'Tracking Status Updated Successfully');
    }

}
