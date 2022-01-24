<?php


namespace App\Models\Resources;


use Illuminate\Database\Eloquent\Model;

class Riscontro extends Model
{
    protected $table = 'feedbacks';
    protected $primaryKey = 'id_riscontro';
    public $timestamps = false;


    public function feedbackProduct(){
        return $this->hasOne(Category::class, 'product_id', 'id_prodotto');
    }

    public function feedbackMalfunction(){
        return $this->hasOne(Category::class, 'malfunction_id', 'id_malfunzionamento');
    }
}
