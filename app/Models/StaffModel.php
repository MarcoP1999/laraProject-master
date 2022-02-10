<?php

namespace App\Models;
use App\Models\Resources\Malfunzionamento;
use App\Models\Resources\Soluzione;
use Illuminate\Support\Facades\DB;
use App\Models\Resources\Utente;
use App\Models\Resources\Prodotto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;


class StaffModel extends Model
{
    public function getProducts() {
        $prodotti = DB::table('products')
            ->where('id_utente',Auth::id())
            ->paginate(4);
        return $prodotti;
    }

    public function checkStaff($id_prodotto,$id_utente){
        $staffname = DB::table('users')
            ->select('id')
            ->where('id', '=', $id_utente)
            ->get();
        $prodotti =Prodotto::where('product_id', $id_prodotto)
            ->first();
        if (empty($prodotti)) return false;
            else
        return $staffname[0]->id==$prodotti->id_utente;
    }

    public function checkStaffDet($id_malfunzionamento,$id_utente) {

        $dati = Malfunzionamento::join('products', 'products.product_id', 'malfunctions.id_prodotto')
            ->where('malfunctions.malfunction_id',$id_malfunzionamento)
            ->first();
        if(empty($dati)) return false;
        if($dati->id_utente==$id_utente)
            return true;
                else
        return false;
    }
}
