<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Session;
use DateTime;

class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservation=Reservation::orderBy('created_at','asc')->paginate(15);
        //$posts=DB::select('SELECT * FROM posts');
        return view('reservations.index')->with('reservations',$reservation);
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
    { $reservation=new Reservation;
        $reservation->start_date=Session::get("pickUpDate");
        $reservation->ending_date=Session::get("dropOffDate");
        $reservation->user_id=auth()->user()->id;
        $datetime1 = new DateTime(Session::get("pickUpDate"));
        $datetime2 = new DateTime(Session::get("dropOffDate"));
        $interval = $datetime1->diff($datetime2);
        $reservation->numberOfDays = $interval->format('%a');
        $reservation->price=Session::get("total");
        $reservation->car_id=Session::get("car")->id;
        $reservation->save();
        return redirect('reservations');
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservation=Reservation::find($id);
        if(auth()->user()->id!==$reservation->user->id){
            return redirect('/posts')->with('error','Unauthorised page');
        }
        $reservation->delete();
        return redirect('/reservations')->with('success','Reservation Cancelled!');
    }
}
