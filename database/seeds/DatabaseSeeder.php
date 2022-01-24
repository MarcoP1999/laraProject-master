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
                'username'=>'cliente001',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '5',
                'username'=>'cliente002',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '6',
                'username'=>'cliente003',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '7',
                'username'=>'cliente004',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '8',
                'username'=>'cliente005',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '9',
                'username'=>'cliente006',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '10',
                'username'=>'cliente007',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '11',
                'username'=>'cliente008',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '12',
                'username'=>'cliente009',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '13',
                'username'=>'cliente010',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '14',
                'username'=>'cliente011',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '15',
                'username'=>'cliente012',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '16',
                'username'=>'cliente013',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '17',
                'username'=>'cliente014',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '18',
                'username'=>'cliente015',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '19',
                'username'=>'cliente016',
                'name' => 'Nome',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'2',
                'email'=>'cliente@test.com',
                'surname'=>'Cognome'],

            ['id' => '22',
                'username'=>'org03',
                'name' => 'pippo',
                'password' => Hash::make('xxxxxxxx'),
                'piva' => '123456789',
                'livello_utenza'=>'3',
                'email'=>'org3@test.com',
                'surname'=>'pluto' ],



            ['id' => '30',
                'username'=>'admin1',
                'name' => NULL,
                'password' => Hash::make('xxxxxxxx'),
                'piva' => NULL,
                'livello_utenza'=>'4',
                'email'=>'admin1@test.com',
                'surname'=> NULL],
        ]);

        DB::table('events')->insert([


            ['event_id'=> '12',
                'luogo' => 'Ascoli Piceno, Stadio Cino e Lillo Del Duca',
                'data'=> '2022-06-01',
                'ora'=>'18:00:00',
                'regione'=> 'Marche',
                'image_catalogo'=> '12.jpg',
                'programma' => 'Ore 17:00 apertura cancelli. Ore 21:00 inizio apertura concerto. Ore 21:30 inizio concerto. Ore 23:00 fine concerto',
                'indicazioni' => 'In auto, uscita Ascoli Piceno Est dell’Ascoli-Mare, seguire le indicazioni “Stadio”; uscita Ascoli Piceno Ovest (consigliata per la tifoseria ospite), proseguire per Ascoli centro e imboccare la circonvallazione nord. In treno, dalla stazione ferroviaria di Ascoli Piceno è possibile raggiungerlo a piedi vista la vicinanza dell’impianto situato a circa 400 m. In aereo, gli aeroporti più vicini sono l’Aeroporto di Ancona-Falconara e l’Aeroporto di Pescara.',
                'artista' => 'Nerkias',
                'biglietti_totali' => 1000,
                'biglietti_rimasti' => 1000,
                'costo' => 5.00,
                'descrizione' => 'I Nerkias tornano live dopo più di un anno per il loro concerto in Ascoli. Compra i tuoi biglietti qui su TicketWorld!',
                'percentuale_sconto' => 20,
                'giorni_sconto' => 10],


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
                'descrizione_malfunzionamento' => 'capiamo parte terza'],
        ]);

        DB::table('solutions')->insert([
            ['solution_id'=> '1',
                'descrizione_soluzione' => 'capiamo parte quarta',],
        ]);
    }
}
