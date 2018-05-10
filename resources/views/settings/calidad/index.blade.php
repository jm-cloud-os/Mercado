@extends('layouts.app')

@section('content')

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Calidad
            </h3>
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                <button class="btn btn-info" data-toggle="modal" data-target="#canal-modal">
                    <i class="fas fa-share-alt"></i>
                    Nuevo
                </button>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <tbody>
            @foreach($calidades as $calidad)
            <tr data-toggle="modal" data-target="#edit-canal-modal-{{ array_get($calidad, 'id') }}">
                <td>{{ array_get($calidad, 'nombre') }}</td>
            </tr>
            @include('settings.calidad.fragments.edit-calidad-modal')
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.content -->
@include('settings.calidad.fragments.calidad-modal')

@endsection
