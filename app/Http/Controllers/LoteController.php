<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\categoria;
use App\Models\lote;
use App\Models\bitacora;



class LoteController extends Controller{
   
    public function indexLote(){
        $lote = lote::all();
        return view('lote.listalote', compact('lote'));
    }
    
    public function createLote(){
        $producto = producto::all();
        return view('lote.registrarlote', compact('producto'));
    }

    public function storedLote(request $request){
        $this->validate(request(),['fcompra'=>'required','felaboracion'=>'required','fexpiracion'=>'required','producto_id'=>'required','stock'=>'required']);
        $lote = lote::create(request(['fcompra','felaboracion','fexpiracion','producto_id','stock']));


        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'lote';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $lote->id;
        $bitacora->save();

        $lote->save();
        return redirect()->route('admin.indexlote'); 
    }

    public function editLote($id) {
        $lote = lote::find($id);
        $producto = producto::all();
        return view('lote.editarlote', compact('lote'),compact('producto'));
    }

    public function updateLote(Request $request, $id ) {
        $this->validate(request(),['fcompra'=>'required','felaboracion'=>'required','fexpiracion'=>'required','producto_id'=>'required','stock'=>'required']);
        $lote = lote::find($id);
        $lote->fcompra = $request->fcompra;
        $lote->felaboracion = $request->felaboracion;
        $lote->fexpiracion = $request->fexpiracion;
        $lote->producto_id = $request->producto_id;
        $lote->stock = $request->stock;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'lote';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $lote->id;
        $bitacora->save();

        $lote->save();
        return redirect()->route('admin.indexlote');
    }

}
