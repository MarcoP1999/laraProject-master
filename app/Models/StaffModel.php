<?php

namespace App\Models;
use Illuminate\Support\Facades\DB;
use App\Models\Resources\Utente;
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
}
