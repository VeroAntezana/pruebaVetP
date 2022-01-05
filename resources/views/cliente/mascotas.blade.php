@extends('cliente.app')

@section('title','Mascotas del Cliente')

@section('content')

<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM mascotas");
?>


<h1 class=" my-10 text-3xl text-center font-bold">Mascotas de {{ auth()->user()->name}}</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-600 text-white">
      <th class="w-1/8 py-4 ...">Nombre</th>
      <th class="w-1/8 py-4 ...">Fecha de Nacimiento</th>
      <th class="w-1/8 py-4 ...">color</th>
      <th class="w-20 py-4 ...">Sexo</th>
      <th class="w-1/8 py-4 ...">Raza</th>
      <th class="w-20 py-4 ...">Especie</th>

      <th class="w-25 py-4 ...">Ver</th>
    </tr>
  </thead>
  <tbody>
  <?php while($mascota = mysqli_fetch_array($datos)){ ?>
    <?php if($mascota['user_id'] == auth()->user()->id ){?>
            
    
      <tr>


          



        <td class="p-3 text-center font-bold"> <?php echo $mascota['nombre']; ?> </td>
        <td class="p-3 text-center"> <?php echo $mascota['fnacimiento']; ?> </td>
        <td class="p-3 text-center"> <?php echo $mascota['color']; ?> </td>
        <td class="p-3 text-center"> <?php echo $mascota['sexo']; ?> </td>

        <?php $datosraza = $con->query("SELECT * FROM razas"); while($razas = mysqli_fetch_array($datosraza)){ ?>
          <?php if($mascota['raza_id']==$razas['id']){?>
            <td class="p-3 text-center"> <?php echo  $razas['nombre']; ?> </td>

            <?php $datosesp = $con->query("SELECT * FROM especies"); while($especies = mysqli_fetch_array($datosesp)){ ?>
            <?php if($razas['especie_id']==$especies['id']){?>
            <td class="p-3 text-center"> <?php echo  $especies['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>
          
          <?php }?>
          <?php }?>



      <td class="p-1 text-center">
        <button class="bg-blue-500 text-white px-3 py-1 rounded-sm" onclick="window.location='{{ route('cliente.Tratamientos', $mascota['id']) }}'">
                <i class="fas fa-paw"> _ Historial Clinico</i></button>

            
          </td>



        

      </tr>
      <?php }?>
    <?php } ?>
    
  </tbody>
</table>
</div>

@endsection