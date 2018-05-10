<div class="form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
    <span class="text-danger">*</span> {{ Form::label('nombre') }}
    @if( $errors->has('nombre') )
    <div class="text-danger">Este campo es obligatorio</div>
    @endif
    {{ Form::text('nombre', null, ['class' => 'form-control form-control-danger', 'autocomplete' => 'off', 'maxlength' => 190, 'required' => true]) }}

</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    {{ Form::label('telefono', 'Teléfono') }}
    {{ Form::text('telefono', null, ['class' => 'form-control', 'autocomplete' => 'off', 'maxlength' => 190]) }}
</div>
<div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
    {{ Form::label('direccion', 'Dirección') }}
    {{ Form::textarea('direccion', null, ['class' => 'form-control', 'autocomplete' => 'off', 'maxlength' => 190]) }}
</div>