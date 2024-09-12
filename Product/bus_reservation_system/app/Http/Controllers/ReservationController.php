<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\City;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\RouteCityPrice;
use App\Models\TempData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Throwable;

class ReservationController extends Controller
{
    
    
    public function index()
    {
        $city_details = City::where('city_status', '1')->get();
        return view('landing.home')->with(['city_details' => $city_details]);
    }

    public function search_route(Request $request)
    {
        $request->validate([
            'city_1' => 'required',
            'city_2' => 'required',
            'res_date' => 'required'
        ]);

        $start_city = request('city_1');
        $end_city = request('city_2');
        $res_date = request('res_date');

        $first_route= RouteCityPrice::where('city_id', $start_city)->get();
   
        $city_start = City::find($start_city);
        $city_end = City::find($end_city);
        $city_details = City::all();

        return view('landing.home')->with(['res_date' => $res_date, 'city_end' => $city_end, 'city_start' => $city_start, 'city_details' => $city_details, 'first_route' => $first_route, 'start_city' => $start_city, 'end_city' => $end_city]);
    }


    public function temp_data(Request $request)// save the temp data, avoid the reoccuring, 
    {
        $ip = $request->ip();          
        $res_date = request('res_date');
        $bus_id = request('bus_id');
        $from_id = request('from_id');
        $to_id = request('to_id');
        $route_id = request('route_id');
        $route_price = request('route_price');

        $temp_data = new TempData();
        $temp_data->ip = $ip;
        $temp_data->res_date = $res_date;
        $temp_data->bus_id = $bus_id;
        $temp_data->from_id = $from_id;
        $temp_data->to_id = $to_id;
        $temp_data->route_id  = $route_id;
        $temp_data->route_price  = $route_price;
        $temp_data->save();

        return redirect('/register')->with(['reason' => 'new_res']);
    }

    public function my_reservation(Request $request)// showing the details in the table for the users
    {
        if(Auth::check() && Auth::user()->role == 2){

            $my_clinet_id = Client::where('user_id', Auth::user()->id)->first()->clnt_id;
            $res_date = Reservation::where([['clnt_id', $my_clinet_id]])->get();
            
            return view('user.my-reservation.my-reservations')->with(['res_date' => $res_date]);

        }else{
            Auth::logout();
            return redirect('/');
        }
    }
}
