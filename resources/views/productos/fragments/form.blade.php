@include('productos.fragments.generales')
@includeIf('productos.fragments.medidas')
@includeIf('productos.fragments.inventario')

@if($paquete)
@includeIf('productos.fragments.paquete')
@endif

@includeIf('productos.fragments.costos')
@includeIf('productos.fragments.precios')
@includeIf('productos.fragments.disponibilidad')