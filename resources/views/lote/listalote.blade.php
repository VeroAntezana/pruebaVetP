@extends('layouts.app')

@section('title','Lotes Registradas')

@section('content')
<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM lotes");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexproducto')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="{{route('admin.indexlote')}}" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Lotes</a>
    <a href="{{route('admin.createlote')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Lotes</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/8 py-4 ...">Producto</th>
      <th class="w-1/16 py-4 ...">Fecha de compra</th>
      <th class="w-1/16 py-4 ...">Fecha de Elaboracion</th>
      <th class="w-1/16 py-4 ...">Fecha de expiracion</th>
      <th class="w-1/16 py-4 ...">Stock</th>

      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>


  <?php while($lotes = mysqli_fetch_array($datos)){ ?>
<tr>
        <td class="py-3 px-6"><?php echo  $lotes['id']; ?></td>

        <?php $datospro = $con->query("SELECT * FROM productos"); while($productos = mysqli_fetch_array($datospro)){ ?>
          <?php if($lotes['producto_id']==$productos['id']){?>
            <td class="p-3 text-center"> <?php echo  $productos['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>
          
        <td class="p-3 text-center"><?php echo  $lotes['fcompra']; ?></td>
        <td class="p-3 text-center"><?php echo  $lotes['felaboracion']; ?></td>
        <td class="p-3 text-center"><?php echo  $lotes['fexpiracion']; ?></td>
        <td class="p-3 text-center"><?php echo  $lotes['stock']; ?></td>


          
        <td class="p-3 text-center">
        <a href="{{route('admin.editlote',$lotes['id'])}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
        
          
          </td>
      </tr>
      <?php }?>





 


    
  </tbody>
</table>
</div>
@endsection