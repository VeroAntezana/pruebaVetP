<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\servicio;
use App\Models\bitacora;


class ServicioController extends Controller{
    public function index(){
        return view('servicio.index');
    }

    public function listaServicio(){
        return view('servicio.listaservicio');
    } 

    public function createServicio(){
        return view('servicio.crearservicio');
    } 

    public function storedServicio(request $request){
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required','imagen'=>'required']);
        $servicio= servicio::create(request(['nombre','descripcion','imagen']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'servicio';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $servicio->id;
        $bitacora->save();

        $servicio->save();
        return redirect()->route('admin.listaservicio'); 
    }

    public function destroyServicio($id){
        $servicio = servicio::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'servicio';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $servicio->delete();
        return redirect()->route('admin.listaservicio'); 
    }

    public function editServicio($id) {
        $servicio = servicio::find($id);
        return view('servicio.editarservicio', compact('servicio'));
    }

    public function updateServicio(Request $request, $id ) {
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required','imagen'=>'required']);
        $servicio = servicio::find($id);
        $servicio->nombre = $request->nombre;
        $servicio->descripcion = $request->descripcion;
        $servicio->imagen = $request->imagen;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'servicio';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $servicio->save();
        return redirect()->route('admin.listaservicio');
    }

}
