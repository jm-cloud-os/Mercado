<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <h3 class="box-title">Medidas</h3>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group {{ $errors->has('largo') ? 'has-error' : '' }}">
                <label>Largo</label>
                <div class="input-group">
                    {{ Form::number('largo', null, ['class' => 'form-control']) }}
                    <div class="input-group-addon">CM</div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group {{ $errors->has('ancho') ? 'has-error' : '' }}">
                <label>Ancho</label>
                <div class="input-group">
                    {{ Form::number('ancho', null, ['class' => 'form-control']) }}
                    <div class="input-group-addon">CM</div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group {{ $errors->has('alto') ? 'has-error' : '' }}">
                <label>Alto</label>
                <div class="input-group">
                    {{ Form::number('alto', null, ['class' => 'form-control']) }}
                    <div class="input-group-addon">CM</div>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group {{ $errors->has('peso') ? 'has-error' : '' }}">
                <label>Peso</label>
                <div class="input-group">
                    {{ Form::number('peso', null, ['class' => 'form-control']) }}
                    <div class="input-group-addon">KG</div>
                </div>
            </div>
        </div>
    </div>

</div>
