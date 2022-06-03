@extends('plantilla')


@section('title') Ferreteria - Refacciones @endsection

@section('css') 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Lista de refacciones</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allRefacciones as $refaccion)
                    <tr>
                        <td>{{$refaccion->refaccion_id}}</td>
                        <td id="nameMarca{{$refaccion->refaccion_id}}"> {{$refaccion->marca_nombre}}</td> 
                        <td id="nameRefaccion{{$refaccion->refaccion_id}}"> {{$refaccion->refaccion_nombre}}</td>
                        <td id="descripcion{{$refaccion->refaccion_id}}"> {{$refaccion->refaccion_descripcion}}</td>
                        <td>
                        	<center>
                        	<img src="{{ url('public/img/'.$refaccion->refaccion_imagen) }}" class="img-thumbnail" style="width: 150px;"> 
                        	</center>
                        </td>
                        <td>{{$refaccion->created_at}}</td>
                        <td>

                        	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit" onclick="recibir({{$refaccion->refaccion_id}});">Editar</button>
                        	<button  type="button" class="btn btn-secondary">Borrar</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Marca</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Fecha de creación</th>
                        <th>Acciones</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!--modals-->
    <!-- edit-->
    
    <script type="text/javascript">
        function recibir(id)
        {
            
          var id = id;
          var nameMarca = document.getElementById("nameMarca"+id).innerText;
          var nameRefaccion = document.getElementById("nameRefaccion"+id).innerText;
          var descripcion = document.getElementById("descripcion"+id).innerText;
          
          document.getElementById("inputIDHidden").value = id;
          document.getElementById("inputID").value = id;
          document.getElementById("inputName").value = nameRefaccion;
          document.getElementById("inputDescripcion").value = descripcion;
            
        } 
    </script>
	<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h5 class="modal-title" id="exampleModalLongTitle">Editar refacción</h5>
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	          <span aria-hidden="true">&times;</span>
	        </button>
	      </div>
          <form method="POST" action="{{route('updateRefaccion')}}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="inputIDHidden" name="inputIDHidden" required  value=" ">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="inputID" class="font-weight-bold">ID de la marca seleccionada</label>
                    <input type="text" class="form-control" id="inputID" name="inputID" required disabled value=" ">
                    <small id="inputIDHelp" class="form-text text-muted">Id de la marca que selecciono previamente.</small>
                  </div>
              
                <div class="form-group">
                    <label for="inputName" class="font-weight-bold">Nombre de la refacción (requerido)</label>
                    <input type="text" class="form-control" id="inputName" name="inputName" placeholder="INGRESA NOMBRE DE LA REFACCIÓN" required value=" ">
                </div>

                <div class="form-group">
                    <label for="inputDescripcion" class="font-weight-bold">Descripción de la refacción</label>
                    <input type="text" class="form-control" id="inputDescripcion" name="inputDescripcion" placeholder="INGRESA DESCRIPCIÓN DE LA REFACCIÓN" required value=" ">
                </div>

                <div class="form-group">
                    <label for="inputImage" class="font-weight-bold">Adjuntar un archivo</label>
                    <input type="file" class="form-control" id="inputImage" name="inputImage" accept="image/*">
                </div>


                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </div>
            
          </form>

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