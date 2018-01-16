<?php

namespace sigespi;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = ['nom_docente', 'no_docente', 'email', 'password', 'plantel_id'];

    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //Relacion 1:N con protocolos!!!!!!
    public function hasProtocolos()
    {
    	return $this->hasMany(Protocolo::class);
    }

    //Relacion N:M con protocolos!!!!!!

    public function protocolos()
    {
    	return $this->belongsToMany(Protocolo::class);
    }

    //Relacion 1:N con planteles!!!!!!!!!!

    public function plantel()
    {
        return $this->belongsTo(Plantel::class);
    }
}
