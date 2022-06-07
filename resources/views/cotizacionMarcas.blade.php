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
            <h5>Debe elegir una marca</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Seleccionar </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($marcas as $marca)
                    <tr>
                        <td>{{$marca->marca_id}}</td>
                        <td>{{$marca->marca_nombre}}</td> 
                        <td><a href="{{route('consultaRefaccionCotizacion', $marca->marca_id)}}">Seleccionar</a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Seleccionar </th>
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