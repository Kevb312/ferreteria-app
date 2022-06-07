@extends('plantilla')


@section('title') Ferreteria - Detalle cotización @endsection

@section('css') 

@endsection

@section('content')
<div class="container">
	<div class="jumbotron">
      <h5 class="font-weight-bold">Detalles para cotización</h5>
        <form method="POST" action="{{route('guardarCotizacion')}}"  enctype="multipart/form-data">
            @csrf
        @foreach($refaccion as $r)
      	<div class="form-group">
	        <label for="inputId" class="font-weight-bold">ID seleccionado</label>
	        <input type="text" class="form-control" id="inputId"  value="{{$r->refaccion_proveedor_id}}" required disabled>
      	</div>

      	<div class="form-group">
            <label for="inputName" class="font-weight-bold">Nombre de la marca</label>
            <input type="text" class="form-control" id="inputName"  value="{{$r->marca_nombre}}" required disabled>
      	</div>

        <div class="form-group">
            <label for="inputNameRefaccion" class="font-weight-bold">Nombre de la refacción</label>
            <input type="text" class="form-control" id="inputNameRefaccion"  value="{{$r->refaccion_nombre}}" required disabled>
        </div>

        <div class="form-group">
            <label for="inputDescripcion" class="font-weight-bold">Descripción de la refacción</label>
            <input type="text" class="form-control" id="inputDescripcion"  value="{{$r->refaccion_descripcion}}" required disabled>
        </div>

        <div class="form-group">
            <label for="inputNameProveedor" class="font-weight-bold">Nombre del proveedor</label>
            <input type="text" class="form-control" id="inputNameProveedor"  value="{{$r->proveedor_nombre}}" required disabled>
        </div>

        <div class="form-group">
            <label for="inputFecha" class="font-weight-bold">Fecha en que se solicitó el precio</label>
            <input type="date" class="form-control" id="inputFecha"  value="{{$r->created_at}}" required disabled>
        </div>

        <div class="form-group">
            <label for="inputPrecio" class="font-weight-bold">Precio de la refacción</label>
            <input type="number" class="form-control" id="inputPrecio"  value="{{$r->precio}}" required disabled>
        </div>

        <input type="hidden" name="inputId" value="{{$r->refaccion_proveedor_id}}">
        <input type="hidden" name="inputName" value="{{$r->marca_nombre}}">
        <input type="hidden" name="inputNameRefaccion" value="{{$r->marca_nombre}}">
        <input type="hidden" name="inputDescripcion" value="{{$r->refaccion_descripcion}}">
        <input type="hidden" name="inputNameProveedor" value="{{$r->proveedor_nombre}}">
        <input type="hidden" name="inputFecha" value="{{$r->created_at}}">
        <input type="hidden" name="inputPrecio" value="{{$r->precio}}">
        <input type="hidden" name="inputRefaccionProveedorId" value="{{$r->refaccion_proveedor_id}}">
        @endforeach
        <div class="form-group">
            <label for="inputPrecioIndividual" class="font-weight-bold">Incremento al precio individual $ (requerido)</label>
            <input type="number" class="form-control" id="inputPrecioIndividual" name="inputPrecioIndividual" placeholder="Incremento al precio" required>
        </div>

        <div class="form-group">
            <label for="inputPiezas" class="font-weight-bold">Número de piezas $ (requerido)</label>
            <input type="number" class="form-control" id="inputPiezas" name="inputPiezas" placeholder="Número de piezas" required>
        </div>

        <div class="form-group">
            <label for="inputManoObra" class="font-weight-bold">Costo por mano de obra $ (requerido)</label>
            <input type="number" class="form-control" id="inputManoObra" name="inputManoObra" placeholder="Costo por mano de obra" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Agregar a cotización actual</button>

            <button type="reset" class="btn btn-dark">Limpiar</button>
        </div>

        </form>
</div>
@endsection

@section('scripts')

@endsection