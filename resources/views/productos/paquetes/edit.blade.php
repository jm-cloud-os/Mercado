@extends('layouts.app')

@section('content')
{{ Form::model($producto, ['route' => ['paquetes.update', array_get($producto, 'id')], 'method' => 'PUT']) }}

@include('productos.paquetes.fragments.form')

{{ Form::close() }}

@endsection
