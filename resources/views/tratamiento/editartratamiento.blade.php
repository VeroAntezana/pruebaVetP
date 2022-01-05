@extends('layouts.app')

@section('title','Editar Tratamiento')

@section('content')
<nav class="bg-green-500 py-6">
    <a href="{{route('admin.indextratamiento')}}" class="text-white mx-16 font-semibold border-2 border-white py-3 px-5 pt-1 h-10 rounded-md hover:bg-white hover:text-green-700">Atras</a>
</nav>

<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Editar Tratamiento</h1>

<form class="mt-4" method="POST" action="{{route('admin.updatetratamiento', $tratamiento->id)}}">
@csrf

<label for="">Mascota</label>
    <select name=mascota_id id=mascota_id class="form-control">
        <option value=""> -- escoja la Mascota --</option>
       
        @foreach($mascota as $mascotas)
        <option value="{{$mascotas['id']}}">{{$mascotas['nombre']}}</option>

        @endforeach

    </select>
    @error('mascota_id')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror


            <div>
                <label class=" dark:text-gray-200" for="passwordConfirmation">Fecha de Inicio</label>
                <input value="{{$tratamiento['finicio']}}" id="finicio" name="finicio" type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white">
    @error('finicio')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
            </div>

            <div>
                <label class=" dark:text-gray-200" for="passwordConfirmation">Fecha de Conclucion</label>
                <input value="{{$tratamiento['ffin']}}" id="ffin" name="ffin" type="date" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white">
    @error('ffin')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
            </div>

            <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Diagnostico" id="diagnostico" name="diagnostico" value="{{$tratamiento['diagnostico']}}">
    @error('diagnostico')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror
            <input type="float" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Precio" id="precio" name="precio" value="{{$tratamiento['precio']}}"> 
    @error('precio')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <button type="sudmit" class="rounded-md bg-green-500 w-full text-lg text-white font-semibold p-2 my-3 hover:bg-green-600">Editar</button>

</form>



</div>
@endsection