<?php


namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Prodotto extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [ 'image_catalogo','note_buon_uso','descrizione','modi_installazione','nome_e_codice'];


    public $timestamps = false;
}
