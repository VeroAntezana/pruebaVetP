<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mascota;
use App\Models\reserva;
use App\Models\bitacora;


class ReservaController extends Controller{
    public function index(){
        return view('reserva.index');
    }

    public function listaReserva(){
        return view('reserva.listareserva');
    } 

    public function createReserva(){
        $mascota = mascota::all();
        return view('reserva.crearreserva', compact('mascota'));
    } 

    public function storedReserva(request $request){
        $this->validate(request(),['fecha'=>'required','mascota_id'=>'required']);
        $reserva= reserva::create(request(['fecha','mascota_id']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'reserva';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $reserva->id;
        $bitacora->save();
    
        $reserva->save();
        return redirect()->route('admin.listareserva'); 
    }

    public function destroyReserva($id){
        $reserva = reserva::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'reserva';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $reserva->delete();
        return redirect()->route('admin.listareserva'); 
    }

    public function editReserva($id) {
        $reserva = reserva::find($id);
        $mascota = mascota::all();
        return view('reserva.editarreserva', compact('mascota'), compact('reserva'));
    }

    public function updateReserva(Request $request, $id ) {
        $this->validate(request(),['fecha'=>'required','mascota_id'=>'required']);

        $reserva = reserva::find($id);
        $reserva->fecha = $request->fecha;
        $reserva->mascota_id = $request->mascota_id;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'reserva';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $reserva->save();
        return redirect()->route('admin.listareserva');
    }
}
