<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\PresentacionController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\LoteController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VeterinarioController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\EspecieController;
use App\Http\Controllers\RazaController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\PeriodoController;
use App\Http\Controllers\FichaController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\TratamientoController;
use App\Http\Controllers\VisitaController;
use App\Http\Controllers\BitacoraController;







Route::get('/', function () {
    return view('home');
})->middleware('auth');

Route::get('/home', function () { return view('home');});

/*Rutas para inicio de session */
/*Ruta de registro de usuario*/
Route::get('/register',[RegisterController::class, 'create'])->middleware('guest')->name('register.index');
Route::post('/register',[RegisterController::class, 'store'])->name('register.store');
/*ruta de inicio de la session */
Route::get('/login',[SessionsController::class, 'create'])->middleware('guest')->name('login.index');
Route::post('/login',[SessionsController::class, 'store'])->name('login.store');
/*Ruta de finalizar session */
Route::get('/logout',[SessionsController::class, 'destroy'])->middleware('auth')->name('login.destroy');

/*///////////////////////////////////
////Rutas para el administrador////// 
/////////////////////////////////////*/

Route::get('/admin',[AdminController::class,'index'])->middleware('auth.admin')->name('admin.index');

/*/////////// CLIENTE////////////////// */

/*Rutas para que el administrador registre a un cliente*/
Route::get('/admin/registrarCliente',[AdminController::class,'registrarC'])->middleware('auth.admin')->name('admin.registrarcliente');
Route::get('/admin/registrarCliente/crear',[AdminController::class,'createCliente'])->middleware('auth.admin')->name('admin.crearcliente');
Route::post('/admin/registrarCliente/crear/create',[AdminController::class,'storedCliente'])->middleware('auth.admin')->name('admin.storedCliente');

/*Ruta para que el administrador elimine a un cliente */
Route::get('/admin/registrarCliente/deleteC/{id}',[AdminController::class,'destroyCliente'])->middleware('auth.admin')->name('admin.destroycliente');

/*Ruta para que el administrador edite los datos de un cliente */
Route::get('/admin/registrarCliente/editarC/{id}',[AdminController::class,'editCliente'])->middleware('auth.admin')->name('admin.editcliente');
Route::post('/admin/registrarCliente/editarC1/{id}',[AdminController::class,'updateCliente'])->middleware('auth.admin')->name('admin.updatecliente');


/*/////////// VETERINARIO  /////////////*/

/*Rutas para que el administrador registre a un veterinario*/
Route::get('/admin/registrarVeterinario',[AdminController::class,'registrarV'])->middleware('auth.admin')->name('admin.registrarveterinario');
Route::get('/admin/registrarVeterinario/crear',[AdminController::class,'createVeterinario'])->middleware('auth.admin')->name('admin.crearveterinario');
Route::post('/admin/registrarVeterinario/crear/create',[AdminController::class,'storedVeterinario'])->middleware('auth.admin')->name('admin.storedVeterinario');

/*Ruta para que el administrador elimine a un Veterinario */
Route::get('/admin/registrarVeterinario/deleteV/{id}',[AdminController::class,'destroyVeterinario'])->middleware('auth.admin')->name('admin.destroyveterinario');

/*Ruta para que el administrador edite los datos de un cliente */
Route::get('/admin/registrarVeterinario/editarV/{id}',[AdminController::class,'editVeterinario'])->middleware('auth.admin')->name('admin.editveterinario');
Route::post('/admin/registrarVeterinario/editarV1/{id}',[AdminController::class,'updateVeterinario'])->middleware('auth.admin')->name('admin.updateveterinario');


/*/////////////////////////////////
////////// Rutas del producto//////
/////////////////////////////////// */
Route::get('/admin/GestionarProducto',[ProductoController::class,'index'])->middleware('auth.admin')->name('admin.indexproducto');
Route::get('/admin/registrarProducto',[ProductoController::class,'registrarProducto'])->middleware('auth.admin')->name('admin.registrarproducto');
Route::get('/admin/registrarProducto/create',[ProductoController::class,'createProducto'])->middleware('auth.admin')->name('admin.crearproducto');
Route::post('/admin/registrarProducto/crear/create',[ProductoController::class,'storedProducto'])->middleware('auth.admin')->name('admin.storedproducto');

