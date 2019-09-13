@extends('layouts.app')

@section('content')


<div class="col-sm-offset-3 col-sm-6">

<div class="panel-title">

	<h1>Atencion nº: 00{{ $atencionActualizar->id }}</h1>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<div class="panel-body">

	

	<form method="POST" action="{{route('updateatencion' , $atencionActualizar->id)}}">
		@method('PUT')
		@csrf

		<div class="form-group">
			<label for="area_principal" class="control-label">Especialidad</label>
			<select class="form-control" name="especialidad">
                
                @foreach ($especialidades as $element)
                	@if ($element->id==$atencionActualizar->id_especialidad)
                		<option selected="" value="{{ $element->id }}">{{ $element->nombre }}</option>
                	@else
                    <option value="{{ $element->id }}">{{ $element->nombre }}</option>
                    @endif
                @endforeach
            </select>
		</div>
	
		<div class="form-group">
			<label for="area_principal" class="control-label">Medico</label>
			<select class="form-control" name="medico">
                
                @foreach ($doctor as $elemen)
                	@if ($elemen->id==$atencionActualizar->id_medico)
                		<option selected="" value="{{ $elemen->id }}">{{ $elemen->nombre }}</option>
                	@else
                    <option value="{{ $elemen->id }}">{{ $elemen->nombre }}</option>
                    @endif
                @endforeach
            </select>
		</div>
		<div class="form-group">
			<label for="area_principal" class="control-label">Paciente</label>
			<select class="form-control" name="paciente">
                
                @foreach ($pacientes as $e)
                	@if ($e->id==$atencionActualizar->id_paciente)
                		<option selected="" value="{{ $e->id }}">{{ $e->nombre }}</option>
                	@else
                    <option value="{{ $e->id }}">{{ $e->nombre }}</option>
                    @endif
                @endforeach
            </select>
		</div>
		<div class="form-group">
				<label for="diagno" class="control-label">Diagnostico</label>
				<textarea class="form-control" name="diagnostico" placeholder="Ingresa un diagnostico del paciente" rows="5" cols="50">{{ $atencionActualizar->diagnostico }}</textarea>
			</div>
		
		
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i> Guardar Especialidad
				</button>
			</div>
		</div>
	</form>
	
</div>
</div>
</div></div></div>
</div>

@endsection