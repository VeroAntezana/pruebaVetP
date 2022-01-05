@extends('layouts.app')

@section('title','Reservas Registradas')

@section('content')
<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM reservas");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexreserva')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Reservas</a>
    <a href="{{route('admin.crearreserva')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Reservas</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/16 py-4 ...">Cliente</th>
      <th class="w-1/16 py-4 ...">Mascota</th>
      <th class="w-1/16 py-4 ...">Fecha</th>

      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>


  <?php while($reservas = mysqli_fetch_array($datos)){ ?>
<tr>
        <td class="py-3 px-6 text-center"><?php echo  $reservas['id']; ?></td>


        <?php $datoscli = $con->query("SELECT mascotas.id, users.name FROM mascotas, users where user_id=users.id"); while($cliente = mysqli_fetch_array($datoscli)){ ?>
          <?php if($cliente['id']==$reservas['mascota_id']){?>
            <td class="p-3 text-center"> <?php echo  $cliente['name']; ?> </td>
          <?php }?>
          <?php }?>
        

        <?php $datosmas = $con->query("SELECT * FROM mascotas"); while($mascotas = mysqli_fetch_array($datosmas)){ ?>
          <?php if($mascotas['id']==$reservas['mascota_id']){?>
            <td class="p-3 text-center"> <?php echo  $mascotas['nombre']; ?> </td>
          <?php }?>
          <?php }?>



        <td class="py-3 px-6 text-center"><?php echo  $reservas['fecha']; ?></td>



          
        <td class="p-3 text-center">
        <a href="{{route('admin.destoyreserva',$reservas['id'] )}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
        <a href="{{route('admin.editreserva',$reservas['id'] )}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
        
          
          </td>
      </tr>
      <?php }?>





 


    
  </tbody>
</table>
</div>
@endsection