<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\categoria;
use App\Models\bitacora;


class CategoriaController extends Controller{
    
        // Categoria
        public function indexCategoria(){
            $categoria = categoria::all();
            return view('categoria.listacategoria', compact('categoria'));
        }

        public function createCategoria(){
            return view('categoria.registrarcategoria');
        }

        public function storedCategoria(request $request){
            $this->validate(request(),['nombre'=>'required','descripcion'=>'required']);
            $categoria= categoria::create(request(['nombre','descripcion']));

            $bitacora = new bitacora();
            $bitacora->name = 'admin';
            $bitacora->causer_id = 1;
            $bitacora->long_name = 'categoria';
            $bitacora->descripcion = 'registró';
            $bitacora->subject_id = $categoria->id;
            $bitacora->save();

            $categoria->save();
            return redirect()->route('admin.indexcategoria'); 
        }

        public function destroyCategoria($id){
            $categoria = categoria::find($id);

            $bitacora = new bitacora();
            $bitacora->name = 'admin';
            $bitacora->causer_id = 1;
            $bitacora->long_name = 'categoria';
            $bitacora->descripcion = 'eliminó';
            $bitacora->subject_id = $id;
            $bitacora->save();

            $categoria->delete();
            return redirect()->route('admin.indexcategoria'); 
        }

        public function editCategoria($id) {
            $categoria = categoria::find($id);
            return view('categoria.editarcategoria', compact('categoria'));
        }

        public function updateCategoria(Request $request, $id ) {
            $this->validate(request(),['nombre'=>'required','descripcion'=>'required']);
            $categoria = categoria::find($id);
            $categoria->nombre = $request->nombre;
            $categoria->descripcion = $request->descripcion;

            $bitacora = new bitacora();
            $bitacora->name = 'admin';
            $bitacora->causer_id = 1;
            $bitacora->long_name = 'categoria';
            $bitacora->descripcion = 'editó';
            $bitacora->subject_id = $id;
            $bitacora->save();

            $categoria->save();
            return redirect()->route('admin.indexcategoria');
        }
}
