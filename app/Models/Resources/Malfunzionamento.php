<?php


namespace App\Models\Resources;
use Illuminate\Database\Eloquent\Model;

class Malfunzionamento extends Model
{
    protected $table = 'malfunctions';
    protected $primaryKey = 'malfunction_id';
    protected $fillable = [ 'descrizione_malfunzionamento' ];
    public $timestamps = false;
}
