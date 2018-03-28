<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <h3 class="box-title">Inventario</h3>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group {{ $errors->has('disponibilidad') ? 'has-error' : '' }}">
                <label>Disponibilidad</label>
                {{ Form::number('disponibilidad', null, ['class' => 'form-control']) }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group {{ $errors->has('punto_reorden') ? 'has-error' : '' }}">
                <label>Punto de reorden</label>
                {{ Form::number('punto_reorden', null, ['class' => 'form-control']) }}
            </div>
        </div>
    </div>
</div>