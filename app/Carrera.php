<?php

namespace sigespi;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = ['nom_carrera', 'siglas', 'grupo', 'plantel_id'];
    
    public function plantel()
    {
    	return $this->belongsTo(Plantel::class);
    }
    
    public function protocolos()
    {
    	return $this->hasMany(Protocolo::class);
    }

    public function alumnos()
    {
    	return $this->hasMany(Alumno::class);
    }
}
