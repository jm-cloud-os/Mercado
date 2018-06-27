@extends('layouts.app')

@section('content')

<!-- Main content -->
<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-6">
            <h3 class="box-title">
                Cupones
            </h3>
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                <button class="btn btn-info" data-toggle="modal" data-target="#cupon-modal">
                    <i class="fas fa-ticket-alt"></i>
                    Crear serie de cupones
                </button>
            </div>
        </div>
    </div>

    <table class="table table-hover">
        <thead>
            <tr>
                <th>Serie de cupones</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
            <tr class="clickeable-row" data-url="{{ route('cupones.show', ['id' => array_get($serie, 'serie')]) }}">
                <td>{{ array_get($serie, 'serie') }}</td>
                <td class="text-right">
                    <span class="fas fa-chevron-right"></span>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<!-- /.content -->
@include('settings.cupones.fragments.cupon-modal')

@endsection
