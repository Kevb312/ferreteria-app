@extends('plantilla')


@section('title') Ferreteria - Cotización en curso @endsection

@section('css') 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
<div class="container">
    <div class="jumbotron">
        <div class="card-header">
            <h5>Refacciones disponibles</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>Marca</th>
                        <th>Nombre Refacción</th>
                        <th>Descripción</th>
                        <th>Proveedor</th>
                        <th>Fecha de solicitud</th>
                        <th>Precio</th>
                        <th>Agregar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($refacciones as $refaccion)
                    <tr>
                        <td>{{$refaccion->marca_nombre}}</td>
                        <td>{{$refaccion->refaccion_nombre}}</td> 
                        <td>{{$refaccion->refaccion_descripcion}}</td> 
                        <td>{{$refaccion->proveedor_nombre}}</td> 
                        <td>{{$refaccion->created_at}}</td> 
                        <td>{{$refaccion->precio}}</td> 
                        <td><a href="{{route('detalleCotizacion', $refaccion->refaccion_proveedor_id)}}">Seleccionar</a></td> 
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Marca</th>
                        <th>Nombre Refacción</th>
                        <th>Descripción</th>
                        <th>Proveedor</th>
                        <th>Fecha de solicitud</th>
                        <th>Precio</th>
                        <th>Agregar</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap4.min.js"></script>
    <script type="text/javascript">
        
        $('#example').DataTable({
            responsive:true 
            ,
            autoWidth:false
        });

    </script>
@endsection