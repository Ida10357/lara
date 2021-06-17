<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class auditeur_mission extends Model
{
    use HasFactory;
    protected $fillable = [
        'mission_id',
        'auditeur_id',
    ];
}
