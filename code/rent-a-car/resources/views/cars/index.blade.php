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
<div class="container-fluid"  style="padding-top:10px">
        <div class="row">
                <div class="col-3">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-muted">Categories</span>
                </div>
                
                <div class="col-9">
                @foreach ($cars as $car)
                <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative ">
                        <div class="col-auto d-none d-lg-block">
                                <img src="{{$car->image_path}}" alt="" width="290px" height="183px">
                        </div>    
                        <div class="col p-4 d-flex flex-column position-static">
                            <a class="mb-0" href="/cars/{{$car->id}}"><h3>{{$car->name}}</h3></a>
                            <h2><p class="pull-right" id="read-more">{{Session::get('days')*$car->price}} EUR</p></h2> 
                            <a href="/cars/{{$car->id}}"><p id="reserve" class=" btn btn-primary">Reserve</p></a>
                        </div>
                </div>          
        @endforeach
    </div>

        {{$cars-> links() }}
</div>
</div>

@endsection