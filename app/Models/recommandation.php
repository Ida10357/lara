<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class recommandation extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'echeance',
        'statut',
        'mission_id',
        'auditeur_id',
    ];
    public function missions() 
{ 
    return $this->belongsTo(Mission::class); 
}
public function auditeurs() 
{ 
    return $this->belongsTo(Auditeur::class); 
}
}
