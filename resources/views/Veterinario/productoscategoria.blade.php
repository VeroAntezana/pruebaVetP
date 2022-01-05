@extends('veterinarios.app')

@section('title','Productos')

@section('content')
<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM productos");
?>


  <h1 class=" my-10 text-3xl text-center font-bold">Lista de {{$categoria->nombre}}</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-700 text-white">
      <th class="w-1/32 py-4 ...">Nombre</th>
      <th class="w-1/32 py-4 ...">Descripcion</th>
      <th class="w-1/32 py-4 ...">Categoria</th>
      <th class="w-1/32 py-4 ...">Presentacion</th>
      <th class="w-1/32 py-4 ...">Marca</th>
      <th class="w-1/32 py-4 ...">Precio</th>
    </tr>
  </thead>
  <tbody>
    <?php while($productos = mysqli_fetch_array($datos)){ ?>
        <?php if($productos['categoria_id'] == $categoria->id ){?>
      <tr>

    
        <td class="p-3 text-center"> <?php echo $productos['nombre']; ?> </td>
        <td class="p-3 text-center"><?php echo $productos['descripcion']; ?> </td>

        <?php $datoscat = $con->query("SELECT * FROM categorias"); while($categorias = mysqli_fetch_array($datoscat)){ ?>
          <?php if($productos['categoria_id']==$categorias['id']){?>
            <td class="p-3 text-center"> <?php echo  $categorias['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>

          <?php $datospres = $con->query("SELECT * FROM presentacions"); while($presentacion = mysqli_fetch_array($datospres)){ ?>
          <?php if($productos['presentacion_id']==$presentacion['id']){?>
            <td class="p-3 text-center"> <?php echo  $presentacion['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>

          <?php $datosmarca = $con->query("SELECT * FROM marcas"); while($marca = mysqli_fetch_array($datosmarca)){ ?>
          <?php if($productos['marca_id']==$marca['id']){?>
            <td class="p-3 text-center"> <?php echo  $marca['nombre']; ?> </td>
          
          <?php }?>
          <?php }?>


        <td class="p-3 text-center"> <?php echo $productos['precio']; ?> Bs. </td>

      </tr>
      <?php } ?>
    <?php } ?>






  </tbody>
</table>
</div>

@endsection