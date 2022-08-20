<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class FrontendController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function confirm_password(Request $request){
        $user = User::where('id', Auth::user()->id)->first();
        $user->password = Hash::make($request->input('password'));
        $user->update();
        return redirect()->back()->with('status', 'Password Changed Successfully');
    }


    public function change_password(){
        return view('auth.change');
    }

}