/*Ruta para que el administrador elimine a un producto */
Route::get('/admin/registrarProducto/deleteP/{id}',[ProductoController::class,'destroyProducto'])->middleware('auth.admin')->name('admin.destroyproducto');

/*Ruta para que el administrador edite un producto */
Route::get('/admin/registrarProducto/editarP/{id}',[productoController::class,'editProducto'])->middleware('auth.admin')->name('admin.editproducto');
Route::post('/admin/registrarProducto/editarP1/{id}',[productoController::class,'updateProducto'])->middleware('auth.admin')->name('admin.updateproducto');


/*/////////////////////////////////
////////// Rutas de categorias//////
/////////////////////////////////// */

Route::get('/admin/GestionarProducto/Categoria',[CategoriaController::class,'indexCategoria'])->middleware('auth.admin')->name('admin.indexcategoria');
Route::get('/admin/GestionarProducto/Categoria/Registrar',[CategoriaController::class,'createCategoria'])->middleware('auth.admin')->name('admin.crearcategoria');
Route::post('/admin/GestionarProducto/Categoria/Registrar/created',[CategoriaController::class,'storedCategoria'])->middleware('auth.admin')->name('admin.storedcategoria');
//eliminar categoria
Route::get('/admin/GestionarProducto/Categoria/Eliminar/{id}',[CategoriaController::class,'destroyCategoria'])->middleware('auth.admin')->name('admin.destroycategoria');
//editar categoria
Route::get('/admin/GestionarProducto/Categoria/Editar/{id}',[CategoriaController::class,'editCategoria'])->middleware('auth.admin')->name('admin.editarcategoria');
Route::post('/admin/GestionarProducto/Categoria/Editar1/{id}',[CategoriaController::class,'updateCategoria'])->middleware('auth.admin')->name('admin.updatecategoria');


/*/////////////////////////////////
////////// Rutas de categorias//////
/////////////////////////////////// */
Route::get('/admin/GestionarProducto/Presentacion',[PresentacionController::class,'index'])->middleware('auth.admin')->name('admin.indexpresentacion');
Route::get('/admin/GestionarProducto/Presentacion/Registrar',[PresentacionController::class,'createPresentacion'])->middleware('auth.admin')->name('admin.createpresentacion');
Route::post('/admin/GestionarProducto/Presentacion/Registrar/created',[PresentacionController::class,'storedPresentacion'])->middleware('auth.admin')->name('admin.storedpresentacion');
//eliminar presentacion
Route::get('/admin/GestionarProducto/Presentacion/eliminar/{id}',[PresentacionController::class,'destroyPresentacion'])->middleware('auth.admin')->name('admin.destroypresentacion');
//editar presentacion
Route::get('/admin/GestionarProducto/Presentacion/editar/{id}',[PresentacionController::class,'editPresentacion'])->middleware('auth.admin')->name('admin.editpresentacion');
Route::post('/admin/GestionarProducto/Presentacion/editar1/{id}',[PresentacionController::class,'updatePresentacion'])->middleware('auth.admin')->name('admin.updatepresentacion');

/*/////////////////////////////////
////////// Rutas de Lotes //////
/////////////////////////////////// */
Route::get('/admin/GestionarProducto/Lotes',[LoteController::class,'indexLote'])->middleware('auth.admin')->name('admin.indexlote');
Route::get('/admin/GestionarProducto/Lotes/registrar',[LoteController::class,'createLote'])->middleware('auth.admin')->name('admin.createlote');
Route::post('/admin/GestionarProducto/Lotes/registrar/created',[LoteController::class,'storedLote'])->middleware('auth.admin')->name('admin.storedlote');
//editar presentacion
Route::get('/admin/GestionarProducto/Lotes/editar/{id}',[LoteController::class,'editLote'])->middleware('auth.admin')->name('admin.editlote');
Route::post('/admin/GestionarProducto/Lotes/editar1/{id}',[LoteController::class,'updateLote'])->middleware('auth.admin')->name('admin.updatelote');



