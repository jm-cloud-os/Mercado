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
                <button class="btn btn-info" data-toggle="modal" data-target="#almacen-modal">
                    <i class="fas fa-box"></i>
                    Nuevo
                </button>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <tbody>
            @foreach($almacenes as $almacen)
            <tr data-toggle="modal" data-target="#edit-almacen-modal-{{ array_get($almacen, 'id') }}">
                <td>{{ array_get($almacen, 'nombre') }}</td>
            </tr>
            @includeIf('settings.almacenes.fragments.edit-almacen-modal')
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.content -->
@includeIf('settings.almacenes.fragments.almacen-modal')

@endsection
