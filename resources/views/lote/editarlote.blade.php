@extends('layouts.app')

@section('title','Editar Lote')

@section('content')
<nav class="bg-green-500 py-6">
    <a href="{{route('admin.indexlote')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Editar Lote</h1>

<form class="mt-4" method="POST" action="{{route('admin.updatelote', $lote->id)}}">
    @csrf
    
    <label for="">Producto</label>
    <select name=producto_id id=producto_id class="form-control">
        <option value=""> -- escoja el producto --</option>
       
        @foreach($producto as $productos)
        <option value="{{$productos['id']}}">{{$productos['nombre']}}</option>

        @endforeach

    </select>
    @error('producto_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
    <div></div>

    <label class= "mx-10" for=""> Fecha de Compra</label>
    <input type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Año-Mes-Dia" id="fcompra" name="fcompra" value="{{$lote->fcompra}}">
    @error('fcompra')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <label class= "mx-10" for="">Fecha de elaboracion </label>
    <input type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Año-Mes-Dia" id="felaboracion" name="felaboracion" value="{{$lote->felaboracion}}">
    @error('felaboracion')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <label class= "mx-10" for="">Fecha de expiracion</label>
    <input type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Año-Mes-Dia" id="fexpiracion" name="fexpiracion" value="{{$lote->fexpiracion}}">
    @error('fexpiracion')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
    
    <input type="integer" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Stock" id="stock" name="stock" value="{{$lote->stock}}">
    @error('stock')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
 
    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Editar</button>

</form>
@endsection