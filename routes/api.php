<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Empleado;
use App\Empresa;

//listar empresas

Route::get('empresas', function(){
	$empresas = Empresa::get();
   return $empresas;
});

//crear una empresa

Route::post('empresas', function(Request $request){
	$request->validate([
		'nombre' => 'required|max:50',
	]);
	$empresas  = new Empresa;
	$empresas->nombre = $request->input('nombre');
	$empleado->save();
	return "Empresa creada";
});

//actualizar Banco

Route::put('empresas/{id}', function(Request $request, $id){
	$request->validate([
		'nombre' => 'required|max:50',
	]);
	$empresas  = Empresa::findOrFail($id);
	$empresas->nombre = $request->input('nombre');
	$empresas->save();
	return "Empresa actualizada correctamente";
});

//eliminar banco

Route::delete('empresas/{id}', function(Request $request, $id){
	$empresas  = Empresa::findOrFail($id);
	$empresas->delete();
	return "Banco eliminado exitosamente";
}); 

//listar

Route::get('empleados', function(){
	$empleados = Empleado::get();
   return $empleados;
});

//ruta para crear empleados
Route::post('empleados', function(Request $request){
	$request->validate([
		'nombres' => 'required|max:50',
		'apellidos' => 'required|max:50',
		'cedula' =>  'numeric|required|unique:empleados|min:1|max:9999',
		'email' => 'required|email|unique:empleados|max:50',
		'sexo' => 'required|max:10',
		'telefono' => 'required|numeric||max:9999999999,'
	]);
	$empleado  = new Empleado;
	$empleado->nombres = $request->input('nombres');
	$empleado->apellidos = $request->input('apellidos');
	$empleado->cedula = $request->input('cedula');
	$empleado->email = $request->input('email');
	$empleado->sexo = $request->input('sexo');
	$empleado->telefono = $request->input('telefono');
	$empleado->empresa_id = $request->input('empresa_id');
	return "Empleado creado";
});

//actialuzar empleados
Route::put('empleados/{id}', function(Request $request, $id){
	$request->validate([
		'nombres' => 'required|max:50',
		'apellidos' => 'required|max:50',
		'cedula' =>  'numeric|required|unique:empleados,cedula|min:1|max:9999' .$id,
		'email' => 'required|email|unique:empleados,email|max:50' .$id,
		'sexo' => 'required|max:10',
		'telefono' => 'required|numeric||max:9999999999,'
	]);
	$empleado  = Empleado::findOrFail($id);
	$empleado->nombres = $request->input('nombres');
	$empleado->apellidos = $request->input('apellidos');
	$empleado->cedula = $request->input('cedula');
	$empleado->email = $request->input('email');
	$empleado->sexo = $request->input('sexo');
	$empleado->telefono = $request->input('telefono');
	$empleado->save();
	return "Empleado actualizado";
});

Route::delete('empleados/{id}', function(Request $request, $id){
	$empleado  = Empleado::findOrFail($id);
	$empleado->delete();
	return "Empleado eliminado exitosamente";
});