/*/////////////////////////////////
////////// Rutas de Marcas //////
/////////////////////////////////// */
Route::get('/admin/GestionarProducto/Marca',[MarcaController::class,'index'])->middleware('auth.admin')->name('admin.indexmarca');
Route::get('/admin/GestionarProducto/Marca/registrar',[MarcaController::class,'createMarca'])->middleware('auth.admin')->name('admin.crearmarca');
Route::post('/admin/GestionarProducto/Marca/registrar/create',[MarcaController::class,'storedMarca'])->middleware('auth.admin')->name('admin.storedmarca');
//eliminar marca
Route::get('/admin/GestionarProducto/Marca/eliminar/{id}',[MarcaController::class,'destroyMarca'])->middleware('auth.admin')->name('admin.destroymarca');
//editar marca
Route::get('/admin/GestionarProducto/Marca/editar/{id}',[MarcaController::class,'editMarca'])->middleware('auth.admin')->name('admin.editmarca');
Route::post('/admin/GestionarProducto/Marca/editar1/{id}',[MarcaController::class,'updateMarca'])->middleware('auth.admin')->name('admin.updatemarca');

/*/////////////////////////////////
////////// Rutas de Mascota//////
/////////////////////////////////// */
Route::get('/admin/GestionarMascota',[MascotaController::class,'index'])->middleware('auth.admin')->name('admin.indexmascota');
Route::get('/admin/GestionarMascota/Lista',[MascotaController::class,'listamascota'])->middleware('auth.admin')->name('admin.listamascota');
Route::get('/admin/GestionarMascota/Registrar',[MascotaController::class,'createMascota'])->middleware('auth.admin')->name('admin.crearmascota');
Route::post('/admin/GestionarMascota/Registrar/create',[MascotaController::class,'storedMascota'])->middleware('auth.admin')->name('admin.storedmascota');
 // eliminar una mascota
 Route::get('/admin/GestionarMascota/Eliminar/{id}',[MascotaController::class,'destroyMascota'])->middleware('auth.admin')->name('admin.destroymascota');
 // editar una mascota
 Route::get('/admin/GestionarMascota/Editar/{id}',[MascotaController::class,'editMascota'])->middleware('auth.admin')->name('admin.editmascota');
 Route::post('/admin/GestionarMascota/Editar1/{id}',[MascotaController::class,'updateMascota'])->middleware('auth.admin')->name('admin.updatemascota');


/*/////////////////////////////////
////////// Rutas de especie//////
/////////////////////////////////// */
Route::get('/admin/GestionarPaciente/Especie',[EspecieController::class,'index'])->middleware('auth.admin')->name('admin.indexespecie');
Route::get('/admin/GestionarPaciente/Especie/registrar',[EspecieController::class,'createEspecie'])->middleware('auth.admin')->name('admin.crearespecie');
Route::post('/admin/GestionarPaciente/Especie/registrar/create',[EspecieController::class,'storedEspecie'])->middleware('auth.admin')->name('admin.storedespecie');
//eliminar Especie
Route::get('/admin/GestionarPaciente/Especie/Eliminar/{id}',[EspecieController::class,'destroyEspecie'])->middleware('auth.admin')->name('admin.destroyespecie');
//editar especie
Route::get('/admin/GestionarPaciente/Especie/Editar/{id}',[EspecieController::class,'editEspecie'])->middleware('auth.admin')->name('admin.editespecie');
Route::post('/admin/GestionarPaciente/Especie/Editar1/{id}',[EspecieController::class,'updateEspecie'])->middleware('auth.admin')->name('admin.updateespecie');


/*/////////////////////////////////
////////// Rutas de Raza//////
/////////////////////////////////// */
Route::get('/admin/GestionarPaciente/Raza',[RazaController::class,'index'])->middleware('auth.admin')->name('admin.indexraza');
Route::get('/admin/GestionarPaciente/Raza/Registrar',[RazaController::class,'createRaza'])->middleware('auth.admin')->name('admin.crearraza');
Route::post('/admin/GestionarPaciente/Raza/Registrar/create',[RazaController::class,'storedRaza'])->middleware('auth.admin')->name('admin.storedraza');
//eliminar Raza
Route::get('/admin/GestionarPaciente/Raza/Eliminar/{id}',[RazaController::class,'destroyRaza'])->middleware('auth.admin')->name('admin.destroyraza');
//editar Raza
Route::get('/admin/GestionarPaciente/Raza/Editar/{id}',[RazaController::class,'editRaza'])->middleware('auth.admin')->name('admin.editraza');
Route::post('/admin/GestionarPaciente/Raza/Editar1/{id}',[RazaController::class,'updateRaza'])->middleware('auth.admin')->name('admin.updateraza');

