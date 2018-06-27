<div class="form-group">
    {{ Form::label('cantidad', 'Numero de cupones') }}
    {{ Form::number('cantidad', 50, ['class' => 'form-control', 'required' => true, 'min' => 0, 'step' => 1]) }}
</div>

<div class="form-group">
    {{ Form::label('serie', 'Serie') }}
    {{ Form::text('serie', null, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('descripcion', 'Descripci&oacute;n') }}
    {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'required' => true]) }}
</div>

<div class="form-group">
    {{ Form::label('descuento', 'Descuento') }}
    <div class="input-group">
        <span class="input-group-addon">
            <i class="fas fa-dollar"></i>
        </span>
        {{ Form::number('descuento', null, ['class' => 'form-control', 'required' => true, 'min' => 0, 'step' => 0.1]) }}
    </div>
</div>