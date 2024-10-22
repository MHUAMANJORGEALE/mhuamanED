<div class="modal-content">
    <div class="modal-header">
        <h4 class="modal-title">Entrada</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="{{ $entrada->id ? route('entradas.update', $entrada) : route('entradas.store') }}" method="post">
            @if($entrada->id)
            @method('PUT')
            <input type="hidden" name="id" value="{{ $entrada->id }}">
            @endif
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="evento_id">Evento</label>
                        <select class="form-control" name="evento_id" required>
                            @foreach($eventos as $evento)
                            <option value="{{ $evento->id }}" {{ $entrada->evento_id == $evento->id ? 'selected' : '' }}>
                                {{ $evento->nombre_evento }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="nombre_entrada">Nombre de la Entrada</label>
                        <input type="text" class="form-control" name="nombre_entrada" value="{{ $entrada->nombre_entrada }}" required placeholder="Ingrese nombre de la entrada">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" name="descripcion" value="{{ $entrada->descripcion }}" placeholder="Ingrese descripción">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" value="{{ $entrada->precio }}" required placeholder="Ingrese precio">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" class="form-control" name="cantidad" value="{{ $entrada->cantidad }}" required placeholder="Ingrese cantidad">
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
