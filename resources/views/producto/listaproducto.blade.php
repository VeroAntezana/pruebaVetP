@extends('layouts.app')

@section('title','Productos Registrados')

@section('content')

<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM productos");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexproducto')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="{{route('admin.registrarproducto')}}" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Productos</a>
    <a href="{{route('admin.crearproducto')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Productos</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-10 py-4 ...">ID</th>
      <th class="w-1/32 py-4 ...">Nombre</th>
      <th class="w-1/32 py-4 ...">Descripcion</th>
      <th class="w-1/32 py-4 ...">Categoria</th>
      <th class="w-1/32 py-4 ...">Presentacion</th>
      <th class="w-1/32 py-4 ...">Marca</th>
      <th class="w-1/32 py-4 ...">Precio</th>
      <th class="w-10 py-4 ...">Stock</th>
      <th class="w-30 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php while($productos = mysqli_fetch_array($datos)){ ?>
      <tr>

        <td class="py-3 px-6"> <?php echo $productos['id']; ?> </td>
        <td class="p-3 text-center"> <?php echo $productos['nombre']; ?> </td>
        <td class="p-3 text-center"><?php echo $productos['descripcion']; ?> </td>

        <?php $datoscat = $con->query("SELECT * FROM categorias"); while($categorias = mysqli_fetch_array($datoscat)){ ?>
          <?php if($productos['categoria_id']==$categorias['id']){?>
            <td class="p-3 text-center"> <?php echo  $categorias['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>

          <?php $datospres = $con->query("SELECT * FROM presentacions"); while($presentacion = mysqli_fetch_array($datospres)){ ?>
          <?php if($productos['presentacion_id']==$presentacion['id']){?>
            <td class="p-3 text-center"> <?php echo  $presentacion['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>

          <?php $datosmarca = $con->query("SELECT * FROM marcas"); while($marca = mysqli_fetch_array($datosmarca)){ ?>
          <?php if($productos['marca_id']==$marca['id']){?>
            <td class="p-3 text-center"> <?php echo  $marca['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>


        <td class="p-3 text-center"> <?php echo $productos['precio']; ?> </td>

        <td class="py-3 text-center"><?php echo $productos['stock']; ?> </td>
        <td class="p-1 text-center">
            
            <a href="{{route('admin.destroyproducto',$productos['id'])}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
            <a href="{{route('admin.editproducto', $productos['id'])}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8  pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
            
       
          </td>
      </tr>
 
    <?php } ?>






  </tbody>
</table>
</div>
@endsection