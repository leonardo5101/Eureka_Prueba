@extends('layouts.app')

@section('content')


<div class="col-sm-offset-3 col-sm-6">

<div class="panel-title">

	<h1>Paciente: {{ $pacienteActualizar->nombre }}</h1>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<div class="panel-body">

	

	<form method="POST" action="{{route('updatepaciente' , $pacienteActualizar->id)}}">
		@method('PUT')
		@csrf

		<div class="form-group">
			<label for="nombre" class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{ $pacienteActualizar->nombre }}">
		</div>
		<div class="form-group">
			<label for="Documento" class="control-label">Documento</label>
			<input type="text" name="documento" class="form-control" value="{{ $pacienteActualizar->documento }}">

		</div>
		<div class="form-group">
			<label for="edad" class="control-label">Edad</label>
			<input type="text" name="edad" class="form-control" value="{{ $pacienteActualizar->edad }}">
		</div>
		<div class="form-group">
			<label for="peso" class="control-label">Peso</label>
			<input type="text" name="peso" class="form-control" value="{{ $pacienteActualizar->peso }}">
		</div>
		<div class="form-group">
			<label for="telefono" class="control-label">Telefono</label>
			<input type="text" name="telefono" class="form-control" value="{{ $pacienteActualizar->telefono }}">
		</div>
		<div class="form-group">
			<label for="talla" class="control-label">Talla</label>
			<input type="text" name="talla" class="form-control" value="{{ $pacienteActualizar->talla }}">
		</div>
		<div class="form-group">
			<div class="col-sm-offset-3 col-sm-6">
				<button type="submit" class="btn btn-default">
					<i class="fa fa-plus"></i> Guardar Paciente
				</button>
			</div>
		</div>
	</form>
	
</div>
</div>
</div></div></div>
</div>

@endsection