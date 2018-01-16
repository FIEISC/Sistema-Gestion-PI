<?php

namespace sigespi;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $fillable = ['nom_equipo', 'user_id', 'protocolo_id'];

    //Relacion 1:N con usuarios!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function user()
    {
    	return $this->belongsTo(User::class);
    }

   //Relacion 1:N con protocolos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function protocolo()
    {
    	return $this->belongsTo(Protocolo::class);
    }

   //Relacion 1:N con alumnos!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function alumnnos()
    {
    	return $this->hasMany(Alumno::class);
    }

}
