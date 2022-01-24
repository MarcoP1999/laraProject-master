<?php


namespace App\Models\Resources;

use Illuminate\Database\Eloquent\Model;

class Soluzione extends Model
{
    protected $table = 'solutions';
    protected $primaryKey = 'solution_id';
    protected $fillable = [ 'descrizione_soluzione' ];
    public $timestamps = false;
}
