@extends('layouts.app')

@section('content')
{{ Form::open(['route' => 'paquetes.store', 'id' => 'create-item']) }}

@include('productos.paquetes.fragments.form')

{{ Form::close() }}

@endsection
