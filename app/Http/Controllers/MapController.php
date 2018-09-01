<?php

namespace App\Http\Controllers;

use App\ParkingLot;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parkinglots = ParkingLot::all();
        $maps = array();

        foreach ($parkinglots as $parkinglot) {
            $maps[] = $parkinglot->toArray();
        }
        // dd($maps);
        return view('parkinglot.map', ['maps'=>$maps, 'state'=>1]);
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $parkinglot = ParkingLot::find($request->id);

        $maps = $parkinglot->toArray();
        // dd($maps);
        return view('parkinglot.map', ['maps'=>$maps,'state'=>2]);
    }

}
