{{ Form::model($calidad, ['route' => ['calidades.update', array_get($calidad, 'id')], 'method' => 'PUT']) }}
<div class="modal fade" id="edit-canal-modal-{{ array_get($calidad, 'id') }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Calidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                @include('settings.calidad.fragments.form')
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar</button>
                {{ Form::close() }}
                {{ Form::open(['route' => ['calidades.destroy', array_get($calidad, 'id')], 'method' => 'DELETE', 'onsubmit' => 'return confirm("Desea borrar permanentemente este elemento?")']) }}
                <button type="submit" class="btn btn-danger">
                    <span class="fas fa-trash-alt"></span>
                    Borrar
                </button>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>