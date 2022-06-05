<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use App\Sucursal;
class sucursalController extends Controller
{
    //
    public function getForm(){
        $proveedores = Proveedor::select(
            "proveedor_id",
            "proveedor_nombre"
        )->get();
        return view('sucursalForm', compact('proveedores'));
    }

    public function post(Request $request){
        request()->validate([
            'inputProveedor' => 'required',
            'inputName' => 'required',
            'inputDireccion' => 'required',
            'inputTel1' => 'required',
            'inputTel2' => 'required',
            'inputCorreo' => 'required',
        ]);

        Sucursal::create([
                'fk_proveedor_id' => $request->inputProveedor,
                'sucursal_nombre' => $request->inputName,
                'sucursal_direccion' => $request->inputDireccion,
                'sucursal_telefono' => $request->inputTel1,
                'sucursal_telefono_2' => $request->inputTel2,
                'sucursal_correo' => $request->inputCorreo
        ]);

        return redirect()->route('sucursalList'); #Ruta temporal
    }

    public function getList(){
        $sucursales = Sucursal::get();

        return view('sucursalList', compact('sucursales'));
    }

    public function getDetalle($id){
        $sucursalDetalle = Sucursal::where('sucursal_id', $id)->get();

        return view('detalleSucursal', compact('sucursalDetalle'));
    }

    public function delete($id){
        Sucursal::where('sucursal_id', $id)->delete();

        return redirect()->route('sucursalList');

    }

    public function update(Request $request){
        request()->validate([
            'inputIDHidden' => 'required',
            'inputName' => 'required',
            'inputDireccion' => 'required',
            'inputTel1' => 'required',
            'inputTel2' => 'required',
            'inputEmail' => 'required',
        ]);

        Sucursal::where("sucursal_id", $request->inputIDHidden)
                    ->update([
                        'sucursal_nombre' => $request->inputName,
                        'sucursal_direccion' => $request->inputDireccion,
                        'sucursal_telefono' => $request->inputTel1,
                        'sucursal_telefono_2' => $request->inputTel2,
                        'sucursal_correo' => $request->inputEmail,
                    ]);
        return redirect()->route('sucursalList'); 
    }
}
