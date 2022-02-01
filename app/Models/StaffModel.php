<?php

namespace App\Models;
use App\Models\Resources\Biglietto;
use Illuminate\Support\Facades\DB;
use App\Models\Resources\Utente;
use App\Models\Resources\Eventi;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class StaffModel extends Model
{
     public function getStaffData($id_utente){
        return Utente::where('id', $id_utente)->get();
    }
}
