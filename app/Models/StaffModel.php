<?php

namespace App\Models;
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
            ->paginate(5);
        return $prodotti;
    }

    public function checkStaff($id_prodotto,$id_utente){
        $staffname = DB::table('users')
            ->select('id')
            ->where('id', '=', $id_utente)
            ->get();
        $prodotti =Prodotto::where('product_id', $id_prodotto)
            ->get();
        return $staffname[0]->id==$prodotti[0]->id_utente;
    }
}
