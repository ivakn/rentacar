@extends('layouts.app')

@section('content')
<div  style="display:inline-block;   position: relative;">
        <img src="ljubljana.jpg" class="jive-image" style=" display: inline-block;
                position: inline; top: 0;left: 0;backround-size:auto; zoom:1.054"> 
        <div class="container">
        <div class="row" >
            <div class="col-2"></div>
            <div class="col-8" style="position: absolute;top: 5%; left: 17%">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div>
@endsection
