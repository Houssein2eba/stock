<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'min_quantity',
        'unit'
    ];

    public function categorie(){
        return $this->hasMany(ProduitCategorie::class);
    }
}
