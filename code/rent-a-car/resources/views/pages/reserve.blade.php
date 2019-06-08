@extends('layouts.app')
@section('content')

<div class=" no-gutters border rounded overflow-hidden mb-4 shadow-sm h-md-250 position-relative ">
        <div class="row">
    <div class="col-b-4 col-m-12">
        <img src="http://rent-a-car.test/{{$car->image_path}}" alt="" class="image-big">
    </div>    
        <div class="col-b-8 col-m-12 p-4 d-flex flex-column position-static ">
            <h1>{{$car->name}}</h1>
            <h5>Pick-up-date:{{Session::get('pickUpDate')}}</h5>
            <h5>Drop-off-date:{{Session::get('dropOffDate')}}</h5>
            <h5>Client:{{$user->name}}</h5>
            {{Session::put('car',$car)}}
            {!! Form::open(['action'=>['ReservationsController@store'],'method'=>'POST']) !!}
            <table class="table" >
                <tbody>
                    <tr>
                        <td scope="row pull-right">
                            <h4 class="text-right"> Car: {{$car->price*Session::get('days')}}€</h4>
                        </td>
                    </tr>
                    @if (Session::get('gps')=='40')
                    <tr>
                        <td scope="row">
                            <h5 class="text-right">GPS: 40€</h5>
                        </td>
                    </tr>
                    @endif
                    @if (Session::get('secondDriver')=='15')
                    <tr>
                        <td scope="row">
                            <h5 class="text-right">Second driver: 15€</h5>
                        </td>
                    </tr>
                    @endif
                    @if (Session::get('childSeat')=='32')
                    <tr>
                        <td scope="row">
                            <h5 class="text-right">Child seat: 32€</h5>
                        </td>
                    </tr>
                    @endif
                    <tr>
                        <td scope="row">
                            {{Session::put('total',$car->price*Session::get('days')+Session::get('gps')+Session::get('childSeat')+Session::get('secondDriver'))}}
                        <h1 class="text-right">Total: {{Session::get('total')}}€ </h1>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div >
                    {{ Form::submit('Reserve',['class'=>'btn btn-primary', 'style'=>'right:50px;bottom:10px;position:absolute;'])}}
                    {!! Form::close() !!} 
                </div>
        </div>             
</div>    
</div>

@endsection