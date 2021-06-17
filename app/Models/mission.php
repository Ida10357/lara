<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mission extends Model
{
    use HasFactory;
    protected $fillable = [
        'intitule',
        'debut',
        'fin',
        'direction_id',
    ];

    public function auditeurs() 
{ 
    return $this->belongsToMany(Auditeur::class); 
}
public function recommandations() 
{ 
    return $this->hasMany(Recommandation::class); 
}
public function directions() 
{ 
    return $this->belongsTo(Direction::class); 
}
}
