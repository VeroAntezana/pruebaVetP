@extends('veterinario.app')

@section('title','Home Veterinario')

@section('content')
<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT reservas.*, users.id as user_id FROM users, mascotas, reservas WHERE users.id=mascotas.user_id and mascotas.id=reservas.mascota_id");
?>

<div class="my-10"></div>
  <h1 class="text-3xl text-center font-bold">Citas:</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-700 text-white">
      <th class="w-1/16 py-4 ...">Mascota</th>
      <th class="w-1/16 py-4 ...">Fecha</th>
      <th class="w-1/16 py-4 ...">Periodo</th>
      <th class="w-1/16 py-4 ...">Servicio</th>



    </tr>
  </thead>
  <tbody>


  <?php while($reservas = mysqli_fetch_array($datos)){ ?>
   
<tr>



        

        <?php $datosmas = $con->query("SELECT * FROM mascotas"); while($mascotas = mysqli_fetch_array($datosmas)){ ?>
          <?php if($mascotas['id']==$reservas['mascota_id']){?>
            <td class="p-3 text-center"> <?php echo  $mascotas['nombre']; ?> </td>
          <?php }?>
          <?php }?>



        <td class="py-3 px-6 text-center"><?php echo  $reservas['fecha']; ?></td>

        <?php $datosperiodo = $con->query("SELECT * FROM reservas, fichas, periodos WHERE reservas.id=fichas.reserva_id AND fichas.periodo_id=periodos.id"); while($periodo = mysqli_fetch_array($datosperiodo)){ ?>
          <?php if($reservas['id']==$periodo['reserva_id']){?>
            <td class="p-3 text-center"> <?php echo  $periodo['inicio']; ?> - <?php echo  $periodo['fin']; ?> </td>
          <?php }?>
          <?php }?>



          <?php $datosservicio = $con->query("SELECT * FROM servicios"); while($servicios = mysqli_fetch_array($datosservicio)){ ?>
          <?php if($servicios['id']==$reservas['servicio_id']){?>
            <td class="p-3 text-center"> <?php echo  $servicios['nombre']; ?> </td>
          <?php }?>
          <?php }?>





      </tr>
      <?php }?>





 


    
  </tbody>
</table>
</div>

@endsection