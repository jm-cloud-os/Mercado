@extends('layouts.app')

@section('content')
{{ Form::open(['route' => 'paquetes.store']) }}

@include('productos.paquetes.fragments.form')

{{ Form::close() }}

@endsection
