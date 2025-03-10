<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  </head>
<body class="container-fluid  vh-100 ">
          
    <div class="row position-relative ">
    <div class="col-8  m-auto d-flex justify-content-center align-items-center position-relative ">
    
    @if ($successedit)
    <span class="alert alert-success alerta position-absolute  w-5 top-0 mt-5 p-2">
        {{ $successedit }} 
    </span>
    
@endif

        </div>
    <div class=" col-8 m-auto bg-primary-subtle vh-100 ">

   
<div class="d-flex justify-content-between  mt-4 ">
    <div class="fs-5">Bienvenido, {{ $userlogged->name }} <a href="/editar/{{ $userlogged->id }}"><i class="bi bi-pencil"></i></a></div>
    <a href="/cerrar_sesion" class="btn btn-outline-danger">Cerrar sesión</a>

</div>

<div class="d-flex row justify-content-between align-items-center py-4 pb-4">

  <div class=" fs-4 col-md-8 ">
    Tus ToDos
    <a href="/crear" class="btn btn-outline-success">Crear un ToDo</a>

  </div>
  <div class="col-md-4">
    
    <form action="/buscar" class="d-flex" role="search" method="POST">
      @csrf
    <input name="nombre_asunto" class="form-control me-2" type="search" placeholder="Buscar por asunto..." aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
      <a class="d-flex me-2 ms-2 fs-4 align-items-center" href="/index"><i class="bi bi-arrow-clockwise"></i></a>

    </form>
    </div>

</div>

<div>
  <?php 
  if(count($todos)>0){
    ?>
    <table class="table table-stripped">
      <tr>
        <th>Asunto</th>
        <th>Comentarios</th>
        <th>Estado</th>
        <th>Fecha de creación</th>
        <th>Opciones</th>
      </tr>
      <?php 
        foreach($todos as $todo){
          ?>
          <tr >
            <td> <?php echo $todo["asunto"] ?> </td>
            <td> <?php echo $todo["comentarios"] ?> </td>
            <td> <?php echo $todo["estado"] ? "Completado" : "Sin completar" ?> </td>
            <td> <?php echo $todo["created_at"]  ?> </td>
            <td class="d-flex gap-3">
            <form method="POST" action="/editarTodo/{{ $todo["id"] }}"> @csrf<button type="submit" class="btn btn-outline-warning" >Editar</button></form>
            <form method="POST" action="/eliminar/{{ $todo["id"] }}"> @csrf<button type="submit" class="btn btn-outline-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar este Todo?')">Eliminar</button></form>
            <form method="POST" action="/cambiarEstado/{{ $todo["id"] }}"> @csrf <button type="submit" class="btn {{ $todo["estado"] ? "btn-outline-danger" : "btn-outline-success" }}" class=" " >{{ $todo["estado"] ? "Desmarcar" : "Marcar como completado" }}</button></form>
          </td>
            
          </tr>
          <?php  
        }
          
          
          ?>
          </table>
    
    
    <?php 
     
    

  }else{
    echo "No tienes todos actualmente";
  }
   
   ?>
</div>




        
      
   
          

        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>