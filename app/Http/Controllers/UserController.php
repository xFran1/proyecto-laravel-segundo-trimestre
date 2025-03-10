<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Todo;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //Aqui crear toda la lógica del crud

   public function index(){
    $todos = Todo::where('id_usuario', Auth::id())->get();
    return view('dashboard', [
        'userlogged' => Auth::user(),
        'id' => Auth::id(),
        'successedit' => session('successedit', null), // Si no existe, no pasará nada
        'todos' => $todos
    ]);
   }
   public function buscar(Request $request)
{
    // Obtener el valor del campo de búsqueda
    $nombreAsunto = $request->input('nombre_asunto');

    // Realizar la consulta a la base de datos para encontrar coincidencias
    $resultados = Todo::where('asunto', 'LIKE', "%$nombreAsunto%")
    ->where('id_usuario', Auth::user()->id)
    ->get();
    
    return view('dashboard', [
        'userlogged' => Auth::user(),
        'id' => Auth::id(),
        'successedit' => session('successedit', null), // Si no existe, no pasará nada
        'todos' => $resultados
    ]);
}

   public function edit($id)
{
    $user = User::findOrFail($id);

    // Comprobamos que el usuario autenticado sea el mismo que el del ID
    if ($user->id !== Auth::id()) {
        abort(403, 'No tienes permiso para editar estos datos.');
    }

    return view('edit', compact('user'));
}
public function EditarDatos(Request $request){
    $request->validate([
        'full_name' => 'required|string',
        'email' => 'required|email|unique:users',
        'password' => 'nullable|confirmed|min:4|max:8',
    ]);

    try {
        // Buscar al usuario por el ID
        $user = User::findOrFail(Auth::id()); 

        // Actualizar los campos del usuario
        $user->name = $request->full_name;
        $user->email = $request->email;

        // Solo actualizamos la contraseña si el usuario la ha proporcionado
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        // Guardar los cambios
        $user->save();

        // Redirigir con mensaje de éxito
        return redirect()->route('index')->with("successedit", "Datos actualizados con éxito");

    } catch (\Exception $e) {
        // Redirigir con mensaje de error
        return redirect()->back()->with("fail", "Error al actualizar los datos: " . $e->getMessage());
    }
   

}


public function cerrar_sesion(){
    Auth::logout(); // Cierra la sesión

    return redirect('/login')->with("success","Se ha cerrado sesión con exito");
}
    
}
