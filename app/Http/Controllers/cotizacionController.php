<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cotizacion;
use App\cotizacionDetalle;
use App\Marca;
use App\refaccionProveedor;
use App\Refaccion;
use PDF;

class cotizacionController extends Controller
{
    //

    public function getForm(){
        session_start();
        if (isset($_SESSION['nombre_cliente']) && isset($_SESSION['descripcion_coche'])) return redirect()->route('cotizacion');
        else return view('cotizacionForm');
        
    }

    public function cotizacion(Request $request){

        request()->validate([
            'inputName' => 'required',
            'inputDescripcion' => 'required',
            'inputFecha' => 'required'
        ]);

        session_start();
        $_SESSION['nombre_cliente']  = $request->inputName;
        $_SESSION['descripcion_coche'] = $request->inputDescripcion;
        $_SESSION['fecha_actual']= $request->inputFecha;
        
        #cotizacion::create([
        #    'cotizacion_nombre_cliente' => strtoupper($request->inputName),
        #    'cotizacion_descripcion_coche' => strtoupper($request->inputDescripcion),
        #    'created_at' => $request->inputFecha,
        #    'cotizacion_costo_total' => 0
        #]);

        return redirect()->route('cotizacion', $request->inputName);
    }

    public function getCotizacion(){
        session_start();
        if (!isset($_SESSION['nombre_cliente']) && !isset($_SESSION['descripcion_coche']) && !isset($_SESSION['fecha_actual'])) {
            return redirect()->route('nuevaCotizacionForm');
        }
        else{

            $cotizacionDetalles = cotizacionDetalle::select(
                "refaccion.refaccion_nombre",
                "proveedor.proveedor_nombre", 
                "refaccion_proveedor.precio", 
                "cotizacion_detalle.cotizacion_detalle_incremento",
                "cotizacion_detalle.cotizacion_detalle_numero_piezas", 
                "cotizacion_detalle.cotizacion_detalle_mano_obra",
                "cotizacion_detalle.cotizacion_detalle_costo_parcial"
            )
            ->where("Activo", 1)
            ->leftjoin("refaccion_proveedor", "refaccion_proveedor_id", "=", "fk_refaccion_proveedor_id")
            ->leftjoin("refaccion", "refaccion_id", "=", "fk_refaccion_id")
            ->leftjoin("proveedor", "proveedor_id", "=", "fk_proveedor_id")
            ->get();

            $total = 0;
            foreach($cotizacionDetalles as $detalle){$total = $total + $detalle->cotizacion_detalle_costo_parcial;}
            return view('cotizacionEnCurso', compact('cotizacionDetalles', 'total'));
        }

    }

    public function getMarcas(){
        $marcas = Marca::get();

        return view('cotizacionMarcas', compact('marcas'));
    }

    public function getRefacciones($id){

        $refacciones = refaccionProveedor::select(
            "refaccion_proveedor.refaccion_proveedor_id",
            "refaccion_proveedor.fk_refaccion_id",
            "refaccion_proveedor.fk_proveedor_id",
            "refaccion_proveedor.created_at",
            "refaccion_proveedor.precio",
            "refaccion.fk_marca_id",
            "refaccion.refaccion_nombre",
            "refaccion.refaccion_descripcion",
            "proveedor.proveedor_nombre",
            "marca.marca_nombre"
        )->where("refaccion.fk_marca_id", $id)
        ->leftjoin("refaccion", "refaccion_id", "=", "refaccion_proveedor.fk_refaccion_id")
        ->leftjoin("proveedor", "proveedor_id", "=", "refaccion_proveedor.fk_proveedor_id")
        ->leftjoin("marca", "marca_id", "=", "refaccion.fk_marca_id")
        ->get();

        return view('refaccionesDetalleList', compact('refacciones'));
    }

    public function cotizacionDetalle($id){
        $refaccion = refaccionProveedor::select(
            "refaccion_proveedor.refaccion_proveedor_id",
            "refaccion_proveedor.fk_refaccion_id",
            "refaccion_proveedor.fk_proveedor_id",
            "refaccion_proveedor.created_at",
            "refaccion_proveedor.precio",
            "refaccion.fk_marca_id",
            "refaccion.refaccion_nombre",
            "refaccion.refaccion_descripcion",
            "proveedor.proveedor_nombre",
            "marca.marca_nombre"
        )->where("refaccion_proveedor.refaccion_proveedor_id", $id)
        ->leftjoin("refaccion", "refaccion_id", "=", "refaccion_proveedor.fk_refaccion_id")
        ->leftjoin("proveedor", "proveedor_id", "=", "refaccion_proveedor.fk_proveedor_id")
        ->leftjoin("marca", "marca_id", "=", "refaccion.fk_marca_id")
        ->get();

        return view('detallesCotizacion', compact('refaccion'));
    }

