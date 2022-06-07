<!DOCTYPE html>
<html>
<head>
    <title>Cotización</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    {{session_start()}}
    
    <h1>Cotización</h1>
    <h2>Nombre del cliente: {{strtoupper ($_SESSION['nombre_cliente'])}}</h2>
    <h2>Descripción del coche: {{strtoupper ($_SESSION['descripcion_coche'])}}</h2>

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Refaccion</th>
                    <th scope="col">Proveedor</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Incremento</th>
                    <th scope="col">No. de piezas</th>
                    <th scope="col">Costo mano de obra</th>
                    <th scope="col">Costo parcial</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cotizacionDetalles as $d)
                <tr>
                    <td>{{$d->refaccion_nombre}}</td>
                    <td>{{$d->proveedor_nombre}}</td>
                    <td>{{$d->precio}}</td>
                    <td>{{$d->cotizacion_detalle_incremento}}</td>
                    <td>{{$d->cotizacion_detalle_numero_piezas}}</td>
                    <td>{{$d->cotizacion_detalle_mano_obra}}</td>
                    <td>{{$d->cotizacion_detalle_costo_parcial}}</td>
                </tr>
                @endforeach
            </tbody>

            <h1>Total a pagar ${{$total}}</h1>
        </table>
    </div>
    <p>Sistema de gestión de refaccionaria.</p>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>