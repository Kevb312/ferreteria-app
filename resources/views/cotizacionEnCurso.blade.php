@extends('plantilla')


@section('title') Ferreteria - Cotización en curso @endsection

@section('css') 

@endsection

@section('content')

<div class="container">
	<div class="jumbotron">
      	<h2 class="font-weight-bold">La cotización en curso contiene la siguiente información:</h2>

      	<h3>Nombre del cliente: {{strtoupper($_SESSION['nombre_cliente'])}}</h3>
      	<h4>Descripción del coche: {{strtoupper($_SESSION['descripcion_coche'])}}</h4>
      	
      	<div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Refaccion</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th>Incremento</th>
                        <th>No. de piezas</th>
                        <th>Costo mano de obra</th>
                        <th>Costo parcial</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cotizacionDetalles as $detalle)
                    <tr>
                        
                            <td>{{$detalle->refaccion_nombre}}</td>
                            <td>{{$detalle->proveedor_nombre}}</td>
                            <td>{{$detalle->precio}}</td>
                            <td>{{$detalle->cotizacion_detalle_incremento}}</td>
                            <td>{{$detalle->cotizacion_detalle_numero_piezas}}</td>
                            <td>{{$detalle->cotizacion_detalle_mano_obra}}</td>
                            <td>{{$detalle->cotizacion_detalle_costo_parcial}}</td>
                            
                        
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="h1">
            Total a cobrar = ${{$total}}
        </div>
       <div class="h2">
            <p> <a href="{{route('cotizacionMarcaRefaccion')}}" class="btn btn-primary" role="button">Añadir más refacciones</a></p>
            <p> <a href="{{route('generarPDF')}}" target="_blank" class="btn btn-info" role="button">Imprimir esta cotización</a></p>
            <p> <a href="{{route('finalizarCotizacion')}}" class="btn btn-danger" role="button">Finalizar cotización</a></p>

        </div>
	</div>
</div>
@endsection

@section('scripts')

@endsection