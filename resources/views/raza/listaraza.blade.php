@extends('layouts.app')

@section('title','Razas Registradas')

@section('content')
<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM razas");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexmascota')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Razas</a>
    <a href="{{route('admin.crearraza')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Razas</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/16 py-4 ...">Nombre</th>
      <th class="w-1/16 py-4 ...">Descripcion</th>
      <th class="w-1/16 py-4 ...">Especie</th>
      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>


  <?php while($razas = mysqli_fetch_array($datos)){ ?>
<tr>
        <td class="py-3 px-6 text-center"><?php echo  $razas['id']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $razas['nombre']; ?></td>
        <td class="py-3 px-6 text-center"><?php echo  $razas['descripcion']; ?></td>


        <?php $datosesp = $con->query("SELECT * FROM especies"); while($especies = mysqli_fetch_array($datosesp)){ ?>
          <?php if($razas['especie_id']==$especies['id']){?>
            <td class="p-3 text-center"> <?php echo  $especies['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>
          


          
        <td class="p-3 text-center">
        <a href="{{route('admin.destroyraza', $razas['id'])}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
        <a href="{{route('admin.editraza', $razas['id'])}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
        
          
          </td>
      </tr>
      <?php }?>





 


    
  </tbody>
</table>
</div>
@endsection