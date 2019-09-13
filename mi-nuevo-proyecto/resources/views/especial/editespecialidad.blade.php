@extends('layouts.app')

@section('content')


<div class="col-sm-offset-3 col-sm-6">

<div class="panel-title">

	<h1>Especialidad: {{ $especialidadActualizar->nombre }}</h1>

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

<div class="panel-body">

	

	<form method="POST" action="{{route('updateespecialidad' , $especialidadActualizar->id)}}">
		@method('PUT')
		@csrf

		<div class="form-group">
			<label for="nombre" class="control-label">Nombre</label>
			<input type="text" name="nombre" class="form-control" value="{{ $especialidadActualizar->nombre }}">
		</div>
		<div class="form-group">
			<label for="Documento" class="control-label">Consultorio</label>
			<input type="text" name="consultorio" class="form-control" value="{{ $especialidadActualizar->consultorio }}">

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