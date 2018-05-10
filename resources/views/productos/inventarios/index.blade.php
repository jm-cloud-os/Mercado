@extends('layouts.app')

@section('content')

<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-md-6">
            <h4 class="c-grey-900 mT-10 mB-30">Inventarios</h4>
        </div>
        <div class="col-md-6">
            <div id="floating-buttons" class="dropdown pull-right">
                <button class="btn btn-secondary" type="button" data-toggle="modal" data-target="#inventarios-modal">
                    Alta
                </button>
            </div>
        </div>
    </div>
    <!-- algunas estadisticas tal vez -->
</div>

@include('productos.inventarios.fragments.alta-modal')

@endsection
