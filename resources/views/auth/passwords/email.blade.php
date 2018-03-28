@extends('layouts.auth')

@section('content')
<div class="pos-a t-0 l-0 bgc-white w-100 h-100 d-f fxd-r fxw-w ai-c jc-c pos-r p-30">

    <div class="d-f jc-c fxd-c container">
        <h3 class="mB-10 fsz-lg c-grey-900 tt-c">Recuperar contrase&ntilde;a</h3>
        <div class="row">
            <div class="col-sm-12"></div>
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
        <form method="POST" action="{{ route('password.email') }}">
            @csrf
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">
                        <label for="email" class="col-md-3 col-form-label">{{ __('Ingrese su correo electrónico') }}</label>

                        <div class="col-md-9">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="E-mail" name="email" value="{{ old('email') }}" required>
                            @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                </div>


                <div class="col-sm-12">
                    <div class="form-group row mb-0">
                        <div class="col-md-9 offset-md-3">
                            <button type="submit" class="btn btn-primary pull-right">
                                {{ __('Send Password Reset Link') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection
