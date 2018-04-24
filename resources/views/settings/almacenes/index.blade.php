@extends('layouts.app')

@section('content')

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Almacenes
            </h3>
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                <a href="{{ route('almacenes.create') }}" class="btn btn-info">
                    <i class="fas fa-box"></i>
                    Nuevo
                </a>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <tbody>
            @foreach($almacenes as $almacen)
            <tr class="row-hover" data-href="{{ route('almacenes.show', ['id' => array_get($almacen, 'id')]) }}">
                <td>{{ array_get($almacen, 'nombre') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.content -->

@endsection
