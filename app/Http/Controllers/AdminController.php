<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\product;
use App\Models\bitacora;
class AdminController extends Controller{
    
    public function index(){
        return view('admin.index');
    }

    /*/////////////////////////////////////////////////////////////////
    /////////////////  Funciones para los clientes ////////////////////
    /////////////////////////////////////////////////////////////////// */

    /*////// Crear al cliente /////*/

    /*Manda al view clienteRegister */
    public function registrarC(){
        $user = User::all();
        return view('admin.ClienteRegister', compact('user'));
        
    }
    /*Manda al view crearCliente */
    public function createCliente(){
        return view('admin.crearCliente');
    }
    /*Guarda los datos del cliente */
    public function storedCliente(){
        $this->validate(request(),['carnet'=>'required','name'=>'required','email'=>'required|email','password'=>'required|confirmed',]);
        $user = User::create(request(['carnet','name','email','password']));
        $user->role='cliente';
        
        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'cliente';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $user->id;
        $bitacora->save();
        $user->save();
        return redirect()->route('admin.registrarcliente');     
    }

    /*////// Elimina a un cliente //// */

    public function destroyCliente($id){
        $user = User::find($id);
        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'cliente';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();
        $user->delete();
        return redirect()->route('admin.registrarcliente');
    }

    /*///// Edita un cliente////// */

    public function editCliente($id){
        $user = User::find($id);
        return view('admin.editarCliente',compact('user'));
    }

    /* cambia los datos al editar presionando el button */
    public function updateCliente(Request $request, $id){
        $user = User::find($id);
        $user->carnet = $request->carnet;
        $user->name = $request->name;
        $user->email = $request->email;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'cliente';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $user->save();
        return redirect()->route('admin.registrarcliente');

    }
    


    /*////////////////////////////////////////////////////////////////////
    /////////////////  Funciones para los veterinario ////////////////////
    ////////////////////////////////////////////////////////////////////// */

        /*////// Crear Veterinario /////*/

    /*Manda al view veterinarioRegister */
    public function registrarV(){
        $user = User::all();
        return view('admin.VeterinarioRegister', compact('user'));
    }

    /*Manda al view crearVeterinario */
    public function createVeterinario(){
        return view('admin.crearVeterinario');
    }

    /*Guarda los datos del veterinario */
    public function storedVeterinario(){
        $this->validate(request(),['carnet'=>'required','name'=>'required','email'=>'required|email','password'=>'required|confirmed',]);
        $user = User::create(request(['carnet','name','email','password']));
        $user->role='veterinario';

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'veterinario';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $user->id;
        $bitacora->save();

        $user->save();
        return redirect()->route('admin.registrarveterinario');
    }

    /*////// Elimina a un veterinario //// */
    public function destroyVeterinario($id){
        $user = User::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'veterinario';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $user->delete();
        return redirect()->route('admin.registrarveterinario');
    }

    /*///// Edita un veterinario////// */
    public function editVeterinario($id){
        $user = User::find($id);
        return view('admin.editarVeterinario',compact('user'));
    }

    /* cambia los datos al editar presionando el button */
    public function updateVeterinario(Request $request, $id){
        $user = User::find($id);
        $user->carnet = $request->carnet;
        $user->name = $request->name;
        $user->email = $request->email;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'veterinario';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $user->save();
        return redirect()->route('admin.registrarveterinario');

    }


}

    
