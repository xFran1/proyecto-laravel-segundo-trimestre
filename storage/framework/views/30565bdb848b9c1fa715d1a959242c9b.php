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
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="id" value="<?php echo e($todo->id); ?>">
                    <div class="mb-3">
                        <label for="formGroupExampleInput" class="form-label">Asunto</label>
                        <input type="text" name="asunto" value="<?php echo e($todo->asunto); ?>" class="form-control" id="formGroupExampleInput" placeholder="Enter Full Name">
                        <?php $__errorArgs = ['asunto'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="formGroupExampleInput2" class="form-label">Comentarios</label>
                        <input type="text" name="comentarios" value="<?php echo e($todo->comentarios); ?>" class="form-control" id="formGroupExampleInput2" placeholder="Enter Email">
                        <?php $__errorArgs = ['comentarios'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                    <div class="mb-3">
                        <label for="completado" class="form-label">Completado</label>
                        <input name="completado" type="checkbox" id="completado" <?php echo e($todo->estado ? 'checked' : ''); ?>>
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
</html><?php /**PATH C:\Users\franr\Desktop\Proyecto-Laravel2\resources\views/editTodo.blade.php ENDPATH**/ ?>