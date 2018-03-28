<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <h3 class="box-title">Precios</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Precio individual</label>
                <div class="form-group {{ $errors->has('precio_individual') ? 'has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </div>
                        {{ Form::number('precio_individual', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if(!$paquete)
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group">
                <label>Precio paquete</label>
                <div class="form-group {{ $errors->has('precio_paquete') ? 'has-error' : '' }}">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </div>
                        {{ Form::number('precio_paquete', null, ['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>