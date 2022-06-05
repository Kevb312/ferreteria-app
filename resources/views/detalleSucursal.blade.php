@extends('plantilla')


@section('title') Ferreteria - Detalle sucursal @endsection

@section('css') 

@endsection

@section('content')
	<div class="container">
		<div class="jumbotron">
			<h2>Detalles de la sucursal</h2>
			<div class="table-responsive">
                <table class="table">
                	<thead>
	                    <th>Campo</th>
	                    <th>Valor</th>
                    </thead>
                    <tbody>
                    	@foreach($sucursalDetalle as $sucursal)
                        <tr>
                            <td>Id de la sucursal</td>
                            <td>{{$sucursal->sucursal_id}}</td>
                        </tr>

                        <tr>
                            <td>Proveedor</td>
                            <td>{{$sucursal->proveedor_nombre}}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{$sucursal->sucursal_nombre}}</td>
                        </tr>
                        <tr>
                            <td>Direcci&oacute;n</td>
                            <td>{{$sucursal->sucursal_direccion}}</td>
                        </tr>
                        <tr>
                            <td>Tel&eacute;fono sucursal</td>
                            <td>{{$sucursal->sucursal_telefono}}</td>
                        </tr>
                        <tr>
                            <td>Tel&eacute;fono 2</td>
                            <td>{{$sucursal->sucursal_telefono_2}}</td>
                        </tr>
                        <tr>
                            <td>Correo-e</td>
                            <td>{{$sucursal->sucursal_correo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('sucursalList')}}">REGRESAR</a>
            </div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection