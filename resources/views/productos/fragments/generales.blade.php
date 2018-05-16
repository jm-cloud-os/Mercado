<div class="bgc-white bd bdrs-3 p-20 mB-20">


    @if($paquete)
    <h3 class="box-title">
        @if($action === 'create')
        Crear paquete
        @else
        Editar Paquete
        @endif
    </h3>
    @if( $errors->any() )
    <small class="text-danger">@lang('productos.individuales.create.mensajes.error')</small>
    @endif
    @else
    <h3 class="box-title">
        @if($action === 'create')
        Crear producto
        @else
        Editar producto
        @endif
    </h3>
    @if( $errors->any() )
    <small class="text-danger">@lang('productos.individuales.create.mensajes.error')</small>
    @endif
    @endif
    
    @if(!$paquete)
    <div class="form-group {{ $errors->has('calidad') ? 'has-error' : '' }}">
        {{ Form::label('calidad_id', 'Calidad') }}
        {{ Form::select('calidad_id', $calidades, null, ['class' => 'form-control']) }}
    </div>
    @endif
    
    <div class="form-group {{ $errors->has('clave') ? 'has-error' : '' }}">
        {{ Form::label('clave') }}
        {{ Form::text('clave', null, ['class' => 'form-control', 'autocomplete' => 'off', 'maxlength' => 190]) }}
    </div>
    <div class="form-group {{ $errors->has('nombre_es') ? 'has-error' : '' }}">
        <label>Nombre en espa&ntilde;ol</label>
        {{ Form::text('nombre_es', null, ['class' => 'form-control', 'autocomplete' => 'off', 'maxlength' => 190]) }}
    </div>
    <div class="form-group">
        <label>Descripci&oacute;n corta en espa&ntilde;ol</label>
        <textarea name="descripcion_corta_es" class="summernote">{{ array_get($producto, 'descripcion_corta_es') }}</textarea>
    </div>
    <div class="form-group">
        <label>Descripci&oacute;n larga en espa&ntilde;ol</label>
        <textarea name="descripcion_larga_es" class="summernote">{{ array_get($producto, 'descripcion_larga_es') }}</textarea>
    </div>

    <div class="form-group {{ $errors->has('nombre_en') ? 'has-error' : '' }}">
        <label>Nombre en ingl&eacute;s</label>
        {{ Form::text('nombre_en', null, ['class' => 'form-control', 'autocomplete' => 'off', 'maxlength' => 190]) }}
    </div>
    <div class="form-group">
        <label>Descripci&oacute;n corta en ingl&eacute;s</label>
        <textarea name="descripcion_corta_en" class="summernote">{{ array_get($producto, 'descripcion_corta_en') }}</textarea>
    </div>
    <div class="form-group">
        <label>Descripci&oacute;n larga en ingl&eacute;s</label>
        <textarea name="descripcion_larga_en" class="summernote">{{ array_get($producto, 'descripcion_larga_en') }}</textarea>
    </div>
    <div class="form-group">
        <label>Video</label>
        {{ Form::textarea('video', null, ['class' => 'form-control']) }}
    </div>

</div>