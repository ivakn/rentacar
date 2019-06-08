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
        <div class="col-b-8 col-m-12">
            <div class="" >
                <div class="text-center">
                        <img src="http://rent-a-car.test/{{$car->image_path}}" alt="" width="500px" height="300px">
                </div>    
            </div>
            <div class="card bg-light mb-3 ">
                <div class="text-white bg-primary mb-3 card-header"><h2>Details</h2></div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                          <tr>
                            <th scope="row">Name</th>
                            <td>{{$car->name}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Model</th>
                            <td>{{$car->model}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Fuel</th>
                            <td>{{$car->fuel}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Air condition</th>
                            <td>{{$car->airCondition ? 'Yes' : 'No'}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Transmission</th>
                            <td>{{$car->transmission}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Num of doors</th>
                            <td>{{$car->doors}}</td>
                          </tr>
                          <tr>
                            <th scope="row">Num of passengers</th>
                            <td>{{$car->numberOfPassengers}}</td>
                          </tr>
                        </tbody>
                    </table>
            </div>
        </div>
    </div>


        <div class="col-b-4 col-m-12" style="padding:5px" >
                <div class="card text-white bg-primary mb-3 " style="max-height: 5rem;">
                        <div class="card-body">
                              <h2 style="card-text"> Price: {{Session::get('days')*$car->price}} EUR</h2>
                        </div>
                    </div>
                    <div class="card bg-light mb-3">
            <div class=" card-body   mb-3">
                <h3>Make Reservation</h3>
                <div class="col-2"></div>
            {!! Form::open(['action'=>['PagesController@confirm',$car->id],'method'=>'POST']) !!}
            <div class="form-group">
                <h5>Pick-up-date</h5>
                {{ Form::label('pickUpDate',Session::get('pickUpDate'),['class'=>'form-control'])}}
            </div>
            <div class="form-group">
                <h5>Drop-off-date</h5>
                {{ Form::label('dropOffDate',Session::get('dropOffDate'),['class'=>'form-control'])}}
    
            </div>
            <table class="table table-borderless table-hover ">
                <tbody>
                  <tr>
                    <td scope="row">{{Form::checkbox('gpsCB', '40',false)}}
                        {{Form::label('gps', 'GPS 40.00 EUR',['class'=>'form-check-label'])}}</td>
                  </tr>
                  <tr>
                      <td scope="row"> {{Form::checkbox('secondDriverCB', '15',false)}}
                          {{Form::label('secondDriver', 'Second driver 15.00 EUR',['class'=>'form-check-label'])}}</td>
                    </tr>
                    <tr>
                        <td scope="row">{{Form::checkbox('childSeatCB', '32',false)}}
                            {{Form::label('childSeatCB', 'Child seat 32.00 EUR',['class'=>'form-check-label'])}}</td>
                      </tr>
                </tbody>
            </table>
            @guest
            <p>You have to login to make reservation!</p>
            <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            {!! Form::close() !!}
            @else
                {{ Form::submit('Submit',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
            @endguest
            <div class="col-2"></div>
            </div>
        </div>
           
        </div>
    </div>
</div>


@endsection