@extends('plantilla')


@section('title') Ferreteria - Agregar refacción @endsection

@section('css') 

@endsection

@section('content')
<div class="container">
	<div class="jumbotron">
      <h5 class="font-weight-bold">Iniciar una nueva cotización</h5>
        <form method="POST" action="{{route('cotizacionEnCurso')}}"  enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="inputName" class="font-weight-bold">Nombre del cliente (requerido)</label>
            <input type="text" class="form-control" id="inputName" name="inputName" style="text-transform:uppercase;" placeholder="INGRESA NOMBRE DEL CLIENTE" required >
          </div>

        <div class="form-group">
            <label for="inputDescripcion" class="font-weight-bold">Descripcion del coche (requerido)</label>
            <input type="text" class="form-control" id="inputDescripcion" name="inputDescripcion" style="text-transform:uppercase;" placeholder="INGRESA UNA DESCRIPCION DEL COCHE" required>
        </div>

        <div class="form-group">
            <label for="inputFecha" class="font-weight-bold">Fecha Actual (requerido)</label>
            <input type="date" class="form-control" id="inputFecha" name="inputFecha" required>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Siguiente</button>

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