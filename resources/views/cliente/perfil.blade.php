@extends('cliente.app')

@section('title','Perfil')

@section('content')

<div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12" style="background-image: url('https://image.winudf.com/v2/image1/bGl0dGxlYXBwYXMuZG9nLndhbGxwYXBlcnNfc2NyZWVuXzNfMTU2ODgyODc5MV8wMTc/screen-3.jpg?fakeurl=1&type=.jpg')">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div class="relative px-4 py-10 bg-white shadow-lg sm:rounded-3xl sm:p-20 bg-clip-padding bg-opacity-60 border border-gray-200" style="backdrop-filter: blur(20px);">
      <div class="max-w-md mx-auto">
        <div>
          <img class="mx-auto h-20 w-auto" src="https://previews.123rf.com/images/glopphy/glopphy1510/glopphy151000083/47744254-perro-logotipo-del-gato-veterinaria-y-el-dise%C3%B1o-gr%C3%A1fico-del-caballo.jpg?fj=1" class="h-16 sm:h-24" />
        </div>
        <div class="divide-y divide-gray-200">
          <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <p class="font-bold text-center text-3xl">Perfil</p>
           
<form class="mt-4" method="POST" action="{{route('cliente.updatePerfil')}}">
    @csrf
    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Carnet" id="carnet" name="carnet" value="{{$user->carnet}}">
    @error('carnet')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <input type="text" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Name" id="name" name="name" value="{{$user->name}}">
    @error('name')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <input type="email" class="border border-gray-200 rounded-md bg-gray-200 w-full text-lg placeholder-gray-900 p-2 my-2 focus:bg-white" placeholder="Email" id="email" name="email" value="{{$user->email}}">
       @error('email')
     <p class="border border-red-500 rounded-md bg-red-100 w-full text-red-600 p-2 my-2">{{ $message }}</p>
    @enderror

    <button type="sudmit" class="rounded-md bg-black w-full text-lg text-white font-semibold p-2 my-3 hover:bg-gray-600">Editar</button>

</form>
          </div>



          
        </div>
      </div>
    </div>
  </div>
</div>

@endsection