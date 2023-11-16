<!-- resources/views/boleta_parcial1/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Lista de Boletas Parciales 1</title>
</head>
<body>

    <div class="col-md-12">
        <form class="row g-3" action="{{ route('/import_parcial1') }}" method="post" enctype="multipart/form-data">                        
            @csrf
            <div class="col-auto">
                <label class="visually-hidden">Excel boletas </label>
                <input type="file" class="form-control" name="excel_file">
            </div>
            @error('excel_file')
            <p class="text-danger">{{ $message }}</p>
            @enderror

            <div class="col-auto">
                <button type="submit" class="mb-3 btn btn-primary">Subir Excel</button>
            </div>
        </form>
    </div>

    <h1>Lista de Boletas Parciales 1</h1>

    <table border="1">
        <thead>
            <tr>
                <th>Matrícula</th>
                <th>Nombre Completo</th>
                <th>Español 1</th>
                <th>Español 2</th>
                <th>Español 3</th>
                <th>Matemáticas 1</th>
                <th>Matemáticas 2</th>
                <th>Matemáticas 3</th>
                <th>Inglés 1</th>
                <th>Inglés 2</th>
                <th>Inglés 3</th>
                <th>Historia 1</th>
                <th>Historia 2</th>
                <th>Historia 3</th>
                <th>Literatura 1</th>
                <th>Literatura 2</th>
                <th>Literatura 3</th>
                <th>Materia 6</th>
                <th>Orientación 1</th>
                <th>Orientación 2</th>
                <th>Orientación 3</th>
                <th>Física 1</th>
                <th>Física 2</th>
                <th>Física 3</th>
                <th>Biología 1</th>
                <th>Biología 2</th>
                <th>Biología 3</th>
                <th>Cívico 1</th>
                <th>Cívico 2</th>
                <th>Cívico 3</th>
                <th>Sistema 1</th>
                <th>Sistema 2</th>
                <th>Sistema 3</th>
                <th>Promedio</th>
                <th>Observaciones</th>
                <!-- Añade otras columnas según sea necesario -->
            </tr>
        </thead>
        <tbody>
            @foreach($boletas as $boleta)
                <tr>
                    <td>{{ $boleta->matricula }}</td>
                    <td>{{ $boleta->nombre_alumno }}</td>
                    <td>{{ $boleta->espanol1 }}</td>
                    <td>{{ $boleta->espanol2 }}</td>
                    <td>{{ $boleta->espanol3 }}</td>
                    <td>{{ $boleta->matematicas1 }}</td>
                    <td>{{ $boleta->matematicas2 }}</td>
                    <td>{{ $boleta->matematicas3 }}</td>
                    <td>{{ $boleta->ingles1 }}</td>
                    <td>{{ $boleta->ingles2 }}</td>
                    <td>{{ $boleta->ingles3 }}</td>
                    <td>{{ $boleta->historia1 }}</td>
                    <td>{{ $boleta->historia2 }}</td>
                    <td>{{ $boleta->historia3 }}</td>
                    <td>{{ $boleta->literatura1 }}</td>
                    <td>{{ $boleta->literatura2 }}</td>
                    <td>{{ $boleta->literatura3 }}</td>
                    <td>{{ $boleta->materia6 }}</td>
                    <td>{{ $boleta->orientacion1 }}</td>
                    <td>{{ $boleta->orientacion2 }}</td>
                    <td>{{ $boleta->orientacion3 }}</td>
                    <td>{{ $boleta->fisica1 }}</td>
                    <td>{{ $boleta->fisica2 }}</td>
                    <td>{{ $boleta->fisica3 }}</td>
                    <td>{{ $boleta->biologia1 }}</td>
                    <td>{{ $boleta->biologia2 }}</td>
                    <td>{{ $boleta->biologia3 }}</td>
                    <td>{{ $boleta->civico1 }}</td>
                    <td>{{ $boleta->civico2 }}</td>
                    <td>{{ $boleta->civico3 }}</td>
                    <td>{{ $boleta->sistema1 }}</td>
                    <td>{{ $boleta->sistema2 }}</td>
                    <td>{{ $boleta->sistema3 }}</td>
                    <td>{{ $boleta->promedio }}</td>
                    <td>{{ $boleta->observaciones }}</td>
                    <!-- Agrega otras columnas según sea necesario -->
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>