    public function cotizacionGuardar(Request $request){
        request()->validate([
            'inputId' => 'required',
            'inputName' => 'required',
            'inputNameRefaccion' => 'required',
            'inputDescripcion' => 'required',
            'inputNameProveedor' => 'required',
            'inputFecha' => 'required',
            'inputPrecio' => 'required',
            'inputPrecioIndividual' => 'required',
            'inputPiezas' => 'required',
            'inputManoObra' => 'required',
            'inputRefaccionProveedorId' => 'required'
        ]);

        session_start();
        $verificarCotizacion = 
            cotizacion::where('cotizacion_nombre_cliente', 'Like', '%' . strtoupper($_SESSION['nombre_cliente']) . '%')
            ->count();
        if($verificarCotizacion <= 0){
            cotizacion::create([
            'cotizacion_nombre_cliente' => strtoupper($_SESSION['nombre_cliente']),
            'cotizacion_descripcion_coche' => strtoupper($_SESSION['descripcion_coche']),
            'created_at' => $_SESSION['fecha_actual'],
            'cotizacion_costo_total' => 0
            ]);
        }else{
            $idCotizacion = cotizacion::select("cotizacion_id")->where('cotizacion_nombre_cliente', 'Like', '%' . strtoupper($_SESSION['nombre_cliente']) . '%')->first();
            cotizacion::where('cotizacion_id', $idCotizacion->cotizacion_id)->update([
                'cotizacion_nombre_cliente' => strtoupper($_SESSION['nombre_cliente']),
                'cotizacion_descripcion_coche' => strtoupper($_SESSION['descripcion_coche']),
                'created_at' => $_SESSION['fecha_actual'],
                'cotizacion_costo_total' => 0
            ]);
        }

        $idCotizacionActual = cotizacion::select("cotizacion.cotizacion_id")->orderByDesc('cotizacion_id')->first();
        $costoParcial = ($request->inputPrecio + $request->inputPrecioIndividual + $request->inputManoObra) * $request->inputPiezas;
        cotizacionDetalle::create([
            'fk_cotizacion_id' => $idCotizacionActual->cotizacion_id,
            'fk_refaccion_proveedor_id' => $request->inputRefaccionProveedorId,
            'cotizacion_detalle_incremento' => $request->inputPrecioIndividual,
            'cotizacion_detalle_numero_piezas' => $request->inputPiezas,
            'cotizacion_detalle_mano_obra' => $request->inputManoObra,
            'cotizacion_detalle_costo_parcial' => $costoParcial,
            'Activo' => 1
        ]);

        return redirect()->route('cotizacion');

    }

    public function generarPDF(){
        
        $cotizacionDetalles = cotizacionDetalle::select(
            "refaccion.refaccion_nombre",
            "proveedor.proveedor_nombre", 
            "refaccion_proveedor.precio", 
            "cotizacion_detalle.cotizacion_detalle_incremento",
            "cotizacion_detalle.cotizacion_detalle_numero_piezas", 
            "cotizacion_detalle.cotizacion_detalle_mano_obra",
            "cotizacion_detalle.cotizacion_detalle_costo_parcial"
        )
        ->where("Activo", 1)
        ->leftjoin("refaccion_proveedor", "refaccion_proveedor_id", "=", "fk_refaccion_proveedor_id")
        ->leftjoin("refaccion", "refaccion_id", "=", "fk_refaccion_id")
        ->leftjoin("proveedor", "proveedor_id", "=", "fk_proveedor_id")
        ->get();
        $total = 0;
        foreach($cotizacionDetalles as $detalle){$total = $total + $detalle->cotizacion_detalle_costo_parcial;}
        $pdf = PDF::loadView('myPDF', compact('cotizacionDetalles', 'total'));
    
        return $pdf->download('cotizacion.pdf');
    }

    public function finalizar(){
        session_start();
        if (isset($_SESSION['nombre_cliente']) && isset($_SESSION['descripcion_coche']) && isset($_SESSION['fecha_actual'])) {

            $id = cotizacion::select('cotizacion_id')
            ->where('cotizacion_nombre_cliente', 'Like', '%' . strtoupper($_SESSION['nombre_cliente']))
            ->orderByDesc('cotizacion_id')
            ->first();
            cotizacionDetalle::where("fk_cotizacion_id", $id->cotizacion_id)
            ->update([
                'Activo' => 0
            ]);
            session_destroy();
            return redirect()->route('nuevaCotizacionForm'); 
        }
        
    }
}
