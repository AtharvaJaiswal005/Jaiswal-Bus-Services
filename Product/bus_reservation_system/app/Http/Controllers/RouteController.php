<?php

namespace App\Http\Controllers;

use App\Models\Bus;
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

class RouteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()// the user redirect to the route page
    {
        if(Auth::user()->role == 1){
            $bus_details = Bus::where('status', '1')->get();
            return view('owner.route-management.select-bus')->with(['bus_details' => $bus_details]);
            
        }else{
            Auth::logout();
            return redirect('/');
        }
    }

    public function add_route(Request $request) // adding route, 
    {
        if(Auth::user()->role == 1){
            
            $bus_id = request('bus_id');
            $start_time = request('start_time');
            $end_time = request('end_time');

            try{// this adding query
                $route = BusRoute::create([
                    'bus_id' => $bus_id,
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                ]);
            }catch(Throwable $e){
                // dd($e);
                return back()->with(['error' => 'Route added fail', 'error_type' => 'error']);
            }

            $route_details = BusRoute::all();
            $city_details = City::all();
            return view('owner.route-management.route')->with(['city_details' => $city_details, 'route_details' => $route_details, 'route' => $route]);
            
        }else{
            Auth::logout();
            return redirect('/');
        }
    }

    public function route_price() // 
    {
        $route_details = BusRoute::all();
        $city_details = City::all();// getting all availavle city and routes, in differecnt variable
        return view('owner.route-management.route')->with(['city_details' => $city_details, 'route_details' => $route_details]);
    }

    public function add_price(Request $request) // it handles the form 
    {
        $route_id = request('route_id');
        $city_id = request('city_id');
        $price = request('price');

        $route_data = RouteCityPrice::create([
            'route_id' => $route_id,
            'city_id' => $city_id,
            'price' => $price,
        ]);

        return response()->json($route_data);
    }

    public function get_all_route_data(Request $request) // shoing list
    {
        $route_details = RouteCityPrice::where('route_id',
         request('route_id'))->orderByDesc('route_city_prices_id')->get();
        foreach($route_details as $route){
            $city = City::find($route->city_id)->city_name;
            echo "<tr>
                <td>$route->route_city_prices_id</td>
                <td>$city</td>
                <td>$route->price INR </td>
                <td>
                    <button class='btn btn-warning btn-sm btn-edit' onclick='edit_data(gbgb, $route->price)' type='button'>Edit</button>
                    <button class='btn btn-danger btn-sm btn-delete' onclick='delete_data($route->route_city_prices_id)' type='button'>Delete</button>
                </td>
            </tr>";

            
        }
    }

    public function delete_city_route_price(Request $request) // deleting city from routes
    {
        if(Auth::user()->role == 1){
            try{
                $id = request('route_price_city_id');
                RouteCityPrice::find($id)->delete();

            }catch(Throwable $e){
                return back()->with(['error' => 'Recode delete fail', 'error_type' => 'error']);
            }
            return back()->with(['success' => 'Recode deleted.']);

        }else{
            Auth::logout();
            return redirect('/');
        }
    }

    public function reserve_bus(Request $request) // reserve funtion
    {
        $route_id = request('route_id');
        $from = request('from');
        $to = request('to');
        $route_price = request('route_price');
        $route_id = request('route_id');
        $res_date = request('res_date');

        $no_of_seats =request('no_of_seats');
        $notice =request('notice');
        $seat = explode(",",(request('seats')));

        $total_price = $route_price*$no_of_seats; // calculating the total price

        $route_info = BusRoute::find($route_id);
        $client_data = Client::where('user_id', Auth::user()->id)->first();

        
        DB::transaction(function () use($request, $client_data, $no_of_seats, $notice, $seat, $res_date, $route_id, $route_info, $total_price, $route_price, $from, $to){

            try{
                Reservation::create([
                    'reservation_date' => $res_date,
                    'clnt_id' => $client_data->clnt_id,
                    'bus_id' => $route_info->bus_id,
                    'route_id' => $route_id,
                    'city_first' => $from,
                    'city_second' => $to,
                    'seats_count' => $no_of_seats,
                    'seats' => $seat,
                    'notice' => $notice,
                    'price_per_one_seat' => $route_price,
                    'price_total' => $total_price,
                ]);

                $temp_delete = TempData::where('ip', $request->ip())->delete();

            }catch(Throwable $e){
                dd($e);
                return back()->with(['error' => 'Seat reservation faild', 'error_type' => 'warning']);
            }
            
        });

        return back()->with(['success' => 'Seats reserved. Thank you']);
    }

    public function check_seat(Request $request)
    {
        


        
    }
}
