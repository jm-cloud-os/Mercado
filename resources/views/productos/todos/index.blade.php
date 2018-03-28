@extends('layouts.app')

@section('content')

<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-md-6">
            <h4 class="c-grey-900 mT-10 mB-30">Productos</h4>
        </div>
        <div class="col-md-6">
            <div id="floating-buttons" class="dropdown pull-right">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Crear
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="{{ route('productos.create') }}">Producto</a>
                    <a class="dropdown-item" href="{{ route('paquetes.create') }}">Paquete</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover">
                <tbody>
                    @foreach($productos as $producto)
                    @if(array_get($producto, 'es_paquete'))
                    <tr class="row-hover" data-href="{{ route('paquetes.show', ['id' => array_get($producto, 'id')]) }}">
                        @else
                    <tr class="row-hover" data-href="{{ route('productos.show', ['id' => array_get($producto, 'id')]) }}">
                        @endif
                        <td>{{ array_get($producto, 'nombre_'.session('locale'), array_get($producto, 'nombre_es')) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>


@endsection
