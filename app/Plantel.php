<?php

namespace sigespi;

use Illuminate\Database\Eloquent\Model;

class Plantel extends Model
{
    protected $table = 'planteles';

    protected $fillable = ['nom_plantel', 'siglas', 'campus_id'];

    public function campus()
    {
    	return $this->belongsTo(Campus::class);
    }

    public function carreras()
    {
    	return $this->hasMany(Carrera::class);
    }

    //Relacion 1:N con docentes!!!!!!!!!!!!!!!!

    public function users()
    {
        return $this->hasMany(User::class);

    }
}
