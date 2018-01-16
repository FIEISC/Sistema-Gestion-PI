<?php

namespace sigespi;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    protected $table = 'campus';

    protected $fillable = ['nom_campus', 'delegacion', 'nom_universidad'];

    public function planteles()
    {
    	return $this->hasMany(Plantel::class);
    }
}
