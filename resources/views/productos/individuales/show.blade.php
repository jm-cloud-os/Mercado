@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                {{ array_get($producto, 'nombre_'.session('locale'), array_get($producto, 'nombre_es')) }}
            </h3>
            @if( $errors->any() )
            <small class="text-danger">@lang('productos.individuales.create.mensajes.error')</small>
            @endif
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                <a href="{{ route('productos.index') }}" class="btn btn-dark">
                    <i class="fas fa-close"></i>
                    Cancelar
                </a>
                <button type="button" name="borrar" class="btn btn-danger">
                    <i class="fas fa-trash"></i>
                    Eliminar
                </button>
                <a href="{{ route('productos.edit', array_get($producto, 'id')) }}" class="btn btn-success pull-right">
                    <i class="fas fa-edit"></i>
                    Editar
                </a>
            </div>
        </div>
    </div>
    

    {{ Form::open(['route' => ['productos.destroy', array_get($producto, 'id')], 'method' => 'DELETE', 'name' => 'borrar']) }}
    {{ Form::close() }}
    
</div>

@push('scripts')
<script type="text/javascript">
    (function(){
        $('button[name="borrar"]').on('click', function(e){
            if( confirm('¿Desea borrar este producto?') ){
                $('form[name="borrar"]').submit();
            }
        });
    })();
</script>
@endpush

@endsection
