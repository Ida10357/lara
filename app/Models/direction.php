<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class direction extends Model
{
    use HasFactory;
    protected $fillable = [
        'id','libelle',
    ];
    public function missons() 
{ 
    return $this->hasMany(Mission::class); 
}
}
