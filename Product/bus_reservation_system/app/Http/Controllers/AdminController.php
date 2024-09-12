<?php

namespace App\Http\Controllers;

use App\Mail\ReservednMail;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Client;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Throwable;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function reservation_pending()// showing the details of reservation that goes to admin
    {
        if(Auth::user()->role == 1){
            $res_details = Reservation::where('status', '3')->get();
            return view('owner.reservation-management.reservation')->with(['res_details' => $res_details]);
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function res_approved()
    {
        if(Auth::user()->role == 1){
            $res_details = Reservation::where('status', '2')->get();
            return view('owner.reservation-management.approved')->with(['res_details' => $res_details]);
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function res_rejected()// all show reject reservation on the table
    {
        if(Auth::user()->role == 1){
            $res_details = Reservation::where('status', '4')->get();
            return view('owner.reservation-management.rejected')->with(['res_details' => $res_details]);
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function reject_res(Request $request)// when click on reject button
    {
        if(Auth::user()->role == 1){
            $res_id = request('res_id');
            if(isset($res_id)){

                try{
                    Reservation::find($res_id)->update([
                        'status' => '4',
                    ]);
                }catch(Throwable $e){
                    return back()->with(['error' => 'Request faild', 'error_type' => 'warning']);
                }

                return back()->with(['success' => 'Reservation rejected successful']);

            }else{
                return back()->with(['error' => 'Request faild', 'error_type' => 'warning']);
            }

        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function approve_res(Request $request) // click then apporove function is called
    {
        if(Auth::user()->role == 1){
            $res_id = request('res_id');
            $res = Reservation::find($res_id);
            if(isset($res_id)){

                try{
                    $res->update([
                        'status' => '2',
                    ]);
                }catch(Throwable $e){
                    return back()->with(['error' => 'Approval faild', 'error_type' => 'warning']);
                }

                $bus_name = Bus::find($res->bus_id)->bus_name;
                $route_time = BusRoute::find($res->route_id)->start_time;
                $client_user_id = Client::find($res->clnt_id)->user_id;
                $client_email = User::find($client_user_id)->email;
                $data = [
                    'bus_name' => $bus_name,
                    'total_price' => $res->price_total,
                    'date_time' => $res->reservation_date.' '.$route_time,
                    'no_of_seats' => $res->seats_count,
                    'seats_no' => $res->seats,
                ];
                Mail::to($client_email)->send(new ReservednMail($data));// mail funtion

                return back()->with(['success' => 'Reservation approval successful']);

            }else{
                return back()->with(['error' => 'Request faild', 'error_type' => 'warning']);
            }

        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function reverse_res(Request $request)// it gives the option to reverse
    {
        if(Auth::user()->role == 1){
            $res_id = request('res_id');
            if(isset($res_id)){

                try{
                    Reservation::find($res_id)->update([
                        'status' => '3',
                    ]);
                }catch(Throwable $e){
                    return back()->with(['error' => 'Request faild', 'error_type' => 'warning']);
                }

                return back()->with(['success' => 'Reservation reverse successful']);

            }else{
                return back()->with(['error' => 'Request faild', 'error_type' => 'warning']);
            }

        }else{
            Auth::logout();
            return redirect('/home');
        }
    }
}
