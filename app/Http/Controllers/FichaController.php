<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\periodo;
use App\Models\reserva;
use App\Models\ficha;
use App\Models\bitacora;


class FichaController extends Controller
{
    public function index(){
        $ficha = ficha::all();
        return view('ficha.index', compact('ficha'));
    }

    public function createFicha(){
        $periodo = periodo::all();
        $reserva = reserva::all();
        return view('ficha.crearficha', compact('periodo'), compact('reserva'));
    }

    public function storedFicha(request $request){
        $this->validate(request(),['fecha'=>'required','periodo_id'=>'required','reserva_id'=>'required']);
        $ficha = ficha::create(request(['fecha','periodo_id','reserva_id']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'ficha';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $ficha->id;
        $bitacora->save();

        $ficha->save();
        return redirect()->route('admin.indexficha'); 
    }

    public function destroyFicha($id){
        $ficha = ficha::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'ficha';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $ficha->delete();
        return redirect()->route('admin.indexficha'); 
    }

    public function editFicha($id) {
        $ficha = ficha::find($id);
        return view('ficha.editarficha', compact('ficha'));
    }

    public function updateFicha(Request $request, $id ) {
        $this->validate(request(),['fecha'=>'required','periodo_id'=>'required','reserva_id'=>'required']);

        $ficha = ficha::find($id);
        $ficha->fecha = $request->fecha;
        $ficha->periodo_id = $request->periodo_id;
        $ficha->reserva_id = $request->reserva_id;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'ficha';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $ficha->save();
        return redirect()->route('admin.indexficha');
    }

}
