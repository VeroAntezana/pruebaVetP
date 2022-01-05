<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\especie;
use App\Models\raza;
use App\Models\mascota;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(){
        // \App\Models\User::factory(10)->create();
        $user = new User;
        $user->name = 'admin';
        $user->carnet = '1234';
        $user->email =  'admin@veterinaria.com';
        $user->password = '1234';
        $user->role = 'admin';
        $user->save();

        $veterinario1 = new User;
        $veterinario1->name = 'Juan Carlos Villamontes';
        $veterinario1->carnet = '101';
        $veterinario1->email =  'user1@gmail.com';
        $veterinario1->password = '1234';
        $veterinario1->role = 'veterinario';
        $veterinario1->save();

        $veterinario2 = new User;
        $veterinario2->name = 'Meliza Montecinos';
        $veterinario2->carnet = '102';
        $veterinario2->email =  'user2@gmail.com';
        $veterinario2->password = '1234';
        $veterinario2->role = 'veterinario';
        $veterinario2->save();

        $cliente1 = new User;
        $cliente1->name = 'Teo Montalvo';
        $cliente1->carnet = '103';
        $cliente1->email =  'user3@gmail.com';
        $cliente1->password = '1234';
        $cliente1->role = 'cliente';
        $cliente1->save();

        $cliente2 = new User;
        $cliente2->name = 'Veronica Antezana';
        $cliente2->carnet = '104';
        $cliente2->email =  'user4@gmail.com';
        $cliente2->password = '1234';
        $cliente2->role = 'cliente';
        $cliente2->save();

        $cliente3 = new User;
        $cliente3->name = 'Juanita Padilla';
        $cliente3->carnet = '105';
        $cliente3->email =  'user5@gmail.com';
        $cliente3->password = '1234';
        $cliente3->role = 'cliente';
        $cliente3->save();

        $cliente4 = new User;
        $cliente4->name = 'Jessica Rivero';
        $cliente4->carnet = '106';
        $cliente4->email =  'user6@gmail.com';
        $cliente4->password = '1234';
        $cliente4->role = 'cliente';
        $cliente4->save();

        $cliente5 = new User;
        $cliente5->name = 'Jhonny Sanchez';
        $cliente5->carnet = '107';
        $cliente5->email =  'user7@gmail.com';
        $cliente5->password = '1234';
        $cliente5->role = 'cliente';
        $cliente5->save(); 

        $especie1 = new especie;
        $especie1->nombre = 'Felino';

        $especie2 = new especie;
        $especie2->nombre = 'Canino';

        $especie3 = new especie;
        $especie3->nombre = 'Equino';

        $especie4 = new especie;
        $especie4->nombre = 'Porcino';

        $raza1 = new raza;
        $raza1->nombre = 'Pug';
        $raza1->descripcion = 'Es un perro bajo y macizo de aspecto cuadrado y compacto, bien proporcionado y musculoso; la cabeza grande, redondeada y de aspecto sólido, está cubierta de pliegues; el hocico es cuadrado y chato; los ojos, grandes y oscuros; tiene las patas rectas y la cola rizada. El pelo es apretado, suave y brillante.';
        $raza1->especie_id = 1;


        $raza2 = new raza;
        $raza2->nombre = 'Pastor Aleman';
        $raza2->descripcion = 'Alcanzan como máximo 65 cm de altura, y pesan hasta aproximadamente 41 kg. Se trata de un perro bien proporcionado. La cabeza es ancha y se estrecha con gracia en un hocico afilado. Las orejas son bastante largas y se mantienen erguidas.';
        $raza2->especie_id = 1;

        $raza3 = new raza;
        $raza3->nombre = 'Mestizo';
        $raza3->descripcion = 'Es un perro que no tiene pedigree, es decir, que desciende del apareamiento de dos razas distintas, o bien son cachorros de otros mestizos.';
        $raza3->especie_id = 1;

        $raza4 = new raza;
        $raza4->nombre = 'Siames';
        $raza4->descripcion = 'Es un gato alargado y elegante. Tiene cuerpo, cuello, patas y cola alargados. Esta raza es de tamaño medio, aunque con músculos proporcionados.';
        $raza4->especie_id = 2;
        
        $raza5 = new raza;
        $raza5->nombre = 'Persa';
        $raza5->descripcion = 'se caracterizan por tener una cabeza redonda y cráneo ancho; ojos grandes, redondos y separados; orejas pequeñas y redondeadas; nariz chata; patas gruesas y pequeñas; cola redonda en la punta y con bastante pelo; cuerpo macizo y robusto; y un pelaje abundante, suave y largo.';
        $raza5->especie_id = 2;
        


        $raza6 = new raza;
        $raza6->nombre = 'Shire';
        $raza6->descripcion = 'El caballo shire tiene el récord del caballo más grande del mundo. Es fácilmente reconocible con sus abundantes barbas y grandes marcas blancas. Todavía se utiliza para el trabajo agrícola, está principalmente mediatizado por las empresas cerveceras para las que tira de coches impresionantes. Se exporta a Europa, los Estados Unidos, el Canadá y Australia y su número de ejemplares es relativamente pequeño, pero su popularidad le permite mantenerse.';
        $raza6->especie_id = 3;

        $raza7 = new raza;
        $raza7->nombre = 'Pura Sangre';
        $raza7->descripcion = 'Descienden de tres sementales originarios (Byerley Turk, Godolphin Arabian y Darley Arabian). Son criados para la velocidad, la resistencia y el corazón.';
        $raza7->especie_id = 3;

        $raza8 = new raza;
        $raza8->nombre = 'Micro Pig';
        $raza8->descripcion = 'Se caracterizan por tener un promedio de vida de 12 a 15 años, pesan alrededor de 32 a 72 kilos y son omnívoros, por lo que es necesario que los dueños den a la mascota una alimentación rica en todo tipo de plantas y proteínas.';
        $raza8->especie_id = 4;
        
        $raza9= new raza;
        $raza9->nombre = 'Mangalica';
        $raza9->descripcion = 'Tiene un pelo muy grueso y largo que parece lana en invierno pero que cambia en primavera por unas cerdas ensortijadas, claras y brillantes; solo hay constancia de otra raza porcina con un pelo así de largo, la extinta Lincolnshire Curly Coat.';
        $raza9->especie_id = 4;


        
    }

}
