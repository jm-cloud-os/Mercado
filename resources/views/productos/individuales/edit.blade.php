@extends('layouts.app')

@section('content')
{{ Form::model($producto, ['route' => ['productos.update', array_get($producto, 'id')], 'method' => 'PUT']) }}
<section class="content-header">
    <div id="floating-buttons" class="btn-group pull-right" role="group">
        <a href="{{ route('productos.index') }}" class="btn btn-default">
            <i class="fa fa-close"></i>
            @lang('productos.individuales.create.botones.cancelar')
        </a>
        <button type="submit" class="btn btn-success pull-right">
            <i class="fa fa-check"></i>
            @lang('productos.individuales.create.botones.aceptar')
        </button>
    </div>
</section>

@includeIf('productos.fragments.form')
{{ Form::close() }}

@endsection