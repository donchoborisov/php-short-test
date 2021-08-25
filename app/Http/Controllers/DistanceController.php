<?php

namespace App\Http\Controllers;

use App\Models\Postcode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistanceController extends Controller
{

    public function distance(Request $request) {
         
        $validated = $request->validate([
            'postcode_1' => 'required',
            'postcode_2' => 'required',
         
        ]); 

      
       

        $postcode1 = $request->postcode_1;
        $postcode2 = $request->postcode_2;

        $data1 = Postcode::where('postcode',$postcode1)->first();
        $data2 = PostCode::where('postcode',$postcode2)->first();

         
         if(!is_null($data1 && $data2)){
             $lat1 = $data1->latitude;
             $lon1 = $data1->longitude;
             $lat2 = $data2->latitude;
             $lon2 = $data2->longitude; 

             $unit = $request->unit;
         }

  
       

        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
          return redirect()->back()->with("status", "Post code is the same!");
        }
        else {
          $theta = $lon1 - $lon2;
          $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
          $dist = acos($dist);
          $dist = rad2deg($dist);
          $miles = $dist * 60 * 1.1515;
          $unit = strtoupper($unit);

         $km =  $miles * 1.609344;
         $nm =  $miles * 0.8684;
         $m  = $miles;
        }
      
       


       return view('welcome',compact('km','nm','m'));

  }

    
}
