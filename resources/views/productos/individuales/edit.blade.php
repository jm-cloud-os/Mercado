@extends('layouts.app')

@section('content')
{{ Form::model($producto, ['route' => ['productos.update', array_get($producto, 'id')], 'method' => 'PUT', 'id' => 'create-item']) }}
<section class="content-header">
    <div id="floating-buttons" class="btn-group pull-right" role="group">
        <a href="{{ route('productos.index') }}" class="btn btn-dark">
            <i class="fas fa-close"></i>
            @lang('Cancelar')
        </a>
        <button type="submit" class="btn btn-success pull-right">
            <i class="fas fa-check"></i>
            @lang('Aceptar')
        </button>
    </div>
</section>

@includeIf('productos.fragments.form')
{{ Form::close() }}

@endsection