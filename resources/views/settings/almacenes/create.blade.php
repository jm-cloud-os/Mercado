@extends('layouts.app')

@section('content')
{{ Form::open(['route' => 'almacenes.store']) }}
<div class="row">
    <div class="col-md-12">
        <div id="floating-buttons" class="btn-group pull-right">
            <a href="{{ route('almacenes.index') }}" class="btn btn-dark">
                <i class="fas fa-close"></i>
                Cancelar
            </a>
            <button type="submit" class="btn btn-success pull-right">
                <i class="fas fa-check"></i>
                Aceptar
            </button>
        </div>
    </div>
</div>


@includeIf('settings.almacenes.fragments.form')
{{ Form::close() }}

@endsection
