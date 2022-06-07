@extends('plantilla')


@section('title') Ferreteria - Agregar refacción @endsection

@section('css') 

@endsection

@section('content')

<div class="container">
    <div class="jumbotron">
      <h5 class="font-weight-bold">Cotizar una Refaccion</h5>
        <form method="POST" action="{{route('guardarCotizacionRefaccion')}}"  enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="inputID" class="font-weight-bold">ID de la refaccion seleccionada </label>
            <input type="text" class="form-control" id="inputID"  required disabled value="{{$id}}">
            <input type="hidden" name="inputID" value="{{$id}}">
          </div>

        	<div class="form-group">
	            <label for="inputProveedor" class="font-weight-bold">Selecciona el provedor con el que estás cotizando la refacción (requerido)</label>
	              <div class="form-group">
	              	<select class="form-control" id="inputProveedor" name="inputProveedor">
		              	@foreach($proveedores as $proveedor)
					      <option value="{{$proveedor->proveedor_id}}">{{$proveedor->proveedor_nombre}}</option>
					    @endforeach
				    </select>
			      </div>
      		</div>

          <div class="form-group">
            <label for="inputDate" class="font-weight-bold">Fecha de solicitud de precio (requerido)</label>
            <input type="date" class="form-control" id="inputDate" name="inputDate"  required>
          </div>

        <div class="form-group">
            <label for="inputPrecio" class="font-weight-bold">Precio</label>
            <input type="number" class="form-control" id="inputPrecio" name="inputPrecio" required>
        </div>

        
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>

            <button type="reset" class="btn btn-dark">Limpiar</button>
        </div>


        @if (isset($messageFail))
            <div class="form-group">
                <div class="alert alert-danger">
                    <ul>
                            <li>{{ $messageFail }}</li>
                    </ul>
                </div>
            </div>
        @endif
        </form>


    </div>
</div>

@endsection

@section('scripts')

@endsection