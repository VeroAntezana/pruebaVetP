@extends('layouts.app')

@section('title','Bitacora')

@section('content')
<nav class="flex py-5 bg-green-500 text-white border-2 border-white">
    <a href="{{route('admin.index')}}" class="mx-16 font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>

    <ul class="px-16 ml-auto flex justify-center pt-1">
    <a href="{{route('admin.indexbitacora')}}" class="font-semibold border-2 border-white py-5 px-8 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Bitacora</a>
    </ul>

</nav>

<h1 class="text-3xl text-center font-bold">Bitacora</h1>

<div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<table class="my-10 table-fixed w-full">
  <thead>
    <tr class="bg-green-800 text-white">
    <th class="w-20 py-4 ...">ID</th>
      <th class="w-20 py-4 ...">Usuario</th>
      <th class="w-1/8 py-4 ...">Autor ID</th>
      <th class="w-1/16 py-4 ...">Tabla</th>
      <th class="w-1/8 py-4 ...">Acción</th>
      <th class="w-1/8 py-4 ...">ID Implicado</th>
      <th class="w-1/8 py-4 ...">Fecha</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach ($bitacora as $row)
      <tr>
              <td class="py-3 px-6 whitespace-no-wrap border-b border-gray-500">{{$row->id}}</td>
              <td class="p-3 whitespace-no-wrap border-b border-gray-500 ">{{$row->name}}</td>
              <td class="p-3 text-center whitespace-no-wrap border-b border-gray-500">{{$row->causer_id}}</td>
              <td class="p-3 text-center whitespace-no-wrap border-b border-gray-500">{{$row->long_name}}</td>
              <td class="p-3 text-center whitespace-no-wrap border-b border-gray-500">{{$row->descripcion}}</td>
              <td class="p-3 text-center whitespace-no-wrap border-b border-gray-500">{{$row->subject_id}}</td>
              <td class="p-3 text-center whitespace-no-wrap border-b border-gray-500">{{$row->created_at}}</td>
              
            </tr>




            @endforeach


    
  </tbody>
</table>
</div>
@endsection