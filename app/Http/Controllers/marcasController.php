<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Marca;
use App\Refaccion;
use DB;
class marcasController extends Controller
{
    //
    public function get(){
        $marcas = Marca::get();

        return view('marcas', compact('marcas'));
    }

    public function getFormRefaccion($id){
        $nombreMarca = Marca::where('marca_id', $id)->first();

        return view('agregarRefaccionForm', compact('id', 'nombreMarca'));
    }



    public function store(Request $request, $id){
        
        request()->validate([
            'inputName' => 'required',
            'inputDescripcion' => 'required',
        ]);

        #Verificamos cuantos registros existen de la misma refacción
        $VerificarRefaccion = 
        Refaccion::where('refaccion_nombre', 'Like', '%' . $request->inputName . '%')
        ->where('fk_marca_id', $id)
        ->count();

        if($VerificarRefaccion <= 0){
            #Verificamos si hay una imagen cargada
            if($request->file('inputImage')){
                $file= $request->file('inputImage'); #obtenemos la imagen
                $filename= date('YmdHi').$file->getClientOriginalName(); #Renombramos la imagen con la fecha como nombre
                $file-> move(public_path('public/img'), $filename); #Movemos la imagen
            }else{
                $filename= "N-A.png"; #Caso contrario se le asigna un no aplica
            }

            #Guardamos
            Refaccion::create([
                'fk_marca_id' => $id,
                'refaccion_nombre' => $request->inputName,
                'refaccion_descripcion' => $request->inputDescripcion,
                'refaccion_imagen' => $filename
            ]);

            return redirect()->route('marcas'); #Ruta temporal
        }
        else if($VerificarRefaccion > 0){
            $nombreMarca = Marca::where('marca_id', $id)->first();
            $messageFail = 'La refacción de esa marca ya existe.';
            return view('agregarRefaccionForm', compact('id', 'nombreMarca', 'messageFail'));
        }   
        

    }
}
