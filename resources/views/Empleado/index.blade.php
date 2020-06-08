@extends('layouts.layout')
@section('content')
<div class="row">
  <section class="content">
    <div class="col-md-8 col-md-offset-2">
      <div class="panel panel-default">
        <div class="panel-body">
          <div class="pull-left"><h3>Lista Empleados</h3></div>
          <div class="pull-right">
            <div class="btn-group">
              <a href="{{ route('empleado.create') }}" class="btn btn-info" >Añadir Empleado</a>
            </div>
          </div>
          <div class="table-container">
            <table id="mytable" class="table table-bordred table-striped">
             <thead>
               <th>Nombre</th>
               <th>Apellido</th>
               <th>Cedula</th>
               <th>Email</th>
               <th>Sexo</th>
               <th>Telefono</th>
               <th>Editar</th>
               <th>Eliminar</th>
             </thead>
             <tbody>
              @if($empleado->count())  
              @foreach($empleados as $empleado)  
              <tr>
                <td>{{$empleado->nombres}}</td>
                <td>{{$empleado->apellidos}}</td>
                <td>{{$empleado->cedula}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->sexo}}</td>
                <td>{{$empleado->telefono}}</td>
                <td><a class="btn btn-primary btn-xs" href="{{action('EmpleadosController@edit', $empleado->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                <td>
                  <form action="{{action('EmpleadosController@destroy', $empleado->id)}}" method="post">
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
 
                   <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                 </td>
               </tr>
               @endforeach 
               @else
               <tr>
                <td colspan="8">No hay registro !!</td>
              </tr>
              @endif
            </tbody>
 
          </table>
        </div>
      </div>
      {{ $empleado->links() }}
    </div>
  </div>
</section>
 
@endsection