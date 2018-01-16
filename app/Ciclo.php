<?php

namespace sigespi;

use Illuminate\Database\Eloquent\Model;

class Ciclo extends Model
{
	protected $table = 'ciclos';
	
    protected $fillable = ['nom_ciclo', 'ciclo', 'fec_ini', 'fec_fin'];
    
    //Relacion 1:N con protocolos!!!!!!!!
    public function protocolos()
    {
    	return $this->hasMany(Protocolo::class);
    }
}
