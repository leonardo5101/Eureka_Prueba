@extends('layouts.app')

@section('content')
@auth

<div class="container pt-6">

<div class="panel-title">

	<h1>Pacientes</h1>

</div>
 <div class="row">
        <div class="col-md-8">
          
            <table class="table">
                <tr>
                	
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Peso</th>
                    <th>Talla</th>
                    <th>Edad</th>
                    <th>Telefono</th>
                    <th>Documento</th>
                </tr>
                 @foreach ($pacient as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->peso}}</td>
                        <td>{{$item->talla}}</td>
                        <td>{{$item->edad}}</td>
                        <td>{{$item->telefono}}</td>
                        <td>{{$item->documento}}</td>
                        
                        <td>
                            <a href="{{route('editarpaciente' , $item->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{route('eliminarpaciente' , $item->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
               
               
            </table>
             @if (session('eliminarpaciente'))
                <div class="alert alert-success mt-3">
                    {{session('eliminarpaciente')}}
                </div>
            @endif
         
        </div>
        {{-- Fila formulario --}}
        <div class="col-md-4">



	
 @if (session('agregarpaciente'))
                <div class="alert alert-success mt-3">
                    {{session('agregarpaciente')}}
                </div>
            @endif
	<form method="POST" action="{{route('paciente')}}">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="nombre" class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control">
		</div>
		<div class="form-group">
			<label for="Documento" class="control-label">Documento</label>
			<input type="text" name="documento" class="form-control">

		</div>
		<div class="form-group">
			<label for="edad" class="control-label">Edad</label>
			<input type="text" name="edad" class="form-control">
		</div>
		<div class="form-group">
			<label for="peso" class="control-label">Peso</label>
			<input type="text" name="peso" class="form-control">
		</div>
		<div class="form-group">
			<label for="telefono" class="control-label">Telefono</label>
			<input type="text" name="telefono" class="form-control">
		</div>
		<div class="form-group">
			<label for="talla" class="control-label">Talla</label>
			<input type="text" name="talla" class="form-control">
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i> Registrar Nuevo Paciente
				</button>
			</div>
		</div>
	</form>
	
           
        </div>
        {{-- Fin fila formulario --}}
    </div>
</div>
@endauth
@endsection