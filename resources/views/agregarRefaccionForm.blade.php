@extends('plantilla')


@section('title') Ferreteria - Agregar refacción @endsection

@section('css') 

@endsection

@section('content')
<div class="container">
    <div class="jumbotron">
      <h5 class="font-weight-bold">Detalles de la refacción</h5>
        <form method="POST" action="{{route('guardarRefaccion', $id)}}"  enctype="multipart/form-data">
            @csrf
          <div class="form-group">
            <label for="inputID" class="font-weight-bold">ID de la marca seleccionada ({{$nombreMarca->marca_nombre}})</label>
            <input type="text" class="form-control" id="inputID" name="inputID" required disabled value="{{$id}}">
            <small id="inputIDHelp" class="form-text text-muted">Id de la marca que selecciono previamente.</small>
          </div>

          <div class="form-group">
            <label for="inputName" class="font-weight-bold">Nombre de la refacción (requerido)</label>
            <input type="text" class="form-control" id="inputName" name="inputName" placeholder="INGRESA NOMBRE DE LA REFACCIÓN" required>
          </div>

        <div class="form-group">
            <label for="inputDescripcion" class="font-weight-bold">Descripción de la refacción</label>
            <input type="text" class="form-control" id="inputDescripcion" name="inputDescripcion" placeholder="INGRESA DESCRIPCIÓN DE LA REFACCIÓN" required>
        </div>

        <div class="form-group">
            <label for="inputImage" class="font-weight-bold">Adjuntar un archivo</label>
            <input type="file" class="form-control" id="inputImage" name="inputImage">
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