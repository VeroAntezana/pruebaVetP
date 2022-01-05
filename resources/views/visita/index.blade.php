@extends('layouts.app')

@section('title','Visitas Registradas')

@section('content')
<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM visitas");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexservicio')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Visitas</a>
    <a href="{{route('admin.crearvisita')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Visitas</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/16 py-4 ...">Veterinario</th>
      <th class="w-1/16 py-4 ...">Descripcion</th>
      <th class="w-1/16 py-4 ...">Detalle</th>
      <th class="w-1/16 py-4 ...">Fecha/Hora</th>

      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>


  <?php while($visitas = mysqli_fetch_array($datos)){ ?>
<tr>
        <td class="py-3 px-6 text-center"><?php echo  $visitas['id']; ?></td>

        <?php $datosvet = $con->query("SELECT * FROM users"); while($veterinario = mysqli_fetch_array($datosvet)){ ?>
          <?php if($veterinario['id'] == $visitas['user_id']){?>
            <td class="p-3 text-center"> <?php echo  $veterinario['name']; ?> </td>
          <?php }?>
          <?php }?>



        <?php $datosmas = $con->query("SELECT visitas.id, mascotas.nombre FROM visitas, tratamientos , mascotas  WHERE tratamientos.id=visitas.tratamiento_id AND tratamientos.mascota_id=mascotas.id"); while($mascota = mysqli_fetch_array($datosmas)){ ?>
          <?php if($mascota['id'] == $visitas['id']){?>
            <td class="p-3 text-center"> <?php echo  $mascota['nombre']; ?> </td>
          <?php }?>
          <?php }?>





        <td class="py-3 px-6 text-center"><?php echo  $visitas['descripcion']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $visitas['detalle']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $visitas['fecha']; ?> - <?php echo  $visitas['fecha']; ?></td>


        <td class="p-3 text-center">
        <a href="{{route('admin.destroyvisita', $visitas['id'])}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
        <a href="{{route('admin.editvisita', $visitas['id'])}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
        
          
          </td>
      </tr>
      <?php }?>





 


    
  </tbody>
</table>
</div>
@endsection