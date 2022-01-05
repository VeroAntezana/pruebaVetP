<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tratamiento;
use App\Models\mascota;
use App\Models\bitacora;

class TratamientoController extends Controller{

    public function index(){
        return view('tratamiento.index');
    }

    public function createTratamiento(){
        $mascota = mascota::all();
        return view('tratamiento.creartratamiento', compact('mascota'));
    } 

    public function storedTratamiento(request $request){
        $this->validate(request(),['finicio'=>'required','ffin'=>'required','diagnostico'=>'required','precio'=>'required','mascota_id'=>'required']);

        $tratamiento= tratamiento::create(request(['diagnostico','finicio','ffin','precio','mascota_id']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'tratamiento';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $tratamiento->id;
        $bitacora->save();

        $tratamiento->save();
        return redirect()->route('admin.indextratamiento'); 
    }

    public function destroyTratamiento($id){
        $tratamiento = tratamiento::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'tratamiento';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $tratamiento->delete();
        return redirect()->route('admin.indextratamiento'); 
    }

    public function editTratamiento($id) {
        $tratamiento = tratamiento::find($id);
        $mascota = mascota::all();
        return view('tratamiento.editartratamiento', compact('mascota'), compact('tratamiento'));
    }

    
    public function updateTratamiento(Request $request, $id ) {
        $this->validate(request(),['finicio'=>'required','ffin'=>'required','diagnostico'=>'required','precio'=>'required','mascota_id'=>'required']);

        $tratamiento = tratamiento::find($id);
        $tratamiento->finicio = $request->finicio;
        $tratamiento->ffin = $request->ffin;
        $tratamiento->diagnostico = $request->diagnostico;
        $tratamiento->precio = $request->precio;
        $tratamiento->mascota_id = $request->mascota_id;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'tratamiento';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $tratamiento->save();
        return redirect()->route('admin.indextratamiento');
    }

}
