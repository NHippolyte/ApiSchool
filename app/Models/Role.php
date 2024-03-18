<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = ['pseudo'];

    // Définissez ici les relations, par exemple :
    public function users()
    {
        return $this->hasMany(User::class);
    }
}