<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <h3 class="box-title">Costo</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="form-group {{ $errors->has('costo') ? 'has-error' : '' }}">
                <div class="input-group">
                    <div class="input-group-addon">
                        <i class="fas fa-dollar"></i>
                    </div>
                    {{ Form::number('costo', null, ['class' => 'form-control']) }}
                </div>
            </div>
        </div>
    </div>
</div>