/*/////////////////////////////////
////////// Rutas de reservas//////
/////////////////////////////////// */
Route::get('/admin/GestionarReservas',[ReservaController::class,'index'])->middleware('auth.admin')->name('admin.indexreserva');
Route::get('/admin/GestionarReservas/Lista',[ReservaController::class,'listaReserva'])->middleware('auth.admin')->name('admin.listareserva');
Route::get('/admin/GestionarReservas/CrearReserva',[ReservaController::class,'createReserva'])->middleware('auth.admin')->name('admin.crearreserva');
Route::post('/admin/GestionarReservas/CrearReserva/create',[ReservaController::class,'storedReserva'])->middleware('auth.admin')->name('admin.storedreserva');
//eliminar reserva
Route::get('/admin/GestionarReservas/Eliminar/{id}',[ReservaController::class,'destroyReserva'])->middleware('auth.admin')->name('admin.destoyreserva');
//editar reserva
Route::get('/admin/GestionarReservas/Editar/{id}',[ReservaController::class,'editReserva'])->middleware('auth.admin')->name('admin.editreserva');
Route::post('/admin/GestionarReservas/Editar/{id}',[ReservaController::class,'updateReserva'])->middleware('auth.admin')->name('admin.updatereserva');




/*/////////////////////////////////
////////// Rutas de fichas//////
/////////////////////////////////// */
Route::get('/admin/GestionarReservas/Ficha',[FichaController::class,'index'])->middleware('auth.admin')->name('admin.indexficha');
Route::get('/admin/GestionarReservas/Ficha/crear',[FichaController::class,'createFicha'])->middleware('auth.admin')->name('admin.crearficha');
Route::post('/admin/GestionarReservas/Ficha/crear/create',[FichaController::class,'storedFicha'])->middleware('auth.admin')->name('admin.storedficha');
//elimianr ficha
Route::get('/admin/GestionarReservas/Ficha/Eliminar/{id}',[FichaController::class,'destroyFicha'])->middleware('auth.admin')->name('admin.destroyficha');
//editar ficha
Route::get('/admin/GestionarReservas/Ficha/Editar/{id}',[FichaController::class,'editFicha'])->middleware('auth.admin')->name('admin.editficha');
Route::post('/admin/GestionarReservas/Ficha/Editar1/{id}',[FichaController::class,'updateFicha'])->middleware('auth.admin')->name('admin.updateficha');


/*/////////////////////////////////
////////// Rutas de periodos//////
/////////////////////////////////// */
Route::get('/admin/GestionarPeriodos',[PeriodoController::class,'index'])->middleware('auth.admin')->name('admin.indexperiodo');
Route::get('/admin/GestionarPeriodos/crear',[PeriodoController::class,'createPeriodo'])->middleware('auth.admin')->name('admin.crearperiodo');
Route::post('/admin/GestionarPeriodos/crearPeriodo',[PeriodoController::class,'storedPeriodo'])->middleware('auth.admin')->name('admin.storedperiodo');
//eliminar periodo
Route::get('/admin/GestionarPeriodos/Eliminar/{id}',[PeriodoController::class,'destroyPeriodo'])->middleware('auth.admin')->name('admin.destroyperiodo');
//editar periodo
Route::get('/admin/GestionarPeriodos/Editar/{id}',[PeriodoController::class,'editPeriodo'])->middleware('auth.admin')->name('admin.editperiodo');
Route::post('/admin/GestionarPeriodos/Editar1/{id}',[PeriodoController::class,'updatePeriodo'])->middleware('auth.admin')->name('admin.updateperiodo');

