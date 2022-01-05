@extends('layouts.app')

@section('title','Fichas Registradas')

@section('content')
<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM fichas");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexreserva')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Fichas</a>
    <a href="{{route('admin.crearficha')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Fichas</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/16 py-4 ...">Fecha</th>
      <th class="w-1/16 py-4 ...">Periodo</th>
      <th class="w-1/16 py-4 ...">Reserva</th>
      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>


  <?php while($fichas = mysqli_fetch_array($datos)){ ?>
<tr>
        <td class="py-3 px-6 text-center"><?php echo  $fichas['id']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $fichas['fecha']; ?></td>

        <?php $datosperiodo = $con->query("SELECT * FROM periodos"); while($periodo = mysqli_fetch_array($datosperiodo)){ ?>
          <?php if($periodo['id']==$fichas['periodo_id']){?>
            <td class="p-3 text-center"> <?php echo  $periodo['inicio']; ?> - <?php echo  $periodo['fin']; ?> </td>
          
          <?php }?>
          <?php }?>

        <td class="py-3 px-6 text-center"><?php echo  $fichas['reserva_id']; ?></td>
        

          
        <td class="p-3 text-center">
        <a href="{{route('admin.destroyficha',$fichas['id'] )}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
        <a href="{{route('admin.editficha',$fichas['id'] )}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
        
          
          </td>
      </tr>
      <?php }?>





 


    
  </tbody>
</table>
</div>
@endsection