<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Evento</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ $evento->id ? route('eventos.update', $evento) : route('eventos.store') }}" method="post">
            @if($evento->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $evento->id }}">
            @endif
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nombre_evento">Nombre del Evento</label>
                        <input type="text" class="form-control" name="nombre_evento" value="{{ $evento->nombre_evento }}" required placeholder="Ingrese nombre del evento">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="{{ $evento->descripcion }}" placeholder="Ingrese descripción">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha_evento">Fecha</label>
                        <input type="date" class="form-control" name="fecha_evento" value="{{ $evento->fecha_evento }}" required>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </form>
    </div>
    <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    </div>
</div>
