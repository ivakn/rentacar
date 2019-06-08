@extends('layouts.app')
<style>
    #read-more {
        position: absolute;
        top: 20;
        right: 20;
    }
    #reserve {
        position: absolute;
        left: 35%;
        right: 10px;
        bottom: 0;
    }
</style>
@section('content')
<div class="container-fluid" style="padding-top:10px">
        <div class="row">
                <div class="col-b-3 col-m-12" style="padding:5px">
                            <div class=" card-body jumbotron  mb-3" style="background-color:orange">
                                    <h2>Let's find your car!</h2>

                                    <div class="col-2"></div>
                                    {!! Form::open(['action'=>'PagesController@store','method'=>'POST']) !!}
                                    <div class="form-group">
                                    <h5>Pick-up-date</h5>
                                    {{ Form::date('pickUpDate',Session::get('pickUpDate'),['class'=>'form-control'])}}
                                </div>
                                <div class="form-group">
                                    <h5>Drop-off-date</h5>
                                    {{ Form::date('dropOffDate',Session::get('dropOffDate'),['class'=>'form-control'])}}
                        
                                </div>
                                {{ Form::submit('Search',['class'=>'btn btn-primary'])}}
                                {!! Form::close() !!}
                            
                    </div>
                </div>
                
                <div class="col-b-9 col-m-12">
                @foreach ($freeCars as $car)
                <div class="row no-gutters border rounded mb-4 shadow-sm h-md-250 position-relative " >
                        <div >
                                <img src="{{$car->image_path}}" alt="" class="image image-m">
                        </div>    
                        <div class="col p-4 d-flex flex-column position-static">
                            <a class="mb-0" href="/cars/{{$car->id}}"><h3>{{$car->name}}</h3></a>
                            <h2><p class="pull-right" id="read-more">{{Session::get('days')*$car->price}} EUR</p></h2> 
                            <a href="/cars/{{$car->id}}"><p id="reserve" class=" btn btn-primary">Reserve</p></a>
                        </div>
                </div>          
        @endforeach
    </div>

</div>
</div>

@endsection