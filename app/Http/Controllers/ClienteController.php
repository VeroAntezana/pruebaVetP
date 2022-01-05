<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\mascota;
use App\Models\servicio;
use App\Models\User;
use App\Models\reserva;
use App\Models\ficha;
use App\Models\bitacora;

class ClienteController extends Controller{

    public function index(){
        return view('cliente.index');
    }

    public function Mascotas(){
        return view('cliente.mascotas');
    }

    public function Citas(){
        return view('cliente.citas');
    }

    public function Servicios(){
        $servicio = servicio::all();
        return view('cliente.servicios', compact('servicio'));
    }

    public function Categorias(){
        $categoria = categoria::all();
        return view('cliente.productos', compact('categoria'));
    }

    public function Productos($id){
        $categoria = categoria::find($id);
        return view('cliente.productoscategoria',  compact('categoria'));
    }

    public function Tratamientos($id){
        $mascota = mascota::find($id);
        return view('cliente.tratamientos', compact('mascota'));
    }

    public function Perfil(){
        $user = User::find(auth()->user()->id);
        return view('cliente.perfil', compact('user'));
    }

    public function updatePerfil(Request $request){
        $this->validate(request(),['carnet'=>'required','name'=>'required','email'=>'required|email']);
        $user = User::find(auth()->user()->id);
        $user->carnet = $request->carnet;
        $user->name = $request->name;
        $user->email = $request->email;

        $bitacora = new bitacora();
        $bitacora->name = 'cliente';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'cliente';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $user->id;
        $bitacora->save();


        $user->save();
        return redirect()->route('cliente.Perfil');
    }

    public function Contraseña(){
        return view('cliente.contraseña');
    }

    public function updateContraseña(Request $request){
        $this->validate(request(),['password'=>'required|confirmed',]);
        $user = User::find(auth()->user()->id);
            $user->password = $request->password;

            $bitacora = new bitacora();
            $bitacora->name = 'cliente';
            $bitacora->causer_id = $user->id;
            $bitacora->long_name = 'cliente';
            $bitacora->descripcion = 'editó';
            $bitacora->subject_id = $user->id;
            $bitacora->save();

            $user->save();
        return redirect()->route('cliente.Perfil');
    }

    
    public function Reservas(){
        return view('cliente.reserva');
    }

    public function registarReserva(Request $request){
        $this->validate(request(),['mascota_id'=>'required','servicio_id'=>'required','fecha'=>'required','periodo_id'=>'required']);
        $user = User::find(auth()->user()->id);
        $reserva= new reserva();
        $reserva->fecha = $request->fecha;
        $reserva->mascota_id = $request->mascota_id;
        $reserva->servicio_id = $request->servicio_id;

        $bitacora = new bitacora();
        $bitacora->name = 'cliente';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'reserva';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $user->id;
        $bitacora->save();


        $reserva->save();

        $ficha= new ficha();
        $ficha->fecha = $request->fecha;
        $ficha->periodo_id = $request->periodo_id;
        $ficha->reserva_id = $reserva->id;
        $ficha->save();
        return view('cliente.citas');
    }

}
