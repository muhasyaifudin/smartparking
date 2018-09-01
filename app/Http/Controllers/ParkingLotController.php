<?php

namespace App\Http\Controllers;

use App\ParkingLot;
use App\Admin;
use Illuminate\Http\Request;

class ParkingLotController extends Controller
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
  
        return view('parkinglot.parkinglot',['parkinglots'=>$parkinglots]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parkinglot.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $parkinglot = new ParkingLot;

        $parkinglot->nama_tempat = $request->nama_tempat;
        $parkinglot->lokasi = $request->lokasi;
        $parkinglot->lat = $request->lat;
        $parkinglot->lon = $request->long;
        $parkinglot->biaya = $request->biaya;
        $parkinglot->biaya_akumulasi = $request->biaya_akumulasi;
        $parkinglot->kapasitas = $request->kapasitas;
        $parkinglot->kapasitas_tersedia = $request->kapasitas;
        $parkinglot->gerbang = $request->gerbang;
        $parkinglot->status = 1;
        $parkinglot->save();
        
        return redirect('parkinglot');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $parkinglot = ParkingLot::where('id', $id)->get()->first();

        // dd($parkinglot);        
        return view('parkinglot.edit',['parkinglot'=>$parkinglot]); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $parkinglot = ParkingLot::find($id);

        $parkinglot->kapasitas = $request->kapasitas;

        $parkinglot->save();

        return redirect('parkinglot');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function nonaktifkan(Request $request)
    {
        $parkinglot = ParkingLot::find($request->id);

        $parkinglot->status = 0;
        $parkinglot->save();

        return redirect('parkinglot');
    }
    public function aktifkan(Request $request)
    {
        $parkinglot = ParkingLot::find($request->id);

        $parkinglot->status = 1;
        $parkinglot->save();

        return redirect('parkinglot');   
    }
}
