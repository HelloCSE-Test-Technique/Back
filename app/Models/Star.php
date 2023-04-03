<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Star extends Model
{
    use HasFactory;

    //colonnes de la table stars remplies en utilisant la méthode fill 
    protected $fillable = ['lastname', 'firstname', 'image', 'description'];

    //table stars ne possède pas de colonnes de timestamp
    public $timestamps = false;
}
