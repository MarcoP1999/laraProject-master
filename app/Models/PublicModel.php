<?php

namespace App\Models;

use App\Models\Resources\Eventi;
use App\Models\Resources\Partecipazione;
use App\Models\Resources\Prodotti;
use App\Models\Resources\Utente;
use App\Models\Resources\FAQ;
use DateInterval;
use Illuminate\Support\Facades\DB;

class PublicModel
{
    public function getProducts() {
        $prodotti = DB::table('products')
            ->paginate(5);
        return $prodotti;
    }

    public function getProductDetails($id_prodotto) {

        $prodotti = Prodotti::where('product_id', $id_prodotto)->get();

        return $prodotti;
    }

    public function getFilteredProducts($filtro) {

        $prodotti = Prodotti::where('product_id', '!=', 'null')
            ->orderBy('nome_e_codice');

        if($filtro['descrizione'] != "") {
            $prodotti = $prodotti->where('descrizione', 'LIKE', '%' . $filtro['descrizione'] . '%');
        }



        return $prodotti->paginate(5);
    }

    public function getFAQ() {

        $faq = FAQ::all();

        return $faq;
    }


}
