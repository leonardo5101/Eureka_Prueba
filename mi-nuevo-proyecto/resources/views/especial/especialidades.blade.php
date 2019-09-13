@extends('layouts.app')

@section('content')

@auth
<div class="container pt-6">

<div class="panel-title">

	<h1>Especialidades</h1>

</div>
 <div class="row">
        <div class="col-md-8">
          <a href="{{route('masignados')}}" class="btn btn-default btn-sm">Doctores Asignados</a>
            <table class="table">
                <tr>
                	
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Consultorio</th>
                    <th>Doctores</th>
                    
                </tr>
                 @foreach ($especialidades as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->consultorio}}</td>
                        
                        	
                        <td>
                            <a href="{{route('editarespecialidad' , $item->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{route('eliminarespecialidad' , $item->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
               
               
            </table>
             @if (session('eliminarespecialidad'))
                <div class="alert alert-success mt-3">
                    {{session('eliminarespecialidad')}}
                </div>
            @endif
         
        </div>
        {{-- Fila formulario --}}
        <div class="col-md-4">



            @if (session('agregarespecialidad'))
                <div class="alert alert-success mt-3">
                    {{session('agregarespecialidad')}}
                </div>
            @endif
	

	<form method="POST" action="{{route('especialidad')}}">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="nombre" class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control">
		</div>
		<div class="form-group">
			<label for="consultorio" class="control-label">Consultorio</label>
			<input type="text" name="consultorio" class="form-control">

		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i> Registrar Nueva Especialidad
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