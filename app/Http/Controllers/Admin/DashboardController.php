<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Container;
use App\Models\Country;
use App\Models\Port;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index(){
        $ports = Port::all();
        $countries = Country::all();
        $containers = Container::all();
        $bookings = Booking::all();
        $users = User::all();
        return view('admin.dashboard', compact('ports', 'countries', 'containers', 'bookings', 'users'));
    }

    public function update_password(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return redirect()->back()->with('status', 'Password Changed Successfully');
    }
}
