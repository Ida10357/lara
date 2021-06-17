<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditeur extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'prenom',
        'type',
        'institution_id',
        'user_id',
    ];
    public function missions() 
{ 
    return $this->belongsToMany(Mission::class); 
}
public function recommandations() 
{ 
    return $this->hasMany(Recommandation::class); 
}
public function institutions() 
{ 
    return $this->belongsTo(Institution::class); 
}
public function users() 
{ 
    return $this->belongsTo(User::class); 
}
}
