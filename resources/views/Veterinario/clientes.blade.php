@extends('veterinario.app')

@section('title','Clientes')

@section('content')

<?php $con = new mysqli('localhost','root','','prueba');
$datos = $con->query("SELECT * FROM mascotas");
?>


<h1 class=" my-10 text-3xl text-center font-bold">Lista de clientes</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-gray-600 text-white">
    <th class="w-1/8 py-4 ...">Id</th>
      <th class="w-1/8 py-4 ...">Carnet</th>
      <th class="w-1/8 py-4 ...">Nombre</th>
      <th class="w-1/8 py-4 ...">E-mail</th>
      <th class="w-1/8 py-4 ...">Ver</th>


    </tr>
  </thead>
  <tbody>

      <tr>
      @foreach($user as $row)

@if($row->role == 'cliente')
<tr>
        <td class="py-3 px-6">{{$row->id}}</td>
        <td class="p-3">{{$row->carnet}}</td>
        <td class="p-3 text-center">{{$row->name}}</td>
        <td class="p-3 text-center">{{$row->email}}</td>
        <td class="p-1 text-center">
        <button class="bg-green-500 text-white px-3 py-1 rounded-sm" onclick="window.location='{{route('veterinario.Mascotas', $row->id )}}'">
                <i class="fas fa-paw"> _ Mascotas</i></button>

            
          </td>

      </tr>
@endif




      @endforeach



      </tr>

    
  </tbody>
</table>
</div>

@endsection