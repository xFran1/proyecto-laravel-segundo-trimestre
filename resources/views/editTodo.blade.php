<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body class="container-fluid  d-flex flex-column">
    
        <div class=" row d-flex justify-content-center align-items-center vh-100">
        <div class="col-6">
        <h2>Editar datos</h2>
      
    <div class="card-body">
                <form action="/updateTodo" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $todo->id }}">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Asunto</label>
                        <input type="text" name="asunto" value="{{ $todo->asunto }}" class="form-control" id="formGroupExampleInput" placeholder="Enter Full Name">
                        @error('asunto')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Comentarios</label>
                        <input type="text" name="comentarios" value="{{ $todo->comentarios }}" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                        @error('comentarios')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="completado" class="form-label">Completado</label>
                        <input name="completado" type="checkbox" id="completado" {{ $todo->estado ? 'checked' : '' }}>
                    </div>
                   
                   
                    <div class="d-flex justify-content-between w-100">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                        <a href="/index" class="btn btn-link">Home</a>
                    </div>

                </form>
            </div>
          

        </div>
        </div>
    </div>
</body>
</html>