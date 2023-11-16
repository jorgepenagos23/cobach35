<!DOCTYPE html>
<html>
<head>
    <title>Importar Boleta Parcial 1</title>
</head>
<body>

    @if(session('success'))
        <p>{{ session('success') }}</p>
    @endif

    <form action="{{ route('boleta_parcial1.import') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file">
        <button type="submit">Importar</button>
    </form>

</body>
</html>