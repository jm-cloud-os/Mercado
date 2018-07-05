@extends('layouts.app')

@section('content')

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Categor&iacute;as
            </h3>
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                <button class="btn btn-info" data-toggle="modal" data-target="#categoria-modal">
                    <i class="fas fa-certificate"></i>
                    Nueva
                </button>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <tbody>
            @foreach($categorias as $categoria)
            <tr data-toggle="modal" data-target="#edit-categoria-modal-{{ array_get($categoria, 'id') }}">
                <td>{{ array_get($categoria, 'nombre') }}</td>
            </tr>
            @include('settings.categorias.fragments.edit-categoria-modal')
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.content -->
@include('settings.categorias.fragments.categoria-modal')

@endsection
