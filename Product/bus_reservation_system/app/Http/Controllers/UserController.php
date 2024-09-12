<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\City;
use App\Models\TempData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function new_reservation(Request $request)
    {
        if(Auth::user()->role == 2){
            $USERAVATAR= Auth::user()->avatar;
            $bus_details = Bus::where('status', 1)->get();
            $city_details = City::all();
            $data = TempData::where('ip', $request->ip())->orderByDesc('id')->first();
            if($data != null){
                return view('user.new-reservation.reservation')->with(['bus_details' => $bus_details, 'city_details' => $city_details, 'data' => $data]);
            }else{
                return redirect('/');
            }
        }else{
            Auth::logout();
            return redirect('/');
        }
    }

       


}