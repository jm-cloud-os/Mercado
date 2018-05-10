<div class="form-group {{ $errors->has('nombre') ? 'has-danger' : '' }}">
    <span class="text-danger">*</span> {{ Form::label('producto') }}
    @if( $errors->has('producto') )
    <div class="text-danger">Este campo es obligatorio</div>
    @endif
    {{ Form::text('producto', null, ['class' => 'form-control form-control-danger autocomplete', 'autocomplete' => 'off', 'id' => 'input-search-items']) }}
    {{ Form::hidden('producto_id') }}
</div>
<div class="form-group {{ $errors->has('cantidad') ? 'has-danger' : '' }}">
    <span class="text-danger">*</span> {{ Form::label('cantidad') }}
    @if( $errors->has('cantidad') )
    <div class="text-danger">Este campo es obligatorio</div>
    @endif
    {{ Form::number('cantidad', null, ['class' => 'form-control form-control-danger autocomplete', 'autocomplete' => 'off', 'required' => true, 'step' => 0.01, 'min' => 0]) }}
</div>
<div class="form-group {{ $errors->has('punto_reorden') ? 'has-danger' : '' }}">
    <span class="text-danger">*</span> {{ Form::label('punto_reorden', 'Punto de Reorden') }}
    @if( $errors->has('punto_reorden') )
    <div class="text-danger">Este campo es obligatorio</div>
    @endif
    {{ Form::number('punto_reorden', null, ['class' => 'form-control form-control-danger autocomplete', 'autocomplete' => 'off', 'required' => true, 'step' => 0.01, 'min' => 0]) }}
</div>
<div class="form-group {{ $errors->has('almacen') ? 'has-error' : '' }}">
    {{ Form::label('almacen_id', 'Almacen') }}
    {{ Form::select('almacen_id', $almacenes, array_get(request(), 'almacen'), ['class' => 'form-control']) }}
</div>

@push('scripts')
<script type="text/javascript">
    (function () {
        $('#input-search-items').autocomplete({
            serviceUrl: "{{ route('autocomplete.productos') }}",
            dataType: 'json',
            onSelect: function (suggestion) {
                $('input[name="producto_id"]').val(suggestion.data.id);
            }
        }).on('keyup', function (e) {
            if (e.which != 13) {
                $('input[name="producto_id"]').val('');
            }
        });
    })();
</script>
@endpush()