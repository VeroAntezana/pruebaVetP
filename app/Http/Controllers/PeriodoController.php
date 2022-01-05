<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\periodo;
use App\Models\bitacora;



class PeriodoController extends Controller{
    public function index(){
        $periodo = periodo::all();
        return view('periodo.index', compact('periodo'));
    }

    public function createPeriodo(){
        return view('periodo.crearperiodo');
    }

    public function storedPeriodo(request $request){
        $this->validate(request(),['inicio'=>'required','fin'=>'required']);
        $periodo= periodo::create(request(['inicio','fin']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'periodo';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $periodo->id;
        $bitacora->save();

        $periodo->save();
        return redirect()->route('admin.indexperiodo'); 
    }

    public function destroyPeriodo($id){
        $periodo = periodo::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'periodo';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();
        
        $periodo->delete();
        return redirect()->route('admin.indexperiodo'); 
    }

    public function editPeriodo($id) {
        $periodo = periodo::find($id);
        return view('periodo.editarperiodo', compact('periodo'));
    }

    public function updatePeriodo(request $request, $id){
        $this->validate(request(),['inicio'=>'required','fin'=>'required']);

        $periodo= periodo::find($id);
        $periodo->inicio = $request->inicio;
        $periodo->fin = $request->fin;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'periodo';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $periodo->save();
        return redirect()->route('admin.indexperiodo'); 
    }

}
