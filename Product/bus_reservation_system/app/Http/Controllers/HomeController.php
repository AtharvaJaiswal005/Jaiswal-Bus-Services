<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use App\Models\City;
use App\Models\Reservation;
use App\Models\TempData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)// this function returns to dashboard
    {
        if(Auth::user()->role == 1){
            return redirect('/dashboard');

        }elseif(Auth::user()->role == 2){
            
            $data = TempData::where('ip', $request->ip())->orderByDesc('id')->first();
            $bus_details = Bus::where('status', 1)->get();
            $city_details = City::all();
            
            if($data != null){
                $reservation_info = Reservation::where([['route_id', $data->route_id], ['status', '!=','4']])->whereDate('reservation_date', '=',$data->res_date)->get();
                return view('user.new-reservation.reservation')->with(['data' => $data, 'bus_details' => $bus_details, 'city_details' => $city_details, 'reservation_info' => $reservation_info]);
            }else{
                // return view('user.dashboard.home');
                return redirect('/my-reservation');
            }

                    
        }else{
            Auth::logout();
            return redirect('/');
        }
    }
}
