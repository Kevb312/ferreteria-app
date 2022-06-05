<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;

class proveedorController extends Controller
{
    //
    public function getForm(){

        return view('proveedorForm');
    }

    public function post(Request $request){

        request()->validate([
            'inputName' => 'required',
            'inputDireccion' => 'required',
            'inputTel1' => 'required',
            'inputTel2' => 'required',
            'inputCorreo' => 'required',
        ]);

        #Verificamos si ya existe ese proveedor
        $VerificarProveedor = 
        Proveedor::where('proveedor_nombre', 'Like', '%' . $request->inputName . '%')
        ->count();

        if($VerificarProveedor <= 0){
            Proveedor::create([
                'proveedor_nombre' => $request->inputName,
                'proveedor_direccion' => $request->inputDireccion,
                'proveedor_telefono' => $request->inputTel1,
                'proveedor_telefono_2' => $request->inputTel2,
                'proveedor_correo' => $request->inputCorreo
            ]);

            return redirect()->route('proveedorForm'); #Ruta temporal
        }
        else if($VerificarProveedor > 0){
            $messageFail = 'El proveedor ya existe, elija un nombre distinto.';
            return view('ProveedorForm', compact('messageFail'));
        }   
    }

    public function getList(){
        $allProveedor = Proveedor::get();

        return view('proveedorList', compact('allProveedor'));
    }

    public function getDetalle($id){
        $proveedorDetalle = Proveedor::where('proveedor_id', $id)->get();
        return view('detalleProveedor', compact('proveedorDetalle'));
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

        Proveedor::where("proveedor_id", $request->inputIDHidden)
                    ->update([
                        'proveedor_nombre' => $request->inputName,
                        'proveedor_direccion' => $request->inputDireccion,
                        'proveedor_telefono' => $request->inputTel1,
                        'proveedor_telefono_2' => $request->inputTel2,
                        'proveedor_correo' => $request->inputEmail,
                    ]);
    
        return redirect()->route('proveedorList'); 
    }
}
