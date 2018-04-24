<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <h3 class="box-title">
        @if(is_null($almacen))
        Crear almacen
        @else
        Editar almacen
        @endif
    </h3>
    <div class="form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
        <span class="text-danger">*</span> {{ Form::label('nombre') }}
        @if( $errors->has('nombre') )
            <div class="text-danger">Este campo es obligatorio</div>
        @endif
        {{ Form::text('nombre', array_get($almacen, 'nombre'), ['class' => 'form-control form-control-danger', 'autocomplete' => 'off', 'maxlength' => 190]) }}
        
    </div>
    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
        {{ Form::label('telefono', 'Teléfono') }}
        {{ Form::text('telefono', array_get($almacen, 'telefono'), ['class' => 'form-control', 'autocomplete' => 'off', 'maxlength' => 190]) }}
    </div>
    <div class="form-group {{ $errors->has('nombre') ? 'has-error' : '' }}">
        {{ Form::label('direccion', 'Dirección') }}
        {{ Form::textarea('direccion', array_get($almacen, 'direccion'), ['class' => 'form-control', 'autocomplete' => 'off', 'maxlength' => 190]) }}
    </div>
</div>