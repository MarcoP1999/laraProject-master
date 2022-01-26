<?php

namespace App\Models;

use App\Models\Resources\Eventi;
use App\Models\Resources\Partecipazione;
use App\Models\Resources\Prodotto;
use App\Models\Resources\Utente;
use App\Models\Resources\FAQ;
use DateInterval;
use Illuminate\Support\Facades\DB;

class PublicModel
{
    public function getProducts() {
        $prodotti = DB::table('products')
            ->paginate(2);
        return $prodotti;
    }

    public function getProductDetails($id_prodotto) {

        $prodotti = Prodotto::where('product_id', $id_prodotto)->get();

        return $prodotti;
    }

    public function getFilteredProducts( $request) {

        $prodotti = Prodotto::where('product_id', '!=', 'null')
            ->orderBy('nome_e_codice');

        if($request['descrizione'] != "") {
           if (substr($request['descrizione'],-1)=='*')
               $prodotti = $prodotti->where('descrizione', 'LIKE', substr($request['descrizione'],0,-1). '%');
           else
               $prodotti = $prodotti->where('descrizione', 'LIKE', $request['descrizione']);
        }



        return $prodotti->paginate(2);
    }

    public function getFAQ() {

        $faq = FAQ::all();

        return $faq;
    }


}
