<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\visita;
use App\Models\User;
use App\Models\bitacora;



class VisitaController extends Controller{
    public function index(){
        return view('visita.index');
    }

    public function createVisita(){
        return view('visita.crearvisita');
    } 

    public function storedVisita(request $request){
        $this->validate(request(),['detalle'=>'required','descripcion'=>'required','fecha'=>'required','hora'=>'required','user_id'=>'required']);
        $visita = visita::create(request(['descripcion','detalle','fecha','hora','user_id']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'visita';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $visita->id;
        $bitacora->save();

        $visita->save();
        return redirect()->route('admin.indexvisita'); 
    }

    public function destroyVisita($id){
        $visita = visita::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'visita';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $visita->delete();
        return redirect()->route('admin.indexvisita'); 
    }

    public function editVisita($id) {
        $visita = visita::find($id);
        return view('visita.editarvisita', compact('visita'));
    }

    public function updateVisita(Request $request, $id ) {
        $this->validate(request(),['detalle'=>'required','descripcion'=>'required','fecha'=>'required','hora'=>'required','user_id'=>'required']);
        $visita = visita::find($id);
        $visita->fecha = $request->fecha;
        $visita->hora = $request->hora;
        $visita->descripcion = $request->descripcion;
        $visita->detalle = $request->detalle;
        $visita->detalle = $request->detalle;
        $visita->user_id = $request->user_id;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'visita';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $visita->save();
        return redirect()->route('admin.indexvisita');
    }


}
