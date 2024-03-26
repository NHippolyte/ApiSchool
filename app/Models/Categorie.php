<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;

    // La propriété $fillable permet de définir les champs qui peuvent être assignés en masse.
    // Cela est utile pour l'insertion de données via les formulaires ou lors de l'utilisation de factories.
    protected $fillable = ['name'];

    // Si votre catégorie a des relations, par exemple, une relation 'hasMany' avec 'Product',
    // vous pouvez définir ces relations dans le modèle. Voici un exemple :
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
