<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        
        if(Auth::user()->role == 1){
            
            $city_details = City::where('city_status', '1')->get();
            return view('owner.city-management.city')->with(['city_details' => $city_details]);

        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function city_add(Request $request)
    {
        if(Auth::user()->role == 1){

            $city_name = request('city_name');
            if($city_name != null){
                try{
                    City::create([
                        'city_name' => $city_name,
                    ]);
                }catch(Throwable $e){
                    return back()->with(['error' => 'City added fail', 'error_type' => 'error']);
                }
                return back()->with(['success' => 'City added successful']);
                
            }else{
                return back()->with(['error' => 'City added fail', 'error_type' => 'error']);
            }
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function delete_city(Request $request)
    {
        if(Auth::user()->role == 1){

            $city_id = request('city_id');
            if($city_id != null){
                try{
                    City::find($city_id)->update([
                        'city_status' => '0',
                    ]);

                }catch(Throwable $e){
                    dd($e);
                    return back()->with(['error' => 'Request faild', 'error_type' => 'error']);
                }
                return back()->with(['success' => 'City deleted']);
                
            }else{
                return back()->with(['error' => 'Request faild', 'error_type' => 'error']);
            }
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function edit_city(Request $request)
    {
        if(Auth::user()->role == 1){

            $city_id = request('city_id');
            $city_name = request('city_name');
            if($city_id != null){
                try{
                    City::find($city_id)->update([
                        'city_name' => $city_name,
                    ]);

                }catch(Throwable $e){
                    dd($e);
                    return back()->with(['error' => 'Request faild', 'error_type' => 'error']);
                }
                return back()->with(['success' => 'City updated']);
                
            }else{
                return back()->with(['error' => 'Request faild', 'error_type' => 'error']);
            }
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }
}
