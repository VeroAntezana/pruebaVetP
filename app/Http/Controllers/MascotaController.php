<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\raza;
use App\Models\especie;
use App\Models\bitacora;


class MascotaController extends Controller{
    
    public function index(){
        return view('mascota.index');
    }

    public function listamascota(){
        $mascota = mascota::all();
        return view('mascota.listamascota', compact('mascota'));
   }

   public function createMascota(){
    $especie = especie::all();
    $raza = raza::all();
    return view('mascota.crearmascota', compact('especie'), compact('raza'));
}

public function storedMascota(Request $request){
    $this->validate(request(),['nombre'=>'required','imagen'=>'required','fnacimiento'=>'required', 'color'=>'required', 'sexo'=>'required', 'raza_id'=>'required' , 'user_id'=>'required']);
    $mascota = mascota::create(request(['nombre','color','sexo','fnacimiento','imagen','raza_id','user_id']));

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'mascota';
    $bitacora->descripcion = 'registró';
    $bitacora->subject_id = $mascota->id;
    $bitacora->save();

    $mascota->save();
    return redirect()->route('admin.listamascota'); 
}

 // eliminar una mascota
 public function destroyMascota($id){
    $mascota = mascota::find($id);

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'mascota';
    $bitacora->descripcion = 'eliminó';
    $bitacora->subject_id = $id;
    $bitacora->save();

    $mascota->delete();
    return redirect()->route('admin.listamascota');
}

    //editar una mascota
    public function editMascota($id){
        $mascota = mascota::find($id);
        $raza = raza::all();
        return view('mascota.editarmascota',compact('mascota'), compact('raza'));
    }
    
public function updateMascota(Request $request,$id){
    $this->validate(request(),['nombre'=>'required','imagen'=>'required','fnacimiento'=>'required', 'color'=>'required', 'sexo'=>'required', 'raza_id'=>'required' , 'user_id'=>'required']);

    $mascota= mascota::find($id);
    $mascota->nombre = $request->nombre;
    $mascota->user_id = $request->user_id ;
    $mascota->fnacimiento = $request->fnacimiento ;
    $mascota->color = $request->color;
    $mascota->sexo= $request->sexo;
    $mascota->imagen= $request->imagen;
    $mascota->raza_id= $request->raza_id;

    $bitacora = new bitacora();
    $bitacora->name = 'admin';
    $bitacora->causer_id = 1;
    $bitacora->long_name = 'mascota';
    $bitacora->descripcion = 'editó';
    $bitacora->subject_id = $id;
    $bitacora->save();

    $mascota->save();

    return redirect()->route('admin.listamascota'); 
}

    
   
}
