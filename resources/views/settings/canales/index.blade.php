@extends('layouts.app')

@section('content')

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Canales
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
            @foreach($canales as $canal)
            <tr data-toggle="modal" data-target="#edit-canal-modal-{{ array_get($canal, 'id') }}">
                <td>{{ array_get($canal, 'nombre') }}</td>
            </tr>
            @include('settings.canales.fragments.edit-canal-modal')
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.content -->
@include('settings.canales.fragments.canal-modal')

@endsection
