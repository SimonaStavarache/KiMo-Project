<?php

namespace App\Http\Controllers;

use App\Kiddo;
use Illuminate\Http\Request;


class SearchKidsController extends Controller
{
    //
    public function searchKids(Request $request)
    {
        $lat=$request->lat;
        $lng=$request->lng;


        //kids=Kiddo::whereBetween('lat',[$lat-0.1,$lat+0.1])->whereBetween('lng',[$lng-0.1,lng+0.1])->get();
        $kids=Kiddo::where('lat','>',$lat-0.1)->where('lat', '<',$lat+0.1)->where('lng','>',$lng-0.1)->where('lng', '<',$lng+0.1)->get();


        return $kids;
    }
}
