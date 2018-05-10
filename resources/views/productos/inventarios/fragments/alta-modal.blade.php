{{ Form::open(['route' => 'inventarios.store', 'id' => 'altas-inventario']) }}
<div class="modal fade" id="inventarios-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inventarios</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @includeIf('productos.inventarios.fragments.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}

@push('scripts')
<script type="text/javascript">
    (function () {
        $('#altas-inventario').on('submit', function(e){
            var value = $('input[name="producto_id"]').val();
            if(value == '' || value == null){
                alert('Seleccione un producto existente');
                return false;
            }
        });
    })();
</script>
@endpush()
