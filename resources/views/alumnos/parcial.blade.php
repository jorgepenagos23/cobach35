@foreach ($boletas as $boleta)
    {{ $boleta->nombre_alumno }} - {{ $boleta->materia }} - {{ $boleta->promedio }}
    <br>
@endforeach