
 <title>Home Admin - Veterinaria</title>
 <!-- Tailwind CSS Link -->
 <link rel="stylesheet" 
    href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.css">
  </head>
  <body class="bg-gray-100 text-gray-800">
    <nav class="flex py-5 bg-green-500 text-white">  <!-- linea verde de arriba -->
      <div class="w-1/2 px-12 mr-auto">  <!-- texto izquierda -->
        <p class="text-2xl font-bold">Veterinaria PARIS</p> <!-- escribe el titulo -->

        <p class="text-2xl font-bold">Administrador</p>
      </div>
      <ul class="w-1/2 px-16 ml-auto flex justify-end pt-1"> <!-- texto derecha -->
       @if(auth()->check()) 
       <li class="mx-6">
         <p class="text-xl">Welcome <b>{{ auth()->user()->name}}</b></p>

                 
      </li>

        <li>
          <a href="{{route('login.destroy')}}" class="font-semibold border-2 border-white py-2 px-4 rounded-md hover:bg-white hover:text-green-700">Logout</a> <!-- texto para login con link al register -->
        </li>
        @else
        <li class="mx-6">
          <a href="{{route('login.index')}}" class="font-semibold hover:bg-green-700 py-3 px-4 rounded-md">Login</a>  <!-- texto para login con link al login -->
        </li>

        <li>
          <a href="{{route('register.index')}}" class="font-semibold border-2 border-green py-2 px-4 rounded-md hover:bg-green hover:text-green-700">Register</a> <!-- texto para login con link al register -->
        </li>
      </ul>
      @endif

    </nav>





<div class="block mx-auto my-12 p-8 bg-white w-1/3 borderr border-gray-200 rounded-lg shadow-lg">
<h1 class="text-3xl text-center font-bold">Gestionar:</h1>

<h1 class="my-5"></h1>

<from class="mt-4">
<li class="mx-6">
  <a href="{{route('admin.registrarcliente')}}" class="font-semibold border-2 border-green-700 py-2 px-4 rounded-md hover:bg-green-700 hover:text-white">Cliente</a>
</li>

<li class="my-6 mx-6">
  <a href="{{route('admin.registrarveterinario')}}" class="font-semibold border-2 border-green-700 py-2 px-4 rounded-md hover:bg-green-700 hover:text-white">Veterinario</a>
</li>

<li class="my-6 mx-6">
  <a href="{{route('admin.indexproducto')}}" class="font-semibold border-2 border-green-700 py-2 px-4 rounded-md hover:bg-green-700 hover:text-white">Producto</a>
</li>

<li class="my-6 mx-6">
  <a href="{{route('admin.indexmascota')}}" class="font-semibold border-2 border-green-700 py-2 px-4 rounded-md hover:bg-green-700 hover:text-white">Mascota</a>
</li>

<li class="my-6 mx-6">
  <a href="{{route('admin.indexreserva')}}" class="font-semibold border-2 border-green-700 py-2 px-4 rounded-md hover:bg-green-700 hover:text-white">Reservas</a>
</li>

<li class="my-6 mx-6">
  <a href="{{route('admin.indexservicio')}}" class="font-semibold border-2 border-green-700 py-2 px-4 rounded-md hover:bg-green-700 hover:text-white">Servicios</a>
</li>

<li class="my-6 mx-6">
  <a href="{{route('admin.indexbitacora')}}" class="font-semibold border-2 border-green-700 py-2 px-4 rounded-md hover:bg-green-700 hover:text-white">Bitacora</a>
</li>

</form>

</div>