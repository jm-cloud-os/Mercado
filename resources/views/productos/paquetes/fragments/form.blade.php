{{ Form::hidden('es_paquete', 1) }}

    <div id="floating-buttons" class="btn-group pull-right" role="group">
        <a href="{{ route('productos.index') }}" class="btn btn-dark">
            <i class="fas fa-close"></i>
            Cancelar
        </a>
        <button type="submit" class="btn btn-success pull-right">
            <i class="fas fa-check"></i>
            Aceptar
        </button>
    </div>


@includeIf('productos.fragments.form')

@push('scripts')
<script type="text/javascript">
    (function () {
        function setPrecioAndCosto(){
            var total_precio = 0;
            var total_costo = 0;
            $('#lista-productos tbody tr').each(function (index, item) {
                
                var cantidad = parseFloat($(item).find('input[name="cantidad[]"]').val()) || 0;
                var precio = parseFloat($(item).find('input[name="precio_paquete"]').val()) || 0;
                var costo = parseFloat($(item).find('input[name="costo_paquete"]').val()) || 0;
                
                var subtotal_precio = precio * cantidad;
                var subtotal_costo = costo * cantidad;
                
                total_precio += subtotal_precio;
                total_costo += subtotal_costo;
            });

            $('input[name="precio_individual"]').val(total_precio);
            $('input[name="costo"]').val(total_costo);
            
        }
        
        $('#input-search-items').autocomplete({
            serviceUrl: "{{ route('autocomplete.productos', ['q' => 'individuales']) }}",
            dataType: 'json',
            onSelect: function (suggestion) {
                
                var row = '<tr>';
                row += '<td>' + suggestion.data.clave + '</td>';
                row += '<td>' + suggestion.value + '</td>';
                row += '<td>' + suggestion.data.precio_paquete + '</td>';
                row += '<td><input name="cantidad[]" type="number" min="1" step="1" value="1" class="form-control" required/></td>';
                row += '<td class="text-right">';
                row += '<input name="productos[]" type="hidden" value="' + suggestion.data.id + '"/>';
                
                @if($paquete)
                    row += '<input name="precio_paquete" type="hidden" value="' + suggestion.data.precio_paquete + '"/>';
                    row += '<input name="costo_paquete" type="hidden" value="' + suggestion.data.costo + '"/>';
                @endif
                
                row += '<button type="button" class="btn btn-link delete-item">';
                row += '<span class="fas fa-trash text-danger"></span>';
                row += '</button>';
                row += '</td>';
                row += '<tr>';

                var lista = $('#lista-productos');
                lista.find('tbody').append(row);
                
                setPrecioAndCosto();
                
                $('#input-search-items').val('').focus();
            }
        });

        $('#lista-productos').on('click', '.delete-item', function (e) {
            if (confirm('Está seguro de eliminar este producto?')) {
                var row = $(this).parents('tr');
                row.remove();
            }
        });
        
        $('#lista-productos').on('change', 'input[name="cantidad[]"]', function (e) {
            setPrecioAndCosto();
        }).on('keyup', function (e) {
            setPrecioAndCosto();
        });
    })();
</script>
@endpush