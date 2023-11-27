<!-- Vista del PDF -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boleta Parcial 1</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4c2;
            color: #333;
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
        }

        h1 {
            color: #0066cc;
        }

        .boleta-container {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            margin-top: 20px;
        }

        .datos-alumno {
            font-weight: bold;
            margin-bottom: 10px;
        }

        .materia table {
            width: 100%;
            margin-bottom: 10px;
        }

        .materia th, .materia td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .nota {
            font-weight: bold;
            color: #0066cc;
        }

        .logo {
            margin-bottom: 10px;
        }

        /* Regla de estilo de Tailwind incluida directamente */
        .bg-blue-500 {
            background-color: #3490dc;
        }
    </style>
</head>
<body>
    <!-- Contenido del PDF -->
    <div class="boleta-container">
        <div class="bg-blue-500">
            <h1>Boleta Parcial 1</h1>       
        </div>
        <div class="logo">
            <img src="{{ asset('images/cobachlogo.png') }}" alt="Logo" style="max-width: 50%; height: auto;">
        </div>
        <div class="datos-alumno">
            <p>PRIMER SEMESTRE </p>
            <p>PARCIAL 1</p>

            <p>Matrícula: {{ $boleta_parcial1->matricula }}</p>
            <p>Nombre del Alumno: {{ $boleta_parcial1->nombre_alumno }}</p>
        </div>

        <div class="materia">
            <table class="table-primary">                   
                    <thead>
                    <tr>
                        <th>Materia</th>
                        <th>Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Español y Literatura</td>
                        <td>{{ $boleta_parcial1->espanol1 }}</td>
                    </tr>
                    <tr>
                        <td>Matemáticas Diferenciales</td>
                        <td>{{ $boleta_parcial1->matematicas1 }}</td>
                    </tr>
                    <tr>
                        <td class="pt-3-half" contenteditable="true">Inglés</td>
                        <td>{{ $boleta_parcial1->ingles1 }}</td>
                    </tr>
                    <tr>
                        <td>Historia</td>
                        <td>{{ $boleta_parcial1->historia1 }}</td>
                    </tr>
                    <tr>
                        <td>Fisica</td>
                        <td>{{ $boleta_parcial1->fisica1 }}</td>
                    </tr>
                    <tr>
                        <td>Biologia</td>
                        <td>{{ $boleta_parcial1->biologia1 }}</td>
                    </tr>
                    <tr>
                        <td>Orientacion Educativa</td>
                        <td>{{ $boleta_parcial1->orientacion1 }}</td>
                    </tr>
                    <tr>
                        <td>Formacion Civica y Etica</td>
                        <td>{{ $boleta_parcial1->civico1 }}</td>
                    </tr>

     <tr>
                        <td>Sistema Digital</td>
                        <td>{{ $boleta_parcial1->sistema1 }}</td>
     </tr>

                    
                    <!-- Agrega más materias según tu estructura de datos -->
                </tbody>
            </table>
        </div>

        <div class="nota">
            <p><strong>Promedio:</strong> {{ $boleta_parcial1->promedio }}</p>
        </div>
       
        <!-- Puedes agregar más información de la boleta según tu estructura de datos -->
    </div>
  
    <!-- Sección con la regla de estilo de Tailwind incluida directamente -->
    <div class="bg-blue-500">
    </div>

    <!-- Bootstrap JS (opcional, dependiendo de tus necesidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
