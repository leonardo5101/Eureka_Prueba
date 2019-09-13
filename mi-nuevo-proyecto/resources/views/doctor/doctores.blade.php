@extends('layouts.app')

@section('content')

@auth
<div class="container pt-6">

<div class="panel-title">

	<h1>Medicos</h1>

</div>
 <div class="row">
        <div class="col-md-8">
          
            <table class="table">
                <tr>
                	
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Area Principal</th>
                    <th>Estado</th>
                    
                </tr>
                 @foreach ($doctor as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->nombre}}</td>
                        @foreach ($especialidades as $a)
                            @if ($a->id == $item->area_principal)
                                <td>{{$a->nombre}}</td>
                                @break
                            @endif
                        @endforeach
                        <td>@if ($item->estado ==1)
                        	Activo
                        	@else
                        	Inactivo
                        @endif</td>
                        
                        	
                        <td>
                            <a href="{{route('editarmedico' , $item->id)}}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{route('eliminarmedico' , $item->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
               
               
            </table>
             @if (session('eliminarmedico'))
                <div class="alert alert-success mt-3">
                    {{session('eliminarmedico')}}
                </div>
            @endif
         
        </div>
        {{-- Fila formulario --}}
        <div class="col-md-4">



            @if (session('agregarmedico'))
                <div class="alert alert-success mt-3">
                    {{session('agregarmedico')}}
                </div>
            @endif
	

	<form method="POST" action="{{route('medico')}}">
		{{ csrf_field() }}

		<div class="form-group">
			<label for="nombre" class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control">
		</div>
		<div class="form-group">
			<label for="area_principal" class="control-label">Area Principal</label>
			<select class="form-control" name="area_principal">
                <option selected="" disabled="">Selecciona un Area</option>
                @foreach ($especialidades as $element)
                    <option value="{{ $element->id }}">{{ $element->nombre }}</option>
                @endforeach
            </select>

		</div>
		<div class="form-group">
			<label for="consultorio" class="control-label">Estado</label>
			<select class="form-control" name="estado">
				<option value=1 >Activo</option>
				<option value=0>No Activo</option>

			</select>

		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i> Registrar Nuevo Medico
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