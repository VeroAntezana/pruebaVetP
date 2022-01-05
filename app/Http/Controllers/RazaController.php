<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\raza;
use App\Models\especie;
use App\Models\bitacora;



class RazaController extends Controller{
    
    public function index(){
        $raza = raza::all();
        return view('raza.listaraza', compact('raza'));
    }

    public function createRaza(){
        $especie = especie::all();
        return view('raza.registrarraza', compact('especie'));
    }

    public function storedRaza(request $request){
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required','especie_id'=>'required']);
        $raza= raza::create(request(['nombre','descripcion','especie_id']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'raza';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $raza->id;
        $bitacora->save();

        $raza->save();
        return redirect()->route('admin.indexraza'); 
    }

    public function destroyRaza($id){
        $raza = raza::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'raza';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $raza->delete();
        return redirect()->route('admin.indexraza'); 
    }

    public function editRaza($id) {
        $raza = raza::find($id);
        $especie = especie::all();
        return view('raza.editarraza', compact('raza'),compact('especie'));
    }

    public function updateRaza(Request $request, $id ) {
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required','especie_id'=>'required']);

        $raza = raza::find($id);
        $raza->nombre = $request->nombre;
        $raza->descripcion = $request->descripcion;
        $raza->especie_id = $request->especie_id;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'raza';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $raza->save();
        return redirect()->route('admin.indexraza');
    }

}
