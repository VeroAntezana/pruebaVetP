<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\especie;
use App\Models\bitacora;



class EspecieController extends Controller{
    public function index(){
        $especie = especie::all();
        return view('especie.listaespecie', compact('especie'));
   }

   public function createEspecie(){
    return view('especie.registrarespecie');
 }

 public function storedEspecie(request $request){
    $this->validate(request(),['nombre'=>'required']);
    $especie= especie::create(request(['nombre']));
   
    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'especie';
    $bitacora->descripcion = 'registró';
    $bitacora->subject_id = $especie->id;
    $bitacora->save();

    $especie->save();
    return redirect()->route('admin.indexespecie'); 
}

public function destroyEspecie($id){
    $especie = especie::find($id);

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'especie';
    $bitacora->descripcion = 'eliminó';
    $bitacora->subject_id = $id;
    $bitacora->save();

    $especie->delete();
    return redirect()->route('admin.indexespecie'); 
}

public function editEspecie($id) {
    $especie = especie::find($id);
    return view('especie.editarespecie', compact('especie'));
}
public function updateEspecie(Request $request, $id ) {
    $this->validate(request(),['nombre'=>'required']);

    $especie = especie::find($id);
    $especie->nombre = $request->nombre;

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'especie';
    $bitacora->descripcion = 'editó';
    $bitacora->subject_id = $id;
    $bitacora->save();


    $especie->save();
    return redirect()->route('admin.indexespecie');
}

}
