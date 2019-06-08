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
<h3 style="left:10px;  position: absolute;">{{$car->name}}</h3>

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
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


        <div class="col-4">
                <div class="card text-white bg-primary mb-3 " style="max-height: 5rem;">
                        <div class="card-body">
                              <h2 style="card-text"> Price: {{$car->price}} EUR</h2>
                        </div>
                    </div>
                    <div class="card bg-light mb-3">
            <div class=" card-body   mb-3">
                <h5>Make Reservation</h5>
                <div class="form-group">
                        <h2>Pick-up date</h2>
                        <input class="date form-control" name="pickUpDate" type="text">
                    </div>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                        format: 'dd-mm-yyyy'
                        });  
                    </script> 
                    <div class="form-group">
                      <h2>Drop-off date</h2>
                    <input class="date form-control" name="dropOffDate" type="text" placeholder="{{$value = session('dropOff')}}">
                    </div>
                    <script type="text/javascript">
                        $('.date').datepicker({  
                        format: 'dd-mm-yyyy'
                        });  
                    </script>
                    <a href="{{$car->car_id}}/reservations" class="btn btn-primary col-4">
                       Submit
                    </a>
                    </form>
            </div>
        </div>
           
        </div>
    </div>
</div>


@endsection