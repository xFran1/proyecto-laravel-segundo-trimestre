<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">

</head>
<body class="container-fluid  vh-100">
    
        <div class=" row d-flex justify-content-center align-items-center h-100 position-relative">
            
            
            <!-- @if ($fail) -->
            <div class="col-6  position-absolute d-flex justify-content-center top-0">
    <span class="text-center alert alert-success alerta  mt-5 p-2">
        {{ $fail }} 
    </span>
    </div>
        <!-- @endif -->
        <div class="col-6">
        <h2>Crear ToDo</h2>
      
    <div class="card-body">
                <form action="/crearTodo" method="post">
                    @csrf
                    
                    <div class="mb-5 mt-5 form-floating position-relative">
                        <input type="text" name="asunto" value="{{ old('asunto') }}" class="form-control" id="formGroupExampleInput" placeholder="Asunto">
                        <label for="formGroupExampleInput" class="form-label">Asunto</label>
                        @error('asunto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-5 form-floating position-relative">
                        <input type="text" name="comentarios" value="{{ old('comentarios') }}" class="form-control" id="formGroupExampleInput2" placeholder="Comentarios">
                        <label for="formGroupExampleInput2" class="form-label">Comentarios</label>
                        @error('comentarios')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                   
                    
                   
                    <div class="d-flex justify-content-between w-100">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="/index" class="btn btn-link">Volver</a>
                    </div>

                </form>
            </div>
          

        </div>
        </div>
    </div>
</body>
</html>