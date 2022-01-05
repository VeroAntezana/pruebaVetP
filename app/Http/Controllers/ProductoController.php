<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\User;
use App\Models\categoria;
use App\Models\presentacion;
use App\Models\marca;
use App\Models\bitacora;

class ProductoController extends Controller{

    public function index(){
        return view('producto.index');
    }
    

    public function registrarProducto(){
        $producto = producto::all();
        return view('producto.listaproducto', compact('producto'));
    }

    public function createProducto(){
        $categoria = categoria::all();
        $presentacion = presentacion::all();
        return view('producto.crearProducto', compact('categoria'), compact('presentacion'));
    }
    
    public function storedProducto(Request $request){
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required','precio'=>'required','stock'=>'required','categoria_id'=>'required','presentacion_id'=>'required','marca_id'=>'required']);
        $product = producto::create(request(['nombre','descripcion','precio','stock','categoria_id','presentacion_id','marca_id']));

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'producto';
        $bitacora->descripcion = 'registró';
        $bitacora->subject_id = $product->id;
        $bitacora->save();

        $product->save();
        return redirect()->route('admin.registrarproducto'); 
    }
    // eliminar un producto
    public function destroyProducto($id){
        $producto = producto::find($id);

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'producto';
        $bitacora->descripcion = 'eliminó';
        $bitacora->subject_id = $id;
        $bitacora->save();

        $producto->delete();
        return redirect()->route('admin.registrarproducto');
    }

    //editar un producto

    public function editProducto($id){
        $producto = producto::find($id);
        $categoria = categoria::all();
        $presentacion = presentacion::all();
        return view('producto.editarproducto',compact('producto'), compact('categoria'));
    }

    /* cambia los datos al editar presionando el button */
    public function updateProducto(Request $request, $id){
        $this->validate(request(),['nombre'=>'required','descripcion'=>'required','precio'=>'required','stock'=>'required','categoria_id'=>'required','presentacion_id'=>'required','marca_id'=>'required']);
        $product = producto::find($id);
        $product->nombre = $request->nombre;
        $product->descripcion = $request->descripcion;
        $product->precio = $request->precio;
        $product->stock = $request->stock;
        $product->categoria_id = $request->categoria_id;
        $product->presentacion_id = $request->presentacion_id;
        $product->marca_id = $request->marca_id;

        $bitacora = new bitacora();
        $bitacora->name = 'admin';
        $bitacora->causer_id = 1;
        $bitacora->long_name = 'producto';
        $bitacora->descripcion = 'editó';
        $bitacora->subject_id = $id;
        $bitacora->save();
        
        $product->save();
        return redirect()->route('admin.registrarproducto');

    }
    






}
