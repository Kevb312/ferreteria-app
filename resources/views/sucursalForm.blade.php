@extends('plantilla')


@section('title') Ferreteria - Agregar refacción @endsection

@section('css') 

@endsection

@section('content')
<div class="container">
	<div class="jumbotron">
      <h5 class="font-weight-bold">Registrar una Sucursal</h5>
        <form method="POST" action="{{route('guardarSucursal')}}"  enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="inputProveedor" class="font-weight-bold">Nombre del Proveedor (requerido)</label>
              <div class="form-group">
              	<select class="form-control" id="inputProveedor" name="inputProveedor">
              	@foreach($proveedores as $proveedor)
			      <option value="{{$proveedor->proveedor_id}}">{{$proveedor->proveedor_nombre}}</option>
			    @endforeach
			    </select>
		      </div>
          </div>

        <div class="form-group">
            <label for="inputName" class="font-weight-bold">Nombre de la sucursal</label>
            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="INGRESA NOMBRE DE LA SUCURSAL" required>
        </div>

        <div class="form-group">
            <label for="inputDireccion" class="font-weight-bold">Dirección</label>
            <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" placeholder="INGRESA DIRECCIÓN" required>
        </div>

        <div class="form-group">
            <label for="inputTel1" class="font-weight-bold">Teléfono</label>
            <input type="number" class="form-control" id="inputTel1" name="inputTel1" placeholder="INGRESA PRIMER TELÉFONO" required>
        </div>

        <div class="form-group">
            <label for="inputTel2" class="font-weight-bold">Teléfono 2</label>
            <input type="number" class="form-control" id="inputTel2" name="inputTel2" placeholder="INGRESA PRIMER TELÉFONO" required>
        </div>

        <div class="form-group">
            <label for="inputCorreo" class="font-weight-bold">Correo electrónico</label>
            <input type="email" class="form-control" id="inputCorreo" name="inputCorreo" placeholder="INGRESA PRIMER TELÉFONO" required>
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
@endsection

@section('scripts')

@endsection