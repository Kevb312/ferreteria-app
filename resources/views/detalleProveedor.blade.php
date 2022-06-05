@extends('plantilla')


@section('title') Ferreteria - Detalle proveedor @endsection

@section('css') 

@endsection

@section('content')
	<div class="container">
		<div class="jumbotron">
			<h2>Detalles del proveedor</h2>
			<div class="table-responsive">
                <table class="table">
                	<thead>
	                    <th>Campo</th>
	                    <th>Valor</th>
                    </thead>
                    <tbody>
                    	@foreach($proveedorDetalle as $proveedor)
                        <tr>
                            <td>Id del Proveedor</td>
                            <td>{{$proveedor->proveedor_id}}</td>
                        </tr>
                        <tr>
                            <td>Nombre</td>
                            <td>{{$proveedor->proveedor_nombre}}</td>
                        </tr>
                        <tr>
                            <td>Direcci&oacute;n</td>
                            <td>{{$proveedor->proveedor_direccion}}</td>
                        </tr>
                        <tr>
                            <td>Tel&eacute;fono Proveedor</td>
                            <td>{{$proveedor->proveedor_telefono}}</td>
                        </tr>
                        <tr>
                            <td>Tel&eacute;fono 2</td>
                            <td>{{$proveedor->proveedor_telefono_2}}</td>
                        </tr>
                        <tr>
                            <td>Correo-e</td>
                            <td>{{$proveedor->proveedor_correo}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('proveedorList')}}">REGRESAR</a>
            </div>
		</div>
	</div>
@endsection

@section('scripts')

@endsection