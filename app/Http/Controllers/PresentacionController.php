<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\categoria;
use App\Models\presentacion;
use App\Models\bitacora;


class PresentacionController extends Controller{

    public function index(){
        $presentacion = presentacion::all();
        return view('presentacion.listapresentacion', compact('presentacion'));
   }

   public function createPresentacion(){
       return view('presentacion.registrarpresentacion');
    }

    
    public function storedPresentacion(request $request){
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required']);
        $presentacion= presentacion::create(request(['nombre','descripcion']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'presentacion';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $presentacion->id;
        $bitacora->save();

        $presentacion->save();
        return redirect()->route('admin.indexpresentacion'); 
    }

    public function destroyPresentacion($id){
        $presentacion = presentacion::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'presentacion';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $presentacion->delete();
        return redirect()->route('admin.indexpresentacion'); 
    }

    public function editPresentacion($id) {
        $presentacion = presentacion::find($id);
        return view('presentacion.editarpresentacion', compact('presentacion'));
    }

    public function updatePresentacion(Request $request, $id ) {
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required']);
        $presentacion = presentacion::find($id);
        $presentacion->nombre = $request->nombre;
        $presentacion->descripcion = $request->descripcion;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'presentacion';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $presentacion->save();
        return redirect()->route('admin.indexpresentacion');
    }


}
