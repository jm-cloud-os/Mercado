<div class="form-group">
    {{ Form::label('nombre') }}
    {{ Form::text('nombre', null, ['class' => 'form-control cliente', 'autocomplete' => 'off', 'required' => true]) }}
</div>
<div class="form-group">
    {{ Form::label('email') }}
    {{ Form::email('email', null, ['class' => 'form-control cliente', 'autocomplete' => 'off', 'required' => true]) }}
</div>
<div class="form-group">
    {{ Form::label('R.F.C.') }} <small>(Opcional)</small>
    {{ Form::text('rfc', null, ['class' => 'form-control cliente', 'autocomplete' => 'off']) }}
</div>
<div class="form-group">
    {{ Form::label('telefono', 'Tel&eacute;fono') }} <small>(Opcional)</small>
    {{ Form::text('telefono', null, ['class' => 'form-control cliente', 'autocomplete' => 'off']) }}
</div>
<div class="form-group">
    {{ Form::label('direccion', 'Direcci&oacute;n') }} <small>(Opcional)</small>
    {{ Form::textarea('direccion', null, ['class' => 'form-control cliente', 'autocomplete' => 'off']) }}
</div>