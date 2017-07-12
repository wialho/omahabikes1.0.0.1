<?php

namespace App\Http\Controllers;

use App\SpeedCheckService;
use App\Trips;
use Illuminate\Http\Request;
use App\Trucker;


class TruckerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trucker = Trucker::all();
        return view('truckers.index', compact('truckers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $trucker = new Trucker;
        $trucker->name = $request->name;
        $trucker->save();

        return redirect('/truckers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trucker = Trucker::findorFail($id);

        return view('truckers.show', compact('trucker'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $trucker = Trucker::findOrFail($id);
        $trucker -> update($request -> all());
        return redirect('/truckers');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trucker = Trucker::findOrFail($id);
        $trucker = delete();
        return redirect('/truckers');

    }

    public function storetrip(Request $request)
    {
        $scs = new SpeedCheckService();
        $comment = $scs -> getSpeedComment($request->miles, $request->minutes);
        Trucker::findOrFail($request->id)->trips()->save(new Trips(['name'=>$request->name, 'minutes'=>$request->minutes, 'miles'=>$request->miles, 'comment'=>$comment]));
        return redirect('/truckers');
    }

    public function tripedit($id){

        $trip = Trips::findOrFail($id);
        return view('truckers/tripedit', compact('trip'));
    }

    public function tripupdate(Request $request, $id){

        $scs = new SpeedCheckService();
        $comment = $scs->getSpeedComment($request->miles, $request->minutes);
        Trucker::findOrFail($request->trucker_id)->trips()->update((['name'=>$request->name, 'minutes'=>$request->minutes, 'miles'=>$request->miles, 'comment'=>$comment]));
        return redirect('/truckers');
    }

    public function tripdestroy($id){

        $trip = Trips::findOrFail($id);
        $trip -> delete();
        return redirect('/truckers');
    }
}
