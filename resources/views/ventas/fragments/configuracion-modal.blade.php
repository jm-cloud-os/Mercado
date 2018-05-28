
{{ Form::open(['route' => 'ventas.change']) }}
<div class="modal fade" id="configuracion-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Configuraci&oacute;n de punto de venta</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group {{ $errors->has('almacen_id') ? 'has-error' : '' }}">
                    {{ Form::label('almacen_id', 'Almacen') }}
                    {{ Form::select('almacen_id', $almacenes, session('almacen'), ['class' => 'form-control']) }}
                </div>
                <div class="form-group {{ $errors->has('canal_id') ? 'has-error' : '' }}">
                    {{ Form::label('canal_id', 'Canal') }}
                    {{ Form::select('canal_id', $canales, session('canal'), ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}