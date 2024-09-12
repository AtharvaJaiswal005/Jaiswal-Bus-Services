<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use mysqli;
use Illuminate\Support\Facades\DB;

class AvaController extends Controller
{
    public function avatar(){
        return view('user.avatar.home', array('user'=> Auth::user()->role == 2));
        // return 'hello world';
}
    public function avatar_com (Request $request){
        if ($request->hasFile('avatar')){
            $avatar =$request->file('avatar');
            $avatarexten =$avatar->getClientOriginalExtension();
            $avatarfir_name=$avatar->getClientOriginalName();
            $avatarname= $avatarfir_name; 
            $userid=Auth::user()->id;
            $query = User::find($userid);
            $query->avatar=$avatarname;
            $query->save();
            return redirect('/update_ava');
        }
        return view('user.avatar.home', array('user'=> Auth::user()->role == 2));
            
    }
}
