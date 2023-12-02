<!-- resources/views/boleta_parcial1/index.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
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
    <div class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-gray-50 sm:py-12">
        <img src="/img/beams.jpg" alt="" class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-none" width="1308" />
        <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
          <div class="max-w-md mx-auto">
            <img src="/img/logo.svg" class="h-6" alt="Tailwind Play" />
            <div class="divide-y divide-gray-300/50">
              <div class="py-8 space-y-6 text-base leading-7 text-gray-600">
                <p>An advanced online playground for Tailwind CSS, including support for things like:</p>
                <ul class="space-y-4">
                  <li class="flex items-center">
                    <svg class="flex-none w-6 h-6 stroke-2 fill-sky-100 stroke-sky-500" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="11" />
                      <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
                    </svg>
                    <p class="ml-4">
                      Customizing your
                      <code class="text-sm font-bold text-gray-900">tailwind.config.js</code> file
                    </p>
                  </li>
                  <li class="flex items-center">
                    <svg class="flex-none w-6 h-6 stroke-2 fill-sky-100 stroke-sky-500" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="11" />
                      <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
                    </svg>
                    <p class="ml-4">
                      Extracting classes with
                      <code class="text-sm font-bold text-gray-900">@apply</code>
                    </p>
                  </li>
                  <li class="flex items-center">
                    <svg class="flex-none w-6 h-6 stroke-2 fill-sky-100 stroke-sky-500" stroke-linecap="round" stroke-linejoin="round">
                      <circle cx="12" cy="12" r="11" />
                      <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
                    </svg>
                    <p class="ml-4">Code completion with instant preview</p>
                  </li>
                </ul>
                <p>Perfect for learning how the framework works, prototyping a new idea, or creating a demo to share online.</p>
              </div>
              <div class="pt-8 text-base font-semibold leading-7">
                <p class="text-gray-900">Want to dig deeper into Tailwind?</p>
                <p>
                  <a href="https://tailwindcss.com/docs" class="text-sky-500 hover:text-sky-600">Read the docs &rarr;</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
<div class="relative flex flex-col justify-center min-h-screen py-6 overflow-hidden bg-gray-50 sm:py-12">
  <img src="/img/beams.jpg" alt="" class="absolute -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 max-w-none" width="1308" />
  <div class="relative px-6 pt-10 pb-8 bg-white shadow-xl ring-1 ring-gray-900/5 sm:mx-auto sm:max-w-lg sm:rounded-lg sm:px-10">
    <div class="max-w-md mx-auto">
      <img src="/img/logo.svg" class="h-6" alt="Tailwind Play" />
      <div class="divide-y divide-gray-300/50">
        <div class="py-8 space-y-6 text-base leading-7 text-gray-600">
          <p>An advanced online playground for Tailwind CSS, including support for things like:</p>
          <ul class="space-y-4">
            <li class="flex items-center">
              <svg class="flex-none w-6 h-6 stroke-2 fill-sky-100 stroke-sky-500" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="11" />
                <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
              </svg>
              <p class="ml-4">
                Customizing your
                <code class="text-sm font-bold text-gray-900">tailwind.config.js</code> file
              </p>
            </li>
            <li class="flex items-center">
              <svg class="flex-none w-6 h-6 stroke-2 fill-sky-100 stroke-sky-500" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="11" />
                <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
              </svg>
              <p class="ml-4">
                Extracting classes with
                <code class="text-sm font-bold text-gray-900">@apply</code>
              </p>
            </li>
            <li class="flex items-center">
              <svg class="flex-none w-6 h-6 stroke-2 fill-sky-100 stroke-sky-500" stroke-linecap="round" stroke-linejoin="round">
                <circle cx="12" cy="12" r="11" />
                <path d="m8 13 2.165 2.165a1 1 0 0 0 1.521-.126L16 9" fill="none" />
              </svg>
              <p class="ml-4">Code completion with instant preview</p>
            </li>
          </ul>
          <p>Perfect for learning how the framework works, prototyping a new idea, or creating a demo to share online.</p>
        </div>
        <div class="pt-8 text-base font-semibold leading-7">
          <p class="text-gray-900">Want to dig deeper into Tailwind?</p>
          <p>
            <a href="https://tailwindcss.com/docs" class="text-sky-500 hover:text-sky-600">Read the docs &rarr;</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="bg-blue-500">
<h1>hola </h1></div>
      <style>
.bg-blue-500 {
    background-color: #3490dc;
}


      </style>
</body>
</html>
