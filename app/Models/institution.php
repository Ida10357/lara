<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class institution extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
    ];
    public function recommandations() 
{ 
    return $this->hasMany(Recommandation::class); 
}
}
