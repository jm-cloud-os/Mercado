<div class="modal fade" id="modal-efectivo" tabindex="-1">
    <div class="modal-dialog modal-success">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Cobrar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group has-success">
                    <label>Cliente</label>
                    <div class="input-group">
                        <input type="text" class="form-control autocompletar-cliente"/>
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary btn-autocompletar-cliente" type="button" data-toggle="modal" data-target="#modal-nuevo-cliente">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="form-group has-success">
                    <label>Subtotal</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </span>
                        <input type="text" class="form-control subtotal" readonly=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label>Descuento</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </span>
                        <input id="DESCUENTO" type="text" class="form-control descuento bg-warning" value="0"/>
                    </div>
                </div>
                <div class="form-group has-success">
                    <label>Total</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </span>
                        <input type="text" class="form-control total" value="0" readonly=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label>Efectivo</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </span>
                        <input id="EFECTIVO" type="text" class="form-control pago pago-efectivo" value="0"/>
                    </div>
                </div>
                <div class="form-group">
                    <label>Tarjeta</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </span>
                        <input id="TARJETA" type="text" class="form-control pago pago-tarjeta" value="0"/>
                    </div>
                </div>
                <div class="form-group">
                    <label>Cheque</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </span>
                        <input id="CHEQUE" type="text" class="form-control pago pago-cheque" value="0"/>
                    </div>
                </div>
                <div class="form-group has-warning">
                    <label>Su cambio</label>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="fas fa-dollar"></i>
                        </span>
                        <input type="text" class="form-control cambio" readonly=""/>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark pull-left" data-dismiss="modal">Cancelar</button>
                <button id="btn-submit-venta-efectivo" type="button" class="btn btn-success">Aceptar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->