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
        <h4 class="fw-300 c-grey-900 mB-40">Reg&iacute;strate</h4>
        {{ Form::open(['route' => 'register']) }}
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::label('nombre_empresa', 'Empresa', ['class' => 'text-normal text-dark']) }}
                {{ Form::text('nombre_empresa', null, ['class'=>'form-control', 'placeholder'=>'Nombre de la Empresa', 'required'=>true, 'autocomplete' => 'off']) }}
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre_empresa') }}</strong>
                </span>
                @endif
            </div>
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::label('name', 'Nombre', ['class' => 'text-normal text-dark']) }}
                {{ Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre', 'required'=>true, 'autocomplete' => 'off']) }}
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
                @endif
            </div>
        
            <div class="form-group has-feedback{{ $errors->has('name') ? ' has-error' : '' }}">
                {{ Form::label('telefono', 'Teléfono', ['class' => 'text-normal text-dark']) }}
                {{ Form::text('telefono', null, ['class'=>'form-control', 'placeholder'=>'Teléfono', 'required'=>true, 'autocomplete' => 'off']) }}
                @if ($errors->has('name'))
                <span class="help-block">
                    <strong>{{ $errors->first('nombre_empresa') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group has-feedback{{ $errors->has('email') ? ' has-error' : '' }}">
                {{ Form::label('email', 'Email', ['class' => 'text-normal text-dark']) }}
                {{ Form::email('email', null, ['class'=>'form-control', 'placeholder'=>'Email', 'required'=>true, 'autocomplete' => 'off']) }}
                @if ($errors->has('email'))
                <span class="help-block">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group has-feedback{{ $errors->has('password') ? ' has-error' : '' }}">
                {{ Form::label('password', 'Password', ['class' => 'text-normal text-dark']) }}
                {{ Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password', 'required'=>true, 'autocomplete' => 'off']) }}
                @if ($errors->has('password'))
                <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group has-feedback{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {{ Form::label('password_confirmation', 'Confirmar Password', ['class' => 'text-normal text-dark']) }}
                {{ Form::password('password_confirmation', ['class'=>'form-control', 'placeholder'=>'Confirmar Password', 'required'=>true, 'autocomplete' => 'off']) }}
                @if ($errors->has('password_confirmation'))
                <span class="help-block">
                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                </span>
                @endif
            </div>
            
            <div class="form-group">
                <button class="btn btn-primary">Register</button>
            </div>
        {{ Form::close() }}
    </div>
</div>

@endsection
