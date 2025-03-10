<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProduitCategorie extends Model
{
    use HasFactory;

    protected $table = 'produit_categorie';

    protected $fillable = [
        'produit_id',
        'categorie_id',
    ];

    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    public function produit(){
        return $this->belongsTo(Produit::class);
    }
}
