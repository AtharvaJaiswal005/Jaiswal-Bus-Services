<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class Salesanalyticscontroller extends Controller
{
    public function chart(){
       $data = DB::select(DB::raw("SELECT (`reservation_date`) 
       AS Date,(`price_total`) AS Sales
        FROM `reservations` WHERE status=2"));
       $result ='';
       foreach ($data as $value) {
           $result.="['".$value->Date."',".$value->Sales."],";
       }
    //    return $result;
    return view('owner.dashboard.home',compact('result'));
    }
}
