@extends('veterinario.app')

@section('title','Productos')

@section('content')
<main class="my-8">
@foreach($categoria as $row)

        <div class="container mx-auto px-6 my-5">
            <div class="h-64 rounded-md overflow-hidden bg-cover bg-center" style="background-image: url('https://zipinventory.com/assets/images/topiccluster/what-is-product-differentiation-how-businesses-can-stand-out-800x400.png')">
                <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                    <div class="px-10 max-w-xl">
                        <h2 class="text-2xl text-white font-semibold">{{$row->nombre}}</h2>
                        <p class="mt-2 text-white">{{$row->descripcion}}</p>
                        <div class="my-5"></div>
                        <a href="{{route('cliente.Productos', $row->id)}}" class="text-white font-semibold border-2 border-blue-500 py-3 px-8 pt-1 h-10 rounded-md hover:bg-blue-900 hover:text-white">Ver {{$row->nombre}}</a>
                    </div>
                </div>
            </div> 
        </div>
        @endforeach
        
    </main>

    

    <footer class="bg-gray-200">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="#" class="text-xl font-bold text-gray-500 hover:text-gray-400">Brand</a>
            <p class="py-2 text-gray-500 sm:py-0">All rights reserved</p>
        </div>
    </footer>
</div>

@endsection