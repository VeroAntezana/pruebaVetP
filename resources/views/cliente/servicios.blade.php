@extends('cliente.app')

@section('title','Servicios')

@section('content')
<main class="py-12 md:px-20 sm:px-14 px-6">

  <div class="sm:flex items-center shadow-md">
  @foreach($servicio as $row)
  </div>
  <div class="mt-6 md:flex space-x-6">
    <div>
      <img src="{{$row->imagen}}" alt="">
      <div>
        <h1  class="mt-3 text-gray-800 text-2xl font-bold my-2">{{$row->nombre}}</h1>
        <p class="text-gray-700 mb-2">{{$row->descripcion}}</p>
        <button class="bg-blue-800 text-white px-3 py-1 rounded-sm" onclick="window.location='{{route('cliente.reserva')}}'">
                <i class="fas fa-calendar-check"> _Realizar Reserva</i></button>
        <div class="flex justify-between mt-4">

        </div>
      </div>
    </div>
   
  <div>
  @endforeach
</main>

@endsection