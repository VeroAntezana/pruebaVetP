@extends('veterinario.app')

@section('title','Tratamientos de la Mascota')

@section('content')


<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM tratamientos");
?>


  <h1 class=" my-10 text-3xl text-center font-bold">Historial Clinico de {{$mascota->nombre}}</h1>

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <button class="bg-yellow-500 text-white px-3 py-1 rounded-sm" onclick="window.location='{{route('veterinario.crearTratamiento', $mascota->id)}}'">
                <i class="fas fa-paw"> _Registrar tratamiento</i></button>

            
<table class="my-10 table-fixed w-full">

  <thead>
    <tr class="bg-gray-600 text-white">
     <th class="w-1/32 py-4 ...">Diagnostico</th>
      <th class="w-25 py-4 ...">Fecha de Inicio</th>
      <th class="w-25 py-4 ...">Fecha de Conclucion</th>
      <th class="w-25 py-4 ...">Precio</th>
      <th class="w-25 py-4 ...">Editar</th>
      <th class="w-25 py-4 ...">Borrar</th>

      

    </tr>
  </thead>
  <tbody>


  <?php while($tratamientos = mysqli_fetch_array($datos)){ ?>
    <?php if($mascota->id == $tratamientos['mascota_id']){?>


<tr>

        <td class="py-3 px-6 text-center"><?php echo  $tratamientos['diagnostico']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $tratamientos['finicio']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $tratamientos['ffin']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $tratamientos['precio']; ?></td>

        <td class="p-1 text-center">
        <button class="bg-blue-500 text-white px-3 py-1 rounded-sm" onclick="window.location='{{route('veterinario.editTratamiento', $tratamientos['id'])}}'">
                <i class="fas fa-pen"> _ Editar</i></button>

            
          </td>
          <td class="p-1 text-center">
        <button class="bg-red-500 text-white px-3 py-1 rounded-sm" onclick="window.location='{{route('veterinario.deleteTratamiento', $tratamientos['id'])}}'">
                <i class="fas fa-trash-alt"> _ Eliminar</i></button>

            
          </td>




      </tr>
      <?php }?>
      <?php }?>





 


    
  </tbody>
</table>
</div>

@endsection