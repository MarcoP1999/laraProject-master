<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['id' => '1',
                'username'=>'tecntecn',
                'name' => 'Nome',
                'password' => Hash::make('EL7qv56w'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '2',
                'username'=>'staffstaff',
                'name' => 'marcos',
                'password' => Hash::make('EL7qv56w'),
                'piva' => '123456789',
                'livello_utenza'=>'3',
                'email'=>'organizzatore@test.com',
                'surname'=> 'proietti'],

            ['id' => '3',
                'username'=>'adminadmin',
                'name' => NULL,
                'password' => Hash::make('EL7qv56w'),
                'piva' => NULL,
                'livello_utenza'=>'4',
                'email'=>'admin@test.com',
                'surname'=>NULL ],

            ['id' => '4',
                'username'=>'tecnico001',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '5',
                'username'=>'tecnico002',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '6',
                'username'=>'tecnico003',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '7',
                'username'=>'tecnico004',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '8',
                'username'=>'tecnico005',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '9',
                'username'=>'staff03',
                'name' => 'pippo',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => '123456789',
                'livello_utenza'=>'3',
                'email'=>'org3@test.com',
                'surname'=>'pluto' ],



            ['id' => '10',
                'username'=>'admin1',
                'name' => NULL,
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'4',
                'email'=>'admin1@test.com',
                'surname'=> NULL],
        ]);

        DB::table('faq')->insert([
            ['id'=>'1',
                'domanda'=>'Quali sono i criteri di ricerca dei prodotti trattati?',
                'risposta'=> 'Dal sito è possibile effettuare una ricerca avanzata tramite la sezione "Ricerca" nella pagina "CATALOGO".'
            ],
            ['id'=>'2', 'domanda'=>'Chi ha la possibilità di modificare malfunzionamenti e soluzioni?',
                'risposta'=> 'La modifica delle soluzioni e dei malfunzionamenti è riservata a chi amministra il sito e allo staff
                tecnico dell’azienda. I tecnici dei centri assistenza convenzionati possono solo leggerli per essere facilitati nel risolvere
                  le problematiche che affligono un prodotto.'],
            ['id'=>'3', 'domanda'=>'Come posso diventare un tecnico accreditato al sito?',
                'risposta'=> 'Per diventare un tecnico accreditato devi mandare una mail all\'azienda che poi ti darà le credenziali.
                 Trovi il contatto nella sezione "Contatti e dove tovarci".'],
        ]);

        DB::table('products')->insert([
            ['product_id'=> '1',
                'image_catalogo'=> 'imglav01.jpg',
                'modi_installazione' => 'Boh, capiamo.',
                'nome_e_codice' => 'Lavatrice Indesit MTWA 71252 W IT',
                'descrizione' => 'Lavatrice Indesit MTWA 71252 W IT lavatrice Caricamento frontale 7 kg 1200 Giri/min E Bianco',
                'note_buon_uso' => 'capiamo parte seconda'],
        ]);

        DB::table('malfunctions')->insert([
            ['malfunction_id'=> '1',
                'descrizione_malfunzionamento' => 'malf 1',
                'id_prodotto'=>'1'],
        ]);

        DB::table('malfunctions')->insert([
            ['malfunction_id'=> '2',
                'descrizione_malfunzionamento' => 'malf 2',
            'id_prodotto'=>'1'],
        ]);

        DB::table('malfunctions')->insert([
            ['malfunction_id'=> '3',
                'descrizione_malfunzionamento' => 'malf 3',
                'id_prodotto'=>'1'],
        ]);


        DB::table('solutions')->insert([
            ['solution_id'=> '1',
                'descrizione_soluzione' => 'soluz 1 malf 1',
                'id_malfunzionamento'=>'1' ],
        ]);

        DB::table('solutions')->insert([
            ['solution_id'=> '2',
                'descrizione_soluzione' => 'soluzione 2 malfunz 1',
                'id_malfunzionamento'=>'1' ],
        ]);

        DB::table('solutions')->insert([
            ['solution_id'=> '3',
                'descrizione_soluzione' => 'soluzione 1 malfunz 3',
                'id_malfunzionamento'=>'3' ],
        ]);
    }
}
