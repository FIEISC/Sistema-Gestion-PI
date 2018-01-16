<?php

namespace sigespi;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = ['nom_alumno', 'email', 'semestre', 'carrera_id', 'plantel_id'];

    public function carrera()
    {
    	return $this->belongsTo(Carrera::class);
    }

    public function equipo()
    {
    	return $this->belongsTo(Equipo::class);
    }
}
