<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">{{ $evento->id ? 'Editar Evento' : 'Crear Evento' }}</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ $evento->id ? route('eventos.update', $evento) : route('eventos.store') }}" method="post" enctype="multipart/form-data">
            @if($evento->id)
                @method('PUT')
                <input type="hidden" name="id" value="{{ $evento->id }}">
            @endif
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nombre_evento">Nombre del Evento</label>
                        <input type="text" class="form-control" name="nombre_evento" value="{{ old('nombre_evento', $evento->nombre_evento) }}" required placeholder="Ingrese el nombre del evento">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion', $evento->descripcion) }}" placeholder="Ingrese la descripción">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha_evento">Fecha del Evento</label>
                        <input type="date" class="form-control" name="fecha_evento" value="{{ old('fecha_evento', $evento->fecha_evento) }}" required>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input type="file" class="form-control" name="imagen">
                    </div>
                    @if($evento->imagen)
                        <div>
                            <img class="img-rounded" width="100" height="100" src="{{ asset('eventos/'.$evento->imagen) }}" alt="{{ $evento->imagen }}">
                        </div>
                    @endif
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
