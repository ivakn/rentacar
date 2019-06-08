@extends('layouts.app')

@section('content')
@if (session('success'))
<div class="alert alert-success">
        {{session('success')}}
    </div>
@endif
<div style="padding:10px">
        <div class="container-fluid"  style="padding:10px"> 
            @foreach ($reservations as $reservation)
            @if(Auth::user()->id == $reservation->user->id)
            <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative ">
                    <div >
                            <img src="{{$reservation->car->image_path}}" alt="" width="290px" height="183px">
                    </div>    
                    <div class="col p-4 d-flex flex-column ">
                        <h3>{{$reservation->car->name}}</h3>
                    <p>Pick up date: {{$reservation->start_date}}</p>
                    <p>Drop off date: {{$reservation->ending_date}}</p>
                    <p>Total: {{$reservation->price}}</p>
                    {!! Form::open(['action'=>['ReservationsController@destroy',$reservation->id],'method'=>'POST','class'=>'pull-right']) !!}
                        {{Form::hidden('_method','DELETE')}}
                        {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
                    {!! Form::close() !!}
                    </div>
            </div>  
            @endif    
    @endforeach
            </div>
</div>
@endsection