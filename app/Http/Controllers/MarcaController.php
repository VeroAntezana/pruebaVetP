<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\marca;
use App\Models\bitacora;

class MarcaController extends Controller{
    public function index(){
        $marca = marca::all();
        return view('marca.listamarca', compact('marca'));
   }

   public function createMarca(){
    return view('marca.registrarmarca');
 }

 public function storedMarca(request $request){
    $this->validate(request(),['nombre'=>'required','descripcion'=>'required']);
    $marca= marca::create(request(['nombre','descripcion']));

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'marca';
    $bitacora->descripcion = 'registró';
    $bitacora->subject_id = $marca->id;
    $bitacora->save();

    $marca->save();
    return redirect()->route('admin.indexmarca'); 
}

public function destroyMarca($id){
    $marca = marca::find($id);

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'marca';
    $bitacora->descripcion = 'eliminó';
    $bitacora->subject_id = $id;
    $bitacora->save();
    
    $marca->delete();
    return redirect()->route('admin.indexmarca'); 
}
public function editMarca($id) {
    $marca = marca::find($id);
    return view('marca.editarmarca', compact('marca'));
}

public function updateMarca(Request $request, $id ) {
    $this->validate(request(),['nombre'=>'required','descripcion'=>'required']);
    $marca = marca::find($id);
    $marca->nombre = $request->nombre;
    $marca->descripcion = $request->descripcion;

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'marca';
    $bitacora->descripcion = 'editó';
    $bitacora->subject_id = $id;
    $bitacora->save();

    $marca->save();
    return redirect()->route('admin.indexmarca');
}

    
}
