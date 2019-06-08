<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use Artisan;
use DB;
use DateTime;


class PagesController extends Controller
{
    public function index(){
        $title="Welcome to rent a car agency!";
        return view('pages.index')->with('title',$title);
    }
   
    public function store(Request $request){
        
        $day_before = date( 'Y-m-d', strtotime( $request->input('pickUpDate') . ' -1 day' ) );
        $this->validate($request,[
            'pickUpDate'=> 'required|date|date_format:Y-m-d|after:yesterday',
            'dropOffDate'=> 'required|date|date_format:Y-m-d|after:pickUpDate',
        ]);
        Session::put('pickUpDate',$request->input('pickUpDate'));
        Session::put('dropOffDate',$request->input('dropOffDate'));
        $datetime1 = new DateTime(Session::get("pickUpDate"));
        $datetime2 = new DateTime(Session::get("dropOffDate"));
        $interval = $datetime1->diff($datetime2);
        $days = $interval->format("%d");
        Session::put('days',$days);
        return redirect('/search');
    }
    public function confirm(Request $request, $id){
        Session::put('gps',$request->input('gpsCB'));
        Session::put('secondDriver',$request->input('secondDriverCB'));
        Session::put('childSeat',$request->input('childSeatCB'));
        return redirect('cars/'.$id.'/reservations');
    }
    public function search(){
        DB::enableQueryLog();

        $freeCars=DB::table('cars')
        ->whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('reservations')
                  ->whereRaw('reservations.car_id = cars.id')
                  ->where([['start_date', '<=', Session::get('pickUpDate')],
                  ['ending_date', '>=', Session::get('pickUpDate')]]); 
        })
        ->whereNotExists(function ($query) {
            $query->select(DB::raw(1))
                  ->from('reservations')
                  ->whereRaw('reservations.car_id = cars.id')
                  ->where([['start_date', '<=', Session::get('dropOffDate')],
                  ['ending_date', '>=', Session::get('dropOffDate')]]); 
        })->get();
        $queries = DB::getQueryLog();

        return view('pages.search')->with('freeCars',$freeCars);

    }
    public function about(){
        return view('pages.about');
    }

}
