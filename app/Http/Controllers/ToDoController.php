<?php 
 namespace App\Http\Controllers;
 use App\Models\Todo;
 use App\Models\User;
 use Illuminate\Support\Facades\Auth;


 use Illuminate\Http\Request;


 class ToDoController extends Controller{

    public function crear(){
        return view('crear', [
            'fail' => session('fail', null), // Si no existe, no pasará nada
            
        ]);
    }

    public function eliminar($id){
        Todo::destroy($id);

        return redirect()->route('index')->with('successedit', 'Todo eliminado correctamente');


    }

    public function cambiarEstado($id){
        $todo = Todo::findOrFail($id);

        $todo->estado=!$todo->estado;
        $todo->save();

        return redirect()->route('index')->with('successedit', 'Se ha cambiado el estado correctamente');


    }

    public function crearTodo(Request $request){
        $request->validate([
            'asunto' => 'required|string|min:4',
            'comentarios' => 'required|string|min:4',
        ]);

        try {
            // register user here
            $new_todo = new Todo;
            $new_todo->id_usuario = Auth::user()->id;
            $new_todo->asunto = $request->asunto;
            $new_todo->comentarios = $request->comentarios;
            $new_todo->estado = false;
            $new_todo->save();
    
            return redirect('/index')->with("successedit","ToDo añadido con exito");
            
        } catch (\Exception $e) {
            return redirect('/crear')->with("fail","Error al crear el ToDo, has excedido el límite de palabras");
        }

       

    }

    public function editarTodo($id){
        
        $todo = Todo::findOrFail($id);
        return view('editTodo', 
        compact('todo'));// Si no existe, no pasará nada
            
    }

    

    public function updateTodo(Request $request){
        $request->validate([
            'asunto' => 'required|string|min:4',
            'comentarios' => 'required|string|min:4',
        ]);

        $new_todo = Todo::findOrFail($request->id);
            $new_todo->asunto = $request->asunto;
            $new_todo->comentarios = $request->comentarios;
            if($request->completado=="on"){
                $new_todo->estado = true;

            }else{
                $new_todo->estado = false;

            }
            $new_todo->save();


        return redirect('/index')->with("successedit","Se ha editado correctamente");
    }

        

       

    }


    


 

 
 ?>