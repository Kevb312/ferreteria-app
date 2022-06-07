<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Marca;
use App\Refaccion;
use App\Proveedor;
use App\refaccionProveedor;
use DB;

class refaccionesController extends Controller
{
    //

    public function getRefacciones(){
        $allRefacciones = DB::table('refaccion')
        ->select(
            "refaccion.refaccion_id",
            "refaccion.refaccion_nombre",
            "refaccion.refaccion_descripcion",
            "refaccion.refaccion_imagen",
            "refaccion.created_at",
            "marca.marca_nombre"
        )
        ->leftjoin('marca', 'refaccion.fk_marca_id', '=', 'marca.marca_id')
        ->get();
        
        return view('refaccionesList', compact('allRefacciones'));
    }

    public function updateRefaccion(Request $request){

        $oldName = Refaccion::select("refaccion_imagen")->where("refaccion_id", $request->inputIDHidden)->first();

        if($oldName->refaccion_imagen == "N-A.png"){
            if($request->file('inputImage')){
                $file= $request->file('inputImage'); 
                $filename= date('YmdHi').$file->getClientOriginalName(); 
                $file-> move(public_path('public/img'), $filename); 
            }else{
                $filename= "N-A.png";
            }
        }

        else if (empty($oldName)){
            if($request->file('inputImage')){
                $file= $request->file('inputImage'); 
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/img'), $filename);
            }
            else{
                $filename= "N-A.png";
            }
        }
        else if(!empty($oldName)){
            if($request->file('inputImage')){

                $image_path = public_path().'/public/img/'.$oldName->refaccion_imagen;
                unlink($image_path);

                $file= $request->file('inputImage'); 
                $filename= $oldName->refaccion_imagen;
                $file-> move(public_path('public/img'), $filename);
            }
            else{
                $filename= "N-A.png";
            }
        }
        else{
            if($request->file('inputImage')){

                $file= $request->file('inputImage'); 
                $filename= date('YmdHi').$file->getClientOriginalName();
                $file-> move(public_path('public/img'), $filename);
            }
            else{
                $filename= "N-A.png";
            }
        }

        
        Refaccion::where("refaccion_id", $request->inputIDHidden)
                    ->update([
                        'refaccion_nombre' => $request->inputName,
                        'refaccion_descripcion' => $request->inputDescripcion,
                        'refaccion_imagen' => $filename
                    ]);
    
        return redirect()->route('refaccionesList'); 
    }

    public function getCotizacion($id){
        $proveedores = Proveedor::select("proveedor_id", "proveedor_nombre")->get();
        return view('cotizarRefaccion', compact('id', 'proveedores'));
    }

    public function saveCotizacion(Request $request){

        request()->validate([
            'inputID' => 'required',
            'inputProveedor' => 'required',
            'inputDate' => 'required',
            'inputPrecio' => 'required',
        ]);

        refaccionProveedor::create([
                'fk_refaccion_id' => $request->inputID,
                'fk_proveedor_id' => $request->inputProveedor,
                'created_at' => $request->inputDate,
                'precio' => $request->inputPrecio,
        ]);

    
        return redirect()->route('refaccionesList'); 


    }


}
