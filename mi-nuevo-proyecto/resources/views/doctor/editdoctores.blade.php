@extends('layouts.app')

@section('content')


<div class="col-sm-offset-3 col-sm-6">

<div class="panel-title">

	<h1>Medico: {{ $medicoActualizar->nombre }}</h1>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<div class="panel-body">

	

	<form method="POST" action="{{route('updatemedico' , $medicoActualizar->id)}}">
		@method('PUT')
		@csrf

		<div class="form-group">
			<label for="nombre" class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{ $medicoActualizar->nombre }}">
		</div>
	
		<div class="form-group">
			<label for="area_principal" class="control-label">Area Principal</label>
			<select class="form-control" name="area_principal">
                
                @foreach ($especialidades as $element)
                	@if ($element->id==$medicoActualizar->area_principal)
                		<option selected="" value="{{ $element->id }}">{{ $element->nombre }}</option>
                	@else
                    <option value="{{ $element->id }}">{{ $element->nombre }}</option>
                    @endif
                @endforeach
            </select>
		</div>
		<div class="form-group">
			<label for="consultorio" class="control-label">Estado</label>
			<select class="form-control" name="estado">
				@if ($medicoActualizar->estado ==1)
					<option selected="" value=1 >Activo</option>
					<option value=0>No Activo</option>
				@else
					<option value=1 >Activo</option>
					<option selected="" value=0>No Activo</option>
				@endif

			</select>

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