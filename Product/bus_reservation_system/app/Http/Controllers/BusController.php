<?php

namespace App\Http\Controllers;

use App\Models\Bus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class BusController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() // This function relate to bus management page
    {
        if(Auth::user()->role == 1){
            $bus_details = Bus::all();
            return view('owner.bus-management.bus')->with(['bus_details' => $bus_details]);
        }else{
            Auth::logout();
            return redirect('/home');
        }
        
    }
    
    public function bus_reg(Request $request) // code for handle form, getting the data from form , 
    {
        if(Auth::user()->role == 1){
            $request->validate([ // Doing the validation 
                'name' => 'required',
                'reg_no' => 'required|unique:buses,bus_reg_no',
                'contact_no' => 'required',
                'no_of_seats' => 'required|integer',
            ]);

            try{ // Inserting data for bus
                Bus::create([
                    'bus_name' => request('name'),
                    'bus_reg_no' => request('reg_no'),
                    'bus_contact_no' => request('contact_no'),
                    'bus_no_seats' => request('no_of_seats'),
                    'status' => 1,
                ]);
            }catch(Throwable $e){ // ccheck error. try and catch
                return back()->with(['error' => 'Bus registration faild', 'error_type' => 'error']);
            }
            
            return back()->with(['success' => 'Bus registration successful']);
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function update_reg(Request $request) // this the update query, 
    {
        if(Auth::user()->role == 1){

            $bus_id = request('bus_id');
            if($bus_id != null){

                try{
                    Bus::find($bus_id)->update([
                        'bus_name' => request('name'),
                        'bus_reg_no' => request('reg_no'),
                        'bus_contact_no' => request('contact_no'),
                        'bus_no_seats' => request('no_of_seats'),
                    ]);
                }catch(Throwable $e){ // its creationg sesstion
                    // dd($e);
                    return back()->with(['error' => 'Update Fail', 'error_type' => 'error']);
                }
                
                return back()->with(['success' => 'Update successful']);

            }else{
                return back()->with(['error' => 'Update Fail', 'error_type' => 'error']);
            }
        }else{
            Auth::logout();
            return redirect('/home');
        }
    }

    public function deactive_bus(Request $request) // function for deactivate the bus. Use of boolean. 
    {
        if(Auth::user()->role == 1){

            $bus_id = request('bus_id');
            $status = request('status');

            if($bus_id != null && $status != null){
                try{
                    Bus::find($bus_id)->update([
                        'status' => $status
                    ]);
                }catch(Throwable $e){ // checking erros
                    // dd($e);
                    return back()->with(['error' => 'Status change Fail', 'error_type' => 'error']);
                }  

                return back()->with(['success' => 'Status change successful']);


            }else{
                return back()->with(['error' => 'Status change Fail', 'error_type' => 'error']);
            }

        }else{
            Auth::logout();
            return redirect('/home');
        }
    }
}
