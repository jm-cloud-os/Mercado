@extends('layouts.app')

@section('content')

{{ Form::open(['route' => 'ventas.store', 'id' => 'form-venta']) }}
{{ Form::hidden('total') }}
{{ Form::hidden('forma_pago') }}
{{ Form::hidden('canal', 'mostrador') }}

<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <div class="row">
        <div class="col-sm-12">
            <h1>{{ array_get($almacen, 'nombre') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="input-group">
                {{ Form::text('ventas_buscar', null, ['class' => 'form-control autocomplete', 'id' => 'input-search-items', 'placeholder' => 'Buscar producto o paquete']) }}
                <span class="input-group-addon">
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
        <div class="col-sm-6">
            <div id="floating-buttons" class="btn-group pull-right" role="group">
                <button type="button" class="btn btn-dark" data-toggle="modal" data-target="#configuracion-modal">
                    <i class="fas fa-database"></i>
                    @lang('Configurar ventas')
                </button>
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-efectivo">
                    <i class="fas fa-money-bill-alt"></i>
                    @lang('Cobrar')
                </button>
            </div>
        </div>
    </div>
    <p>&nbsp;</p>
    <div class="row">
        <div class="col-sm-12">
            <h3 class="box-title">
                @lang('Ventas')
            </h3>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <table class="table table-striped" id="venta">
                <thead>
                    <tr>
                        <th>@lang('Clave')</th>
                        <th>@lang('Artículo')</th>
                        <th>@lang('Precio')</th>
                        <th>@lang('Cantidad')</th>
                        <th>@lang('Subtotal')</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


<div class="alert alert-primary" style="position: fixed; bottom: 35px; right: 14px;">
    <div class="row">
        <div class="col-sm-4 p-10">Total</div>
        <div class="col-sm-8">
            <h3 id="total">$<span>0.00</span></h3>
        </div>
    </div>
</div>
{{ Form::close() }}

@include('ventas.fragments.modal-efectivo')
@include('ventas.fragments.modal-tarjeta-de-credito')
@include('ventas.fragments.configuracion-modal')

@push('scripts')
<script type="text/javascript">
    var items = $('#venta').find('tbody').find('tr').length;
    var save = false;

    function calcular(sender) {
        var total = 0;
        $('#venta tbody tr').each(function (index, item) {
            var precio = parseFloat($(item).find('input[name="precio"]').val()) || 0;
            var cantidad = parseFloat($(item).find('input[name="cantidad[]"]').val()) || 0;
            var subtotal = precio * cantidad;

            $(item).find('span.subtotal').html(subtotal.toFixed(2));
            total += subtotal;
        });

        $('#total').find('span').html(total.toFixed(2));
        items = $('#venta').find('tbody').find('tr').length;
        $('.pago-efectivo').val(total);
        $('.pago-efectivo').change();
    }
    
    function cambio(){
        var cambio = (parseFloat($('.pago-efectivo:last').val()) + parseFloat($('.pago-tarjeta').val()) + parseFloat($('.pago-cheque').val())) - $('.pago-efectivo:first').val();
        console.log($('.pago-efectivo:last').val() , $('.pago-tarjeta').val() , $('.pago-cheque').val());
        
        $('.pago-efectivo-cambio').val(cambio);
        return cambio;
    }
    
    (function () {
        
        @if( !session('almacen') )
            $('[data-target="#almacenes-modal"]').click();
        @endif

        $('#modal-efectivo').on('shown.bs.modal', function () {
            setTimeout(function(){
                $('.pago-efectivo:last').focus().select();
            });
        });
        
        
        $('.pago').on('change', function (e) {
            cambio();
        }).on('keyup', function (e) {
            cambio();
        });

        $('#btn-submit-venta-efectivo').on('click', function (e) {
            if (cambio() < 0) {
                alert('Debe cubrir el total del pago para continuar');
                return false;
            }
            $('input[name="total"]').val($('.pago-efectivo:first').val());
            
            var formas = [];
            $('.pago').each(function(index, item){
                var pago = {forma: item.id, valor: item.value};
                formas.push(pago);
            });
            
            $('input[name="forma_pago"]').val(JSON.stringify(formas));
            $('#form-venta').submit();
        });

        $(window).on('beforeunload', function () {
            if (items > 0 && !save) {
                return 'Your own message goes here...';
            }
        });

        $('#venta').on('change', 'input[name="cantidad"]', function (e) {
            var sender = $(this).parents('tr');
            calcular(sender);
        }).on('keyup', function (e) {
            var sender = $(this).parents('tr');
            calcular(sender);
        }).on('mouseup', function (e) {
            var sender = $(this).parents('tr');
            calcular(sender);
        });

        $('#venta').on('click', 'button[name="borrar"]', function (e) {
            var sender = $(this).parents('tr');
            if (confirm('¿Desea borrar este producto?')) {
                $(sender).remove();
                calcular(sender);
            }
        });

        $('#input-search-items').autocomplete({
            serviceUrl: "{{ route('autocomplete.ventas') }}",
            dataType: 'json',
            onSelect: function (suggestion) {
                var row = '<tr>';
                row += '<td>';
                row += '<span class="clave">' + suggestion.data.clave + '</span>';
                row += '<input type="hidden" name="id[]" value="' + suggestion.data.id + '"/>';
                row += '<input type="hidden" name="paquete[]" value="' + suggestion.data.es_paquete + '"/>';
                row += '</td>';
                row += '<td><span class="articulo">' + suggestion.value + '</span></td>';
                row += '<td>';
                row += '$<span class="precio">' + suggestion.data.precio_individual + '</span>';
                row += '<input type="hidden" name="precio" value="' + suggestion.data.precio_individual + '"/>';
                row += '</td>';
                row += '<td><input name="cantidad[]" type="number" min="1" step="1" value="1" class="form-control" required/></td>';
                row += '<td>$<span class="subtotal">&nbsp;</span></td>';
                row += '<td>';
                row += '<button type="button" class="btn btn-link" name="borrar">';
                row += '<span class="fas fa-trash text-danger"></span>';
                row += '</button>';
                row += '</td>';

                var venta = $('#venta');
                venta.find('tbody').append(row);
                calcular(null);
                $('#input-search-items').val('').focus();
            }
        });

        $('#form-venta').on('submit', function (e) {
            if (items <= 0) {
                alert('No hay artículos para guardar');
                return false;
            }

            save = true;
        });

    })();

</script>
@endpush

@endsection
