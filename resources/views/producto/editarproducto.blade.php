@extends('layouts.app')

@section('title','Editar Producto')

@section('content')

<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM productos");
?>

<nav class="bg-green-500 py-6">
    <a href="{{route('admin.registrarproducto')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Editar Producto {{$producto->nombre}} </h1>

<form class="mt-4" method="POST" action="{{route('admin.updateproducto',$producto->id)}}">
    @csrf
    <label for="">Nombre: </label>
    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Nombre" id="nombre" name="nombre" value="{{$producto->nombre}}">
    @error('nombre')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <label for="">Descripcion: </label>
    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Descripcion" id="descripcion" name="descripcion" value="{{$producto->descripcion}}">
    @error('descripcion')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <label for="">Precio: </label>
    <input type="integer" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="precio" id="precio" name="precio" value="{{$producto->precio}}">
    @error('precio')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <label for="">Stock: </label>
    <input type="integer" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Stock Total" id="stock" name="stock" value="{{$producto->stock}}">
    @error('stock')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <label for="">Categoria</label>
    <select name=categoria_id id=categoria_id class="form-control">
   
        <option value=""> -- Escoja la categoria--</option>

        @foreach($categoria as $categorias)
        <option value="{{$categorias['id']}}">{{$categorias['nombre']}}</option>

        @endforeach
        
    </select>
    @error('categoria_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <div class="my-5"></div>


    <label for="">Presentacion</label>
    <select name=presentacion_id id=presentacion_id class="form-control">
        <option value=""> -- escoja Presentacion --</option>

    
        <?php $datospres = $con->query("SELECT * FROM presentacions"); while($presentacion = mysqli_fetch_array($datospres)){ ?>
            <option value="<?php echo  $presentacion['id']; ?>"><?php echo  $presentacion['nombre']; ?></option>
        
        <?php }?>

    </select>
    @error('presentacion_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
    
    <div class="my-5"></div>

    <label for="">Marca</label>
    <select name=marca_id id=marca_id class="form-control">
        <option value=""> -- escoja Marca --</option>

    
        <?php $datosmarca = $con->query("SELECT * FROM marcas"); while($marca = mysqli_fetch_array($datosmarca)){ ?>
            <option value="<?php echo  $marca['id']; ?>"><?php echo  $marca['nombre']; ?></option>
        
        <?php }?>
        </select>
        @error('marca_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror



    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Editar</button>

</form>



</div>
@endsection