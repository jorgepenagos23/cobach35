<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4c2;
            color: #333;
            font-size: 8px; /* Ajusta el tamaño de fuente según tus necesidades */
            margin: 0;
            padding: 20px;
            box-sizing: border-box;
            position: relative;
            page-break-before: auto;
        }

        .formulario {
            background-color: #fff;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            position: relative;
            margin: 0 auto;
            page-break-inside: avoid;
        }

        h1 {
            color: #0058cc;
            text-align: center;
            margin-bottom: 20px;
        }

        .marca-agua {
            content: "Sin validez oficial";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            color: rgba(0, 0, 0, 0.1);
        }

        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            max-width: 20%;
            height: auto;
            width: 8%;
        }

        .datos-alumno {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-bottom: 20px;
        }

        .datos-alumno p {
            font-weight: bold;
            margin: 0;
        }

        .materia table {
            width: 100%;
            margin-bottom: 10px;
            border-collapse: collapse;
        }

        .materia th, .materia td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .nota {
            font-weight: bold;
            color: #93d391;
            text-align: center;
        }

        .fecha-generacion {
            text-align: right;
            margin-top: 20px;
        }

        .formulario button {
            padding: 0.75rem 1.5rem;
            background-color: #3490dc;
            color: #fff;
            border: none;
            border-radius: 0.375rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
            width: 100%;
            margin-top: 20px;
        }

        .formulario button:hover {
            background-color: #2779bd;
        }
    </style>
</head>
<body>
    <div class="formulario">
        <h1> Boleta Parcial 3  GRUPO D PRIMER SEMESTRE </h1>
        <div class="marca-agua"></div>
        <div class="logo">
            <img src="{{ asset('/public/imagenes/cobachlogo.png') }}" alt="Logo" >
        </div>
        <div class="datos-alumno">
            <p class="p-1 border rounded">NOMBRE: {{ $boleta_parcial1->nombre_alumno }}</p>
            <p class="p-1 border rounded">CURP: {{ $alumno->curp }}</p>
            <p class="p-1 border rounded">SEMESTRE: {{ $alumno->grado }}</p>
            <p class="p-1 border rounded">GRUPO: {{ $alumno->grupo }}</p>
            <p class="p-1 border rounded">OBSERVACIONES: {{ $boleta_parcial1->observaciones }}</p>
            <p class="p-1 border rounded">promedio: {{ $boleta_parcial1->promedio }}</p>
            <p class="p-1 border rounded">MATRICULA: {{ $boleta_parcial1->matricula }}</p>
            <p class="p-1 border rounded">FECHA :{{ now()->format('d/m/Y H:i:s') }}</p>

        </div>

        <div class="materia">
            <table class="table-primary">
                <thead>
                    <tr>
                        <th scope="col" class="px-1 py-1 text-sm font-medium text-left text-gray-900">
                            Asignatura</th>
                            <th scope="col" class="px-1 py-1 text-sm font-medium text-left text-gray-900">
                                Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Español y Literatura</td>
                        <td>{{ $boleta_parcial1->espanol1 }}</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Matemáticas Diferenciales</td>
                        <td>{{ $boleta_parcial1->matematicas1 }}</td>

                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Inglés</td>
                        <td>{{ $boleta_parcial1->ingles1 }}</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Historia</td>
                        <td>{{ $boleta_parcial1->historia1 }}</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Física</td>
                        <td>{{ $boleta_parcial1->fisica1 }}</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Biología</td>
                        <td>{{ $boleta_parcial1->biologia1 }}</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Orientación Educativa</td>
                        <td>{{ $boleta_parcial1->orientacion1 }}</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Cívica y Ética</td>
                        <td>{{ $boleta_parcial1->civico1 }}</td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2 text-sm font-light text-gray-900 whitespace-nowrap">
                            Sistema Digital</td>
                        <td>{{ $boleta_parcial1->sistema1 }}</td>
                    </tr>
                 
                </tbody>
            </table>
        </div>
        <div class="nota">
            <p><strong>Promedio:</strong> {{ $boleta_parcial1->promedio }}</p>
        </div>
        

      
    </div>

    <!-- Bootstrap JS (opcional, dependiendo de tus necesidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
