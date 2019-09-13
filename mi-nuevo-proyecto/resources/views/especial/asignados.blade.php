@extends('layouts.app')

@section('content')

@auth
<div class="container pt-6">

<div class="panel-title">

	<h1>Medicos Asignados</h1>

</div>
 <div class="row">
        <div class="col-md-8">
          
            <table class="table">
                <tr>
                	
                   
                    <th>Especialidad</th>
                    <th>Medico</th>
                    
                </tr>
                 @foreach ($masignados as $item)
                    <tr>
                        @foreach ($especialidades as $a)
                        	@if ($a->id == $item->id_especialidad)
	                        	<td>{{$a->nombre}}</td>
	                        	@break
                        	@endif
                        @endforeach
                        @foreach ($doctor as $s)
                        	@if ($s->id == $item->id_medico)
	                        	<td>{{$s->nombre}}</td>
	                        	@break
                        	@endif
                        @endforeach
                        
                        
                       <td>
                            <a href="{{route('veratencion' , $item->id)}}" class="btn btn-warning btn-sm">Detalle</a>
                            <form action="{{route('eliminaratencion' , $item->id)}}" method="POST" class="d-inline">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
               
               
            </table>
             @if (session('eliminaratencion'))
                <div class="alert alert-success mt-3">
                    {{session('eliminaratencion')}}
                </div>
            @endif
         
        </div>
        {{-- Fila formulario --}}
        <div class="col-md-4">



            @if (session('agregaratencion'))
                <div class="alert alert-success mt-3">
                    {{session('agregaratencion')}}
                </div>
            @endif
	

	<form method="POST" action="{{route('masignado')}}">
		{{ csrf_field() }}
			
		<div class="form-group">
				<label for="medico" class="control-label">Medico</label>
				<select class="form-control" name="medico">
					<option selected="" disabled="">Seleciona alguna opcion</option>
					@foreach ($doctor as $elemen)
						<option value="{{ $elemen->id }}">{{ $elemen->nombre }}</option>
					@endforeach
					
				</select>
			</div>
		<div class="form-group">
				<label for="especialidades" class="control-label">Especialidad</label>
				<select class="form-control" name="especialidad">
					<option selected="" disabled="">Seleciona alguna opcion</option>
					@foreach ($especialidades as $element)
						<option value="{{ $element->id }}">{{ $element->nombre }}</option>
					@endforeach
					
				</select>
			</div>
			
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i> Registrar Nueva Relacion
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