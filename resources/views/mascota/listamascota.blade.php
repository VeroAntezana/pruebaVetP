@extends('layouts.app')

@section('title','Mascotas Registradas')

@section('content')

<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM mascotas");
?>

<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexmascota')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="{{route('admin.listamascota')}}" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Mascotas</a>
    <a href="{{route('admin.crearmascota')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Mascotas</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/8 py-4 ...">Dueño</th>
      <th class="w-1/8 py-4 ...">Nombre</th>
      <th class="w-1/8 py-4 ...">Fecha de Nacimiento</th>
      <th class="w-1/8 py-4 ...">color</th>
      <th class="w-20 py-4 ...">Sexo</th>
      <th class="w-1/8 py-4 ...">Raza</th>
      <th class="w-20 py-4 ...">Especie</th>
      <th class="w-1/8 py-4 ...">Imagen</th>

      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php while($mascota = mysqli_fetch_array($datos)){ ?>
      <tr>

        <td class="py-3 px-6"> <?php echo $mascota['id']; ?> </td>

        <?php $datosuser = $con->query("SELECT * FROM users"); while($usuarios = mysqli_fetch_array($datosuser)){ ?>
          <?php if($mascota['user_id']==$usuarios['id']){?>
            <td class="p-3 text-center"> <?php echo  $usuarios['name']; ?> </td>
            <?php }?>
          <?php }?>
          



        <td class="p-3 text-center"> <?php echo $mascota['nombre']; ?> </td>
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


        <td class="p-3 text-center"> 
          <img src="<?php echo  $mascota['imagen']; ?>" width="60%">    
      </td>



        
        <td class="p-1 text-center">
            
            <a href="{{route('admin.destroymascota', $mascota['id'])}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
            <a href="{{route('admin.editmascota', $mascota['id'])}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8  pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
            
       
          </td>
      </tr>
 
    <?php } ?>
    
  </tbody>
</table>
</div>
@endsection