@extends('plantilla')


@section('title') Ferreteria - Lista de proveedores @endsection

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
                        <th>Nombre del proveedor</th>
                        <th>Ver detalles</th>
                        <th>Editar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($allProveedor as $proveedor)
                    <tr>
                        <td>{{$proveedor->proveedor_id}}</td>
                        <td id="idProveedor{{$proveedor->proveedor_id}}"> {{$proveedor->proveedor_nombre}}</td>
                        <input type="hidden" id="nameProveedor{{$proveedor->proveedor_id}}" value="{{$proveedor->proveedor_nombre}}">
                        <input type="hidden" id="direccionProveedor{{$proveedor->proveedor_id}}" value="{{$proveedor->proveedor_direccion}}">
                        <input type="hidden" id="telProveedor{{$proveedor->proveedor_id}}" value="{{$proveedor->proveedor_telefono}}">
                        <input type="hidden" id="tel2Proveedor{{$proveedor->proveedor_id}}" value="{{$proveedor->proveedor_telefono_2}}">
                        <input type="hidden" id="emailProveedor{{$proveedor->proveedor_id}}" value="{{$proveedor->proveedor_correo}}">
                        <td><a href="{{route('proveedorDetalle', $proveedor->proveedor_id)}}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-list-check" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M5 11.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3.854 2.146a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 3.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708L2 7.293l1.146-1.147a.5.5 0 0 1 .708 0zm0 4a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
                            </svg> Ver
                            </a>
                        </td>
                        <td><a href="#" data-toggle="modal" data-target="#edit" onclick="recibir({{$proveedor->proveedor_id}});"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                          <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                          <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>Editar </a></td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre del proveedor</th>
                        <th>Ver detalles</th>
                        <th>Editar</th>
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
        var nameProveedor = document.getElementById("nameProveedor"+id).value;
        var direccionProveedor = document.getElementById("direccionProveedor"+id).value;
        var tel = document.getElementById("telProveedor"+id).value;
        var tel2 = document.getElementById("tel2Proveedor"+id).value;
        var email = document.getElementById("emailProveedor"+id).value;
         
        document.getElementById("inputIDHidden").value = id;
        document.getElementById("inputID").value = id;
        document.getElementById("inputName").value = nameProveedor;
        document.getElementById("inputDireccion").value = direccionProveedor;
        document.getElementById("inputTel1").value = tel;
        document.getElementById("inputTel2").value = tel2;
        document.getElementById("inputEmail").value = email;
            
        } 
    </script>
    <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Actualizar datos de un Proveedor</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="POST" action="{{route('updateProveedor')}}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="inputIDHidden" name="inputIDHidden" required  value=" ">
              <div class="modal-body">
                    <h6>Datos del proveedor</h6>
                  <div class="form-group">
                    <label for="inputID" class="font-weight-bold">Id del Proveedor (requerido)</label>
                    <input type="text" class="form-control" id="inputID" name="inputID" required disabled value=" ">
                  </div>
              
                <div class="form-group">
                    <label for="inputName" class="font-weight-bold">Nombre del Proveedor (requerido)</label>
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