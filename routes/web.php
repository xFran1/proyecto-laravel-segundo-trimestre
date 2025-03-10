<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ToDoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

 

Route::get("/",[LoginController::class,'loadSignUp']); // Cargar registro

Route::post("/register/user",[LoginController::class,'ComprobarUserRegistro'])->name('ComprobarUserRegistro'); // Añadir usuario

Route::post("/login/user",[LoginController::class,'ComprobarUserInicio'])->name('ComprobarUserInicio'); // Añadir usuario

Route::get("/login",[LoginController::class,'loadLogin'])->name('login'); // Cargar inicio sesión

Route::middleware(['auth'])->group(function () {
    
    Route::get('/index', [UserController::class, 'index'])->name('index'); 
    
    Route::get('/profile', [UserController::class, 'show']);

    Route::get('/editar/{id}', [UserController::class, 'edit']);

    Route::post("/editarDatos",[UserController::class,'EditarDatos']); // Cargar inicio sesión
    
    Route::get("/crear",[ToDoController::class,'crear']); // Cargar inicio sesión
    
    Route::post("/crearTodo",[ToDoController::class,'crearTodo']); // Cargar inicio sesión
   
    Route::post("/editarTodo/{id}",[ToDoController::class,'editarTodo']); // Cargar inicio sesión
    
    Route::post("/updateTodo",[ToDoController::class,'updateTodo']); // Cargar inicio sesión
    
    Route::get("/cerrar_sesion",[UserController::class,'cerrar_sesion']); // Cerrar sesión
   
    Route::post("/eliminar/{id}",[ToDoController::class,'eliminar']); // Cerrar sesión
    
    Route::post("/cambiarEstado/{id}",[ToDoController::class,'cambiarEstado']); // Cerrar sesión
    
    Route::post("/buscar",[UserController::class,'buscar']); // Cerrar sesión
});

