@extends('layouts.app')

@section('title','Especies Registradas')

@section('content')

<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM especies");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexmascota')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="{{route('admin.indexespecie')}}" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Especies</a>
    <a href="{{route('admin.crearespecie')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Especies</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/8 py-4 ...">Nombre</th>
      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php while($especie = mysqli_fetch_array($datos)){ ?>
      <tr>

        <td class="py-3 px-6"> <?php echo $especie['id']; ?> </td>
        <td class="p-3 text-center"> <?php echo $especie['nombre']; ?> </td>



        <td class="p-1 text-center">
            
            <a href="{{route('admin.destroyespecie', $especie['id'])}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
            <a href="{{route('admin.editespecie', $especie['id'])}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8  pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
            
       
          </td>
      </tr>
 
    <?php } ?>
    
  </tbody>
</table>
</div>
@endsection