@extends('layouts.app')

@section('content')

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Paquetes
            </h3>
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                <a href="{{ route('paquetes.create') }}" class="btn btn-info">
                    <i class="fa fa-archive"></i>
                    Nuevo
                </a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-hover">
                <tbody>
                    @foreach($productos as $producto)
                    <tr class="row-hover" data-href="{{ route('paquetes.show', ['id' => array_get($producto, 'id')]) }}">
                        <td>{{ array_get($producto, 'nombre_'.session('locale'), array_get($producto, 'nombre_es')) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
<!-- /.content -->

@endsection