/*/////////////////////////////////
////////// Rutas de servicios//////
/////////////////////////////////// */
Route::get('/admin/GestionarServicios/index',[ServicioController::class,'index'])->middleware('auth.admin')->name('admin.indexservicio');
Route::get('/admin/GestionarServicios',[ServicioController::class,'listaServicio'])->middleware('auth.admin')->name('admin.listaservicio');
Route::get('/admin/GestionarServicios/create',[ServicioController::class,'createServicio'])->middleware('auth.admin')->name('admin.crearservicio');
Route::post('/admin/GestionarServicios/crear/create',[ServicioController::class,'storedServicio'])->middleware('auth.admin')->name('admin.storedservicio');
//eliminar periodo
Route::get('/admin/GestionarServicios/Eliminar/{id}',[ServicioController::class,'destroyServicio'])->middleware('auth.admin')->name('admin.destroyservicio');

//editar periodo
Route::get('/admin/GestionarServicios/Editar/{id}',[ServicioController::class,'editServicio'])->middleware('auth.admin')->name('admin.editservicio');
Route::post('/admin/GestionarServicios/Editar1/{id}',[ServicioController::class,'updateServicio'])->middleware('auth.admin')->name('admin.updateservicio');


/*/////////////////////////////////
////////// Rutas de Tratamientos//////
/////////////////////////////////// */
Route::get('/admin/GestionarTratamientos/index',[TratamientoController::class,'index'])->middleware('auth.admin')->name('admin.indextratamiento');
Route::get('/admin/GestionarTratamientos/index/crear',[TratamientoController::class,'createTratamiento'])->middleware('auth.admin')->name('admin.creartratamiento');
Route::post('/admin/GestionarTratamientos/create',[TratamientoController::class,'storedTratamiento'])->middleware('auth.admin')->name('admin.storedtratamiento');
//eliminar tratamiento
Route::get('/admin/GestionarTratamientos/Eliminar/{id}',[TratamientoController::class,'destroyTratamiento'])->middleware('auth.admin')->name('admin.destroytratamiento');
//editar tratamiento
Route::get('/admin/GestionarTratamientos/Editar/{id}',[TratamientoController::class,'editTratamiento'])->middleware('auth.admin')->name('admin.edittratamiento');
Route::post('/admin/GestionarTratamientos/Editar1/{id}',[TratamientoController::class,'updateTratamiento'])->middleware('auth.admin')->name('admin.updatetratamiento');

/*/////////////////////////////////
////////// Rutas de Visitas//////
/////////////////////////////////// */
Route::get('/admin/GestionarVisita/index',[VisitaController::class,'index'])->middleware('auth.admin')->name('admin.indexvisita');
Route::get('/admin/GestionarVisita/crear',[VisitaController::class,'createVisita'])->middleware('auth.admin')->name('admin.crearvisita');
Route::post('/admin/GestionarVisita/crear/create',[VisitaController::class,'storedVisita'])->middleware('auth.admin')->name('admin.storedvisita');
//eliminar visita
Route::get('/admin/GestionarVisita/eliminar/{id}',[VisitaController::class,'destroyVisita'])->middleware('auth.admin')->name('admin.destroyvisita');

//editar visita
Route::get('/admin/GestionarVisita/editar/{id}',[VisitaController::class,'editVisita'])->middleware('auth.admin')->name('admin.editvisita');
Route::post('/admin/GestionarVisita/editar1/{id}',[VisitaController::class,'updateVisita'])->middleware('auth.admin')->name('admin.updatevisita');

/*/////////////////////////////////
////////// Rutas de Visitas//////
/////////////////////////////////// */

Route::get('/admin/Bitacora/index',[BitacoraController::class,'index'])->middleware('auth.admin')->name('admin.indexbitacora');














/*/////////////////////////////////
////////// Rutas de Cliente//////
/////////////////////////////////// */

Route::get('/Home/Cliente',[ClienteController::class,'index'])->middleware('auth.admin')->name('cliente.index');
Route::get('/Home/Cliente/Mascotas',[ClienteController::class,'Mascotas'])->middleware('auth.admin')->name('cliente.Mascotas');
Route::get('/Home/Cliente/Citas',[ClienteController::class,'Citas'])->middleware('auth.admin')->name('cliente.Citas');
Route::get('/Home/Cliente/Servicios',[ClienteController::class,'Servicios'])->middleware('auth.admin')->name('cliente.Servicios');
Route::get('/Home/Cliente/Productos',[ClienteController::class,'Categorias'])->middleware('auth.admin')->name('cliente.Categorias');
Route::get('/Home/Cliente/Categoria/Productos/{id}',[ClienteController::class,'Productos'])->middleware('auth.admin')->name('cliente.Productos');
Route::get('/Home/Cliente/Categoria/Tratamientos/{id}',[ClienteController::class,'Tratamientos'])->middleware('auth.admin')->name('cliente.Tratamientos');
Route::get('/Home/Cliente/Perfil',[ClienteController::class,'Perfil'])->middleware('auth.admin')->name('cliente.Perfil');
Route::post('/Home/Cliente/Perfil/Editar',[ClienteController::class,'updatePerfil'])->middleware('auth.admin')->name('cliente.updatePerfil');

