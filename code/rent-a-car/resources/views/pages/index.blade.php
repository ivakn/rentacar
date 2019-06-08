@extends('layouts.app')
<style>
    .back{ 
    background-color: blue;
    position: relative;
       background: url(ljubljana.jpg) no-repeat center center ; 
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      width:100%;
      height:100%;
    }
    </style>
@section('content')
<div class="back">
    { <div class="jumbotron" style="position: absolute;top: 10%; left: 12%; background-color:orange !important;" >
               <h2>Let's find your car!</h2>
               @if (count($errors)>0)
                    @foreach ($errors->all() as $error)
                        <div class="alert alert-danger">
                            {{$error}}
                        </div>
                    @endforeach
                @endif
                {!! Form::open(['action'=>'PagesController@store','method'=>'POST']) !!}
                <div class="form-group">
                    <p>Pick-up-date</p>
                    {{ Form::date('pickUpDate',date( 'Y-m-d' ),['class'=>'form-control'])}}
                    
                </div>
                <div class="form-group">
                    <p>Drop-off-date</p>
                    {{ Form::date('dropOffDate',new DateTime('tomorrow'),['class'=>'form-control'])}}
                </div>
                {{ Form::submit('Search',['class'=>'btn btn-primary'])}}
                {!! Form::close() !!}
    </div> 
</div>
@endsection
