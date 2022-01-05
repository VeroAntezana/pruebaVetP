<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\tratamiento;
use App\Models\mascota;
use App\Models\servicio;
use App\Models\User;
use App\Models\reserva;
use App\Models\ficha;
use App\Models\bitacora;

class VeterinarioController extends Controller{
    
    public function index(){
        return view('veterinario.index');
    }

    public function Clientes(){
        $user = User::all();
        return view('veterinario.clientes', compact('user'));
        
    }

    public function Mascotas($id){
        $user = User::find($id);
        $mascotas = mascota::all();
        return view('veterinario.mascotas', compact('user'), compact('mascotas'));
    }

    public function Tratamientos($id){
        $mascota = mascota::find($id);
        return view('veterinario.tratamientos', compact('mascota'));
    }

    public function createTratamiento(){
        $mascota = mascota::all();
        return view('veterinario.creartratamiento', compact('mascota'));
    } 

    public function storedTratamiento(request $request){
        $this->validate(request(),['finicio'=>'required','ffin'=>'required','diagnostico'=>'required','precio'=>'required','mascota_id'=>'required']);
        $user = User::find(auth()->user()->id);
        $tratamiento= tratamiento::create(request(['diagnostico','finicio','ffin','precio','mascota_id']));

        $bitacora = new bitacora();
        $bitacora->name = 'veterinario';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'tratamiento';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $tratamiento->id;
        $bitacora->save();

        $mascota = mascota::find($tratamiento->mascota_id);

        $tratamiento->save();
        return view('veterinario.tratamientos', compact('mascota'));
    }


    public function editTratamiento($id) {
        $tratamiento = tratamiento::find($id);
        $mascota = mascota::all();
        return view('veterinario.editartratamiento', compact('mascota'), compact('tratamiento'));
    }

    public function updateTratamiento(Request $request, $id ) {
        $this->validate(request(),['finicio'=>'required','ffin'=>'required','diagnostico'=>'required','precio'=>'required','mascota_id'=>'required']);
        $user = User::find(auth()->user()->id);
        $tratamiento = tratamiento::find($id);
        $tratamiento->finicio = $request->finicio;
        $tratamiento->ffin = $request->ffin;
        $tratamiento->diagnostico = $request->diagnostico;
        $tratamiento->precio = $request->precio;
        $tratamiento->mascota_id = $request->mascota_id;

        $bitacora = new bitacora();
        $bitacora->name = 'veterinario';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'tratamiento';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $mascota = mascota::find($tratamiento->mascota_id);


        $tratamiento->save();
        return view('veterinario.tratamientos', compact('mascota'));
        
    }

    public function destroyTratamiento($id){
        $tratamiento = tratamiento::find($id);
        $mascota = mascota::find($tratamiento->mascota_id);
        $user = User::find(auth()->user()->id);

        $bitacora = new bitacora();
        $bitacora->name = 'veterinario';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'tratamiento';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $tratamiento->delete();
        return view('veterinario.tratamientos', compact('mascota'));
    }


    public function Citas(){
        return view('veterinario.citas');
    }

    public function Categorias(){
        $categoria = categoria::all();
        return view('veterinario.productos', compact('categoria'));
    }

    public function Productos($id){
        $categoria = categoria::find($id);
        return view('veterinario.productoscategoria',  compact('categoria'));
    }



    public function Perfil(){
        $user = User::find(auth()->user()->id);
        return view('veterinario.perfil', compact('user'));
    }

    public function updatePerfil(Request $request){
        $this->validate(request(),['carnet'=>'required','name'=>'required','email'=>'required|email']);
        $user = User::find(auth()->user()->id);
        $user->carnet = $request->carnet;
        $user->name = $request->name;
        $user->email = $request->email;

        $bitacora = new bitacora();
        $bitacora->name = 'veterinario';
        $bitacora->causer_id = $user->id;
        $bitacora->long_name = 'veterinario';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $user->id;
        $bitacora->save();


        $user->save();
        return redirect()->route('veterinario.Perfil');
    }

    public function Contraseña(){
        return view('veterinario.contraseña');
    }

    public function updateContraseña(Request $request){
        $this->validate(request(),['password'=>'required|confirmed',]);
        $user = User::find(auth()->user()->id);
            $user->password = $request->password;

            $bitacora = new bitacora();
            $bitacora->name = 'veterinario';
            $bitacora->causer_id = $user->id;
            $bitacora->long_name = 'veterinario';
            $bitacora->descripcion = 'editó';
            $bitacora->subject_id = $user->id;
            $bitacora->save();

            $user->save();
        return redirect()->route('veterinario.Perfil');
    }

}



