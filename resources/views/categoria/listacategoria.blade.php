@extends('layouts.app')

@section('title','Categorias Registradas')

@section('content')
<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
   <a href="{{route('admin.indexproducto')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="{{route('admin.indexcategoria')}}" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Categorias</a>
    <a href="{{route('admin.crearcategoria')}}" class="mx-2 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Registrar</a>
    </ul>
    
  </nav>
  <h1 class="text-3xl text-center font-bold">Lista de Categorias</h1>


<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
      <th class="w-20 py-4 ...">ID</th>
      <th class="w-1/8 py-4 ...">Nombre</th>
      <th class="w-1/16 py-4 ...">Descripcion</th>
      <th class="w-25 py-4 ...">Actions</th>
    </tr>
  </thead>
  <tbody>
  @foreach($categoria as $row)


<tr>
        <td class="py-3 px-6">{{$row->id}}</td>
        <td class="p-3 text-center">{{$row->nombre}}</td>
        <td class="p-3 text-center">{{$row->descripcion}}</td>
        <td class="p-3 text-center">
            
            <a href="{{route('admin.destroycategoria', $row->id)}}" class="text-black font-semibold border-2 border-red-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-red-500 hover:text-white">Borrar</a>
            <a href="{{route('admin.editarcategoria',$row->id )}}" class="text-black font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-500 hover:text-white">Editar</a>
            
          
          </td>
      </tr>

      @endforeach






    
  </tbody>
</table>
</div>
@endsection