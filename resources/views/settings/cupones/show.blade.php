@extends('layouts.app')

@section('content')

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Serie {{ array_get($serie, 'serie') }}
            </h3>
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                {{ Form::open(['route' => ['cupones.destroy', array_get($serie, 'serie'), 'delete=serie'], 'method' => 'DELETE']) }}
                <button type="submit" class="btn btn-danger btn-borrar serie">
                    <i class="fas fa-trash"></i>
                    Borrar serie
                </button>
                {{ Form::close() }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12">
            {{ array_get($serie, 'descripcion') }}
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Cupones
            </h3>
        </div>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>C&oacute;digo</th>
                <th>Descuento</th>
                <th>Usado</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($cupones as $cupon)
            <tr>
                <td>{{ array_get($cupon, 'codigo') }}</td>
                <td>${{ array_get($cupon, 'descuento') }}</td>
                <th>{{ array_get($cupon, 'used_at') }}</th>
                <td class="text-right">
                    {{ Form::open(['route' => ['cupones.destroy', array_get($cupon, 'id'), 'delete=cupon'], 'method' => 'DELETE']) }}
                    <button type="submit" class="btn btn-link text-danger btn-borrar cupon">
                        <span class="fas fa-trash"></span>
                    </button>
                    {{ Form::close() }}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $cupones->links() }}
</div>
<!-- /.content -->
@push('scripts')
<script>
(function(){
    $('button.btn-borrar').on('click', function(e){
        var msg = "Desea borrar este cupon?";
        if($(this).hasClass('serie')){
            msg = "Desea borrar toda la serie de cupones?";
        }

        if(!confirm(msg)){
            return false;
        }
    });
})();
</script>
@endpush
@endsection
