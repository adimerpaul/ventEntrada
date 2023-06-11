<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('movies')->insert([
            [
                'title'=>'Transformers: El Despertar de las Bestias',
                'image'=>'93570.jpg',
                'urlVideo'=>'https://youtu.be/hdU9p2m9XUw',
                'director'=>'Steven Caple Jr.',
                'reparto'=>'Anthony Ramos,Dominique Fishback',
                'sinopsis'=>'Volviendo a la acción y el espectáculo que han cautivado a los cinéfilos de todo el mundo, Transformers: El Despertar De Las Bestias regresa con una aventura trotamundos en la década de 1990 con los Autobots e introducirá una nueva generación de Transformers: los Maximals, quienes se unirán a la batalla que está ocurriendo en la tierra entre Autobots y Decepticons.',
                'genero'=>'Ficción',
                'duracion'=>127,
                'clasificacion'=>'ATP',
                'idioma'=>'Español',
                'subtitulos'=>'No',
                'formato'=>'3D',
                'fechaEstreno'=>'2022-06-23',
                'preVenta'=>'Si',
            ],
            [
                'title'=>'Spider-Man a Través del Spider-Verso 2',
                'image'=>'93568.jpg',
                'urlVideo'=>'https://youtu.be/7PgEgy8sAnU',
                'director'=>'Kemp Powers <br>
Joaquim Dos Santos <br>
Justin K. Thompson',
                'reparto'=>'Shameik Moore, Hailee Steinfeld',
                'sinopsis'=>'Miles Morales regresa en la próxima entrega de la saga ganadora del Oscar® Spider-Verso, una aventura épica que transportará al amigable vecino de Brooklyn Spider-Man a través del Multiverso para unir fuerzas con Gwen Stacy y un nuevo equipo de Spider-Personas, y enfrentarse así a un villano mucho más poderoso que cualquier cosa que hayan conocido antes.',
                'genero'=>'Acción',
                'duracion'=>140,
                'clasificacion'=>'ATP',
                'idioma'=>'Español',
                'subtitulos'=>'No',
                'formato'=>'2D',
                'fechaEstreno'=>null,
                'preVenta'=>'',
            ],
            [
                'title'=>'La Sirvienta',
                'image'=>'93275.jpg',
                'urlVideo'=>'https://youtu.be/LJgYQixw4gI',
                'director'=>'Rob Marshall',
                'reparto'=>'Melissa McCarthy,Javier Bardem,Halle Bailey',
                'sinopsis'=>'LA SIRENITA es la querida historia de Ariel, una sirena joven y apasionada con ansias de aventuras. Ella es la más joven y rebelde de las hijas del rey Tritón, y sueña con descubrir el mundo más allá del mar. Mientras visita la superficie, se enamora del distinguido príncipe Eric, y aunque las sirenas tienen prohibido relacionarse con los humanos, Ariel debe seguir a su corazón. Así es como hace un trato con la malvada bruja del mar, Úrsula, que le da la oportunidad de experimentar la vida sobre la tierra, pero finalmente pone su vida, y la corona de su padre, en peligro.',
                'genero'=>'Ficción',
                'duracion'=>135,
                'clasificacion'=>'ATP',
                'idioma'=>'Español',
                'subtitulos'=>'No',
                'formato'=>'2D',
                'fechaEstreno'=>null,
                'preVenta'=>'',
            ],
            [
                'title'=>'Rápidos Y Furiosos X',
                'image'=>'93166.jpg',
                'urlVideo'=>'https://youtu.be/FJIGY_vStXs',
                'director'=>'Louis Leterrier',
                'reparto'=>'Jason Statham,John Cena,Jason Momoa,Michelle Rodriguez,Brie Larson,Vin Diesel,Nathalie Emmanuel',
                'sinopsis'=>'a décima película de la saga Rápidos y Furiosos, es el capítulo final de una de las franquicias más populares y queridas del cine, ahora en su tercera década y continuando con el mismo elenco y personajes que cuando comenzó. A través de varias misiones y contra lo imposible, Dom Toretto (Vin Diesel) y su familia han sido más astutos y más rápidos que todos los enemigos que se le han cruzado en su camino. Ahora se enfrentan a su enemigo más letal: una amenaza aterradora que surge de las sombras del pasado que está alimentado de una venganza sangrienta, y está decidido a destruir a su familia y destruir todo, y a cualquier persona, A los que Dom ama.',
                'genero'=>'Acción',
                'duracion'=>140,
                'clasificacion'=>'14+',
                'idioma'=>'Español',
                'subtitulos'=>'No',
                'formato'=>'3D',
                'fechaEstreno'=>null,
                'preVenta'=>'',
            ],
            [
                'title'=>'Guardianes de la Galaxia Vol.3',
                'image'=>'93269.jpg',
                'urlVideo'=>'https://youtu.be/qAkCoX760xQ',
                'director'=>'James Gunn',
                'reparto'=>'Chris Pratt,Zoe Saldana,Dave Bautista,Bradley Cooper,Vin Diesel',
                'sinopsis'=>'La tercera entrega de la saga Guardianes de la Galaxia, de Marvel Studios, escrita y dirigida por James Gunn, llega a los cines en 2023.',
                'genero'=>'Acción',
                'duracion'=>150,
                'clasificacion'=>'ATP',
                'idioma'=>'Español',
                'subtitulos'=>'No',
                'formato'=>'2D',
                'fechaEstreno'=>null,
                'preVenta'=>'',
            ],
            [
                'title'=>'Super Mario Bros: La Película',
                'image'=>'92327.jpg',
                'urlVideo'=>'https://youtu.be/A2VBQsx-pAk',
                'director'=>'Aaron Horvath, <br>Michael Jelenic',
                'reparto'=>'Chris Pratt,Anya Taylor-Joy,Charlie Day,Jack Black,Keegan-Michael Key,Seth Rogen',
                'sinopsis'=>'La película animada de Super Mario Bros. es una aventura de comedia y fantasía que se basa en la franquicia de videojuegos de Nintendo. La película está protagonizada por Mario y Luigi, dos fontaneros que se encuentran en una aventura para salvar a la Princesa Peach del malvado Rey Koopa y su ejército de Goombas.',
                'genero'=>'Animación',
                'duracion'=>92,
                'clasificacion'=>'ATP',
                'idioma'=>'Español',
                'subtitulos'=>'No',
                'formato'=>'3D',
                'fechaEstreno'=>null,
                'preVenta'=>'',
            ]
        ]);
    }
}
