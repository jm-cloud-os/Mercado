<div class="modal modal-info fade" id="modal-nuevo-cliente" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Info Modal</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('clientes.fragments.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-success btn-nuevo-cliente" data-dismiss="modal">Guardar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->