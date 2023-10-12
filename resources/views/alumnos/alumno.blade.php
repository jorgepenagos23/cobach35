
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>ALUMNO</title>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.rtl.min.css" integrity="sha384-PRrgQVJ8NNHGieOA1grGdCTIt4h21CzJs6SnWH4YMQ6G5F5+IEzOHz67L4SQaF0o" crossorigin="anonymous">
        <!-- Custom CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    
        <
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="columns-md-12">
                    @if (Session::has('success'))
                    <div class="alert alert-success d-flex align-items-center" role="alert">
                        <svg class="flex-shrink-0 bi me-2" role="img" aria-label="Success:"><use xlink:href="#check-circle-fill"/></svg>
                        <div>
                         {{ Session::get('success') }}
                        </div>
                      </div>
                    @endif
                </div>
    
                <div class="col-md-12">
                    <form class="row g-3" action="{{ route('import') }}" method="post" enctype="multipart/form-data">                        @csrf
                        <div class="col-auto">
                            <label class="visually-hidden">Excel Alumno </label>
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
            </div>
        </div>
    
    <div class="container">
        <h1>ALUMNOS</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">N</th>
                    <th scope="col">Grado</th>
                    <th scope="col">Grupo</th>
                    <th scope="col">Matricula</th>
                    <th scope="col">Nombre Completo</th>
                    <th scope="col">Curp</th>
                    <th scope="col">Observaciones</th>

    
    
                </tr>
                </thead>
    
    
                <tbody>
                    @if (count($alumnos))
                    @foreach ($alumnos as $alumno)
                        <tr>
                            <th scope="row">{{$alumno->id}}</th>
                            <td>{{$alumno->n}}</td>
                            <td>{{$alumno->grado}}</td>
                            <td>{{$alumno->grupo}}</td>
                            <td>{{$alumno->matricula}}</td>
                            <td>{{$alumno->nombre_completo}}</td>
                            <td>{{$alumno->curp}}</td>
                            <td>{{$alumno->observaciones}}</td>



                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td>No se encontraron alumnos</td>
                    </tr>
                @endif
    
                </tbody>
            </table>
        </div>
    </div>
    
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
    </html>
    
