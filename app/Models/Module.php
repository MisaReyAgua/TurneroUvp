<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory;

    protected $fillable = [
        'turno_id',
        'estado',
    ];

    public function turno()
    {
        return $this->belongsTo(Turno::class);
    }

    public function alumnos()
    {
        return $this->hasMany(Alumno::class);
    }
}