Route::get('/Home/Cliente/Contraseña',[ClienteController::class,'Contraseña'])->middleware('auth.admin')->name('cliente.Contraseña');
Route::post('/Home/Cliente/Contraseña/modificada',[ClienteController::class,'updateContraseña'])->middleware('auth.admin')->name('cliente.updateContraseña');

Route::get('/Home/Cliente/Reserva',[ClienteController::class,'Reservas'])->middleware('auth.admin')->name('cliente.reserva');
Route::post('/Home/Cliente/Reserva/Guardada',[ClienteController::class,'registarReserva'])->middleware('auth.admin')->name('cliente.registrarreserva');

/*/////////////////////////////////
////////// Rutas de Veterinario//////
/////////////////////////////////// */
Route::get('/Home/Veterinario',[VeterinarioController::class,'index'])->middleware('auth.admin')->name('veterinario.index');
Route::get('/Home/veterinario/Perfil',[VeterinarioController::class,'Perfil'])->middleware('auth.admin')->name('veterinario.Perfil');
Route::post('/Home/veterinario/Perfil/Editar',[VeterinarioController::class,'updatePerfil'])->middleware('auth.admin')->name('veterinario.updatePerfil');
Route::get('/Home/veterinario/Contraseña',[VeterinarioController::class,'Contraseña'])->middleware('auth.admin')->name('veterinario.Contraseña');
Route::post('/Home/veterinario/Contraseña/modificada',[VeterinarioController::class,'updateContraseña'])->middleware('auth.admin')->name('veterinario.updateContraseña');
Route::get('/Home/veterinario/Citas',[VeterinarioController::class,'Citas'])->middleware('auth.admin')->name('veterinario.Citas');
Route::get('/Home/veterinario/Productos',[VeterinarioController::class,'Categorias'])->middleware('auth.admin')->name('veterinario.Categorias');
Route::get('/Home/veterinario/Categoria/Productos/{id}',[VeterinarioController::class,'Productos'])->middleware('auth.admin')->name('veterinario.Productos');
Route::get('/Home/veterinario/Clientes',[VeterinarioController::class,'Clientes'])->middleware('auth.admin')->name('veterinario.Clientes');
Route::get('/Home/veterinario/Clientes/mascota/{id}',[VeterinarioController::class,'Mascotas'])->middleware('auth.admin')->name('veterinario.Mascotas');
Route::get('/Home/veterinario/Categoria/Tratamientos/{id}',[VeterinarioController::class,'Tratamientos'])->middleware('auth.admin')->name('veterinario.Tratamientos');
Route::get('/Home/veterinario/Categoria/Tratamientos/editar/{id}',[VeterinarioController::class,'editTratamiento'])->middleware('auth.admin')->name('veterinario.editTratamiento');
Route::post('/Home/veterinario/Categoria/Tratamientos/editar/update/{id}',[VeterinarioController::class,'updateTratamiento'])->middleware('auth.admin')->name('veterinario.updateTratamiento');
Route::get('/Home/veterinario/Categoria/Tratamientos/delete/{id}',[VeterinarioController::class,'destroyTratamiento'])->middleware('auth.admin')->name('veterinario.deleteTratamiento');
Route::get('/Home/veterinario/Tratamientos/crear',[VeterinarioController::class,'createTratamiento'])->middleware('auth.admin')->name('veterinario.crearTratamiento');
Route::post('/Home/veterinario/Tratamientos/crear/creado',[VeterinarioController::class,'storedTratamiento'])->middleware('auth.admin')->name('veterinario.storedTratamiento');
