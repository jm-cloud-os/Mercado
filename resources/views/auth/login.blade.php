@extends('layouts.auth')

@section('content')

<div class="peers ai-s fxw-nw h-100vh">
    <div class="peer peer-greed h-100 pos-r bgr-n bgpX-c bgpY-c bgsz-cv" style="background-image:url({{ asset('public/images/bg.jpg') }})">
        <div class="pos-a centerXY"><div class="bgc-white bdrs-50p pos-r" style="width:120px;height:120px">
                <img class="pos-a centerXY" src="{{ asset('public/images/logo.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-4 peer pX-40 pY-80 h-100 bgc-white scrollable pos-r" style="min-width:320px">
        <h4 class="fw-300 c-grey-900 mB-40">Login</h4>
        {{ Form::open(['route' => 'login']) }}

        <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
            {{ Form::label('email', 'Email', ['class' => 'text-normal text-dark']) }}
            {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required'=>true, 'autocomplete' => 'off']) }}
            @if ($errors->has('email'))
            <span class="help-block">
                <strong>{{ $errors->first('email') }}</strong>
            </span>
            @endif
        </div>
        <div class="form-group has-feedback">
            {{ Form::label('password', 'Password', ['class' => 'text-normal text-dark']) }}
            {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>true]) }}
            @if ($errors->has('password'))
            <span class="help-block">
                <strong>{{ $errors->first('password') }}</strong>
            </span>
            @endif
        </div>
        <div class="row">
            <div class="col-sm-8">
                <!--
                <div class="form-group">
                    <div class="peer">
                        <div class="checkbox checkbox-circle checkbox-info peers ai-c">
                            <input type="checkbox" id="inputCall1" name="inputCheckboxesCall" class="peer">
                            <label for="inputCall1" class="peers peer-greed js-sb ai-c">
                                <span class="peer peer-greed">Remember Me</span>
                            </label>
                        </div>
                    </div>
                </div>
                -->
            </div>
            <!-- /.col -->
            <div class="col-sm-4">
                <button class="btn btn-primary pull-right">Login</button>
            </div>
            <!-- /.col -->
        </div>
        {{ Form::close() }}

        <p>&nbsp;</p>
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('password.request') }}">@lang('auth.login.forgot')</a><br>
                <a href="{{ route('register') }}" class="text-center">@lang('auth.login.register')</a>
            </div>
        </div>

    </div>
</div>

@endsection
