<?php


namespace App\Models\Resources;


use Illuminate\Database\Eloquent\Model;

class Acquisizione extends Model
{
    protected $table = 'acquisitions';
    protected $primaryKey = 'id_acquisizione';
    public $timestamps = false;


    public function malfunzionamentoAcquisizione(){
        return $this->hasOne(Category::class, 'malfunction_id', 'id_malfunzionamento');
    }

    public function soluzioneAcquisizione(){
        return $this->hasOne(Category::class, 'solution_id', 'id_soluzione');
    }
}
