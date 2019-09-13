@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="panel-title">

    <h1>Medicos Disponibles</h1>

</div>
 <div class="row">
        <div class="col-md-8">
          
            <table class="table">
                <tr>
                    
                    
                    <th>Nombre</th>
                    <th>Area Principal</th>
                    <th>Estado</th>
                    
                </tr>
                 @foreach ($doctor as $item)
                     @if ($item->estado==1)
                        <tr>
                        
                        <td>{{$item->nombre}}</td>
                        <td>{{$item->area_principal}}</td>
                        <td>@if ($item->estado ==1)
                            Activo
                            @else
                            Inactivo
                        @endif</td>
                        
                            
                    </tr>
                     @endif
                    
                @endforeach
               
               
            </table>
             
         
        </div>
        </div>
    </div>
</div>
@endsection
