@extends('plantilla')


@section('title') Ferreteria - Lista de sucursales @endsection

@section('css') 
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <h5>Listado de Sucursales</h5>
        </div>
        <div class="card-body">
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la sucursal</th>
                        <th>Ver detalles</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sucursales as $sucursal)
                    <tr>
                        <td>{{$sucursal->sucursal_id}}</td>
                        <td id="idProveedor{{$sucursal->sucursal_id}}"> {{$sucursal->sucursal_nombre}}</td>
                        <input type="hidden" id="nameSucursal{{$sucursal->sucursal_id}}" value="{{$sucursal->sucursal_nombre}}">
                        <input type="hidden" id="direccionSucursal{{$sucursal->sucursal_id}}" value="{{$sucursal->sucursal_direccion}}">
                        <input type="hidden" id="telSucursal{{$sucursal->sucursal_id}}" value="{{$sucursal->sucursal_telefono}}">
                        <input type="hidden" id="tel2Sucursal{{$sucursal->sucursal_id}}" value="{{$sucursal->sucursal_telefono_2}}">
                        <input type="hidden" id="emailSucursal{{$sucursal->sucursal_id}}" value="{{$sucursal->sucursal_correo}}">
                        <td><a href="{{route('sucursalDetalle', $sucursal->sucursal_id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg> Ver
                            </a>
                        </td>
                        <td><a href="#" data-toggle="modal" data-target="#edit" onclick="recibir({{$sucursal->sucursal_id}});"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>Editar </a>
                        </td>

                        <td>
                            <a href="{{route('sucursalBorrar', $sucursal->sucursal_id)}}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                </svg>
                                Borrar
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre de la sucursal</th>
                        <th>Ver detalles</th>
                        <th>Editar</th>
                        <th>Eliminar</th>
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
        var nameSucursal = document.getElementById("nameSucursal"+id).value;
        var direccionSucursal = document.getElementById("direccionSucursal"+id).value;
        var telSucursal = document.getElementById("telSucursal"+id).value;
        var tel2Sucursal = document.getElementById("tel2Sucursal"+id).value;
        var emailSucursal = document.getElementById("emailSucursal"+id).value;
         
        document.getElementById("inputIDHidden").value = id;
        document.getElementById("inputID").value = id;
        document.getElementById("inputName").value = nameSucursal;
        document.getElementById("inputDireccion").value = direccionSucursal;
        document.getElementById("inputTel1").value = telSucursal;
        document.getElementById("inputTel2").value = tel2Sucursal;
        document.getElementById("inputEmail").value = emailSucursal;
            
        } 
    </script>
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de una sucursal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="{{route('updateSucursal')}}"  enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" id="inputIDHidden" name="inputIDHidden" required  value=" ">
          <div class="modal-body">
                <h6>Datos de la sucursal</h6>
              <div class="form-group">
                <label for="inputID" class="font-weight-bold">Id de la sucursal (requerido)</label>
                <input type="text" class="form-control" id="inputID" name="inputID" required disabled value=" ">
              </div>
          
            <div class="form-group">
                <label for="inputName" class="font-weight-bold">Nombre de la sucursal (requerido)</label>
                <input type="text" class="form-control" id="inputName" name="inputName" placeholder="INGRESA NOMBRE DEL PROVEEDOR" required value=" " >
            </div>

            <div class="form-group">
                <label for="inputDireccion" class="font-weight-bold">Dirección</label>
                <input type="text" class="form-control" id="inputDireccion" name="inputDireccion" placeholder="INGRESA LA DIRECCIÓN" required value=" " >
            </div>

            <div class="form-group">
                <label for="inputTel1" class="font-weight-bold">Teléfono 1</label>
                <input type="number" class="form-control" id="inputTel1" name="inputTel1" placeholder="Teléfono 1" required value=" ">
            </div>

            <div class="form-group">
                <label for="inputTel2" class="font-weight-bold">Teléfono 2</label>
                <input type="number" class="form-control" id="inputTel2" name="inputTel2" placeholder="Teléfono 2" required value=" ">
            </div>

            <div class="form-group">
                <label for="inputEmail" class="font-weight-bold">Correo electrónico</label>
                <input type="email" class="form-control" id="inputEmail" name="inputEmail" placeholder="Email" required value=" ">
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