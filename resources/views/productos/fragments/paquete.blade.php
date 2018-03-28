<div class="bgc-white bd bdrs-3 p-20 mB-20">
    <h3 class="box-title">@lang('Contenido del paquete')</h3>
    <div class="row">
        <div class="col-sm-12">
            <div class="input-group">
                <span class="input-group-addon">
                    <i class="fas fa-box"></i>
                </span>
                <input id="input-search-items" type="text" class="form-control" placeholder="Escriba la Clave o Nombre del Producto para Buscar">
            </div>
        </div>
    </div>
    <table id="lista-productos" class="table">
        <thead>
            <tr>
                <th>Clave</th>
                <th>Producto</th>
                <th>Precio Paquete</th>
                <th>Cantidad</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            @if(!is_null($producto))
            @foreach(array_get($producto, 'productos') as $item)
            <tr>
                <td>{{ array_get($item, 'clave') }}</td>
                <td>{{ array_get($item, 'nombre_es') }}</td>
                <td>{{ array_get($item, 'precio_paquete') }}</td>
                <td><input name="cantidad[]" type="number" min="1" step="1" value="{{ array_get($item->pivot, 'cantidad', 1) }}" class="form-control" required/></td>
                <td class="text-right">
                    <input name="productos[]" type="hidden" value="{{ array_get($item, 'id') }}"/>
                    <button type="button" class="btn btn-link delete-item">
                        <span class="fas fa-trash text-danger"></span>
                    </button>
                </td>
            <tr>
                @endforeach
                @endif
        </tbody>
    </table>
</div>