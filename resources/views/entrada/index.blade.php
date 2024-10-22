<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Eventos y Entradas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Lista de Entradas</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Evento</th>
                    <th>Nombre de la Entrada</th>
                    <th>Descripción</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($entradas as $entrada)
                <tr>
                    <td>{{ $entrada->id }}</td>
                    <td>{{ $entrada->evento->nombre_evento }}</td> <!-- Asumiendo que tienes la relación definida -->
                    <td>{{ $entrada->nombre_entrada }}</td>
                    <td>{{ $entrada->descripcion }}</td>
                    <td>{{ $entrada->precio }}</td>
                    <td>{{ $entrada->cantidad }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <h2>Lista de Eventos</h2>
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre del Evento</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                @foreach($eventos as $evento)
                <tr>
                    <td>{{ $evento->id }}</td>
                    <td>{{ $evento->nombre_evento }}</td>
                    <td>{{ $evento->descripcion }}</td>
                    <td>{{ $evento->fecha_evento }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
