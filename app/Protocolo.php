<?php

namespace sigespi;

use Illuminate\Database\Eloquent\Model;

class Protocolo extends Model
{
    protected $table = 'protocolos';

    protected $fillable = ['nom_protocolo', 'universidad', 'facultad', 'carrera', 'introduccion', 'antecedentes', 'objetivos', 'obj_particulares', 'justificacion', 'herramientas', 'entregables', 'preguntas_guia', 'semestre', 'fec_ini', 'fec_fin', 'carrera_id', 'ciclo_id', 'user_id'];

   //Relacion 1:N con protocolos!!!!!!!!!!!!
    public function user()
    {
    	return $this->belongsTo(User::class);
    }
    
    //Relacion N:M con protocolos!!!!!!!!!!!
    public function manyUsers()
    {
        return $this->belongsToMany(User::class);
    }
    
    //Relacion 1:N con ciclos!!!!!!!!!!!!!!!!
    public function ciclo()
    {
        return $this->belongsTo(Ciclo::class);
    }

    //Relacion 1:N con carreras!!!!!!!!!!!!!!
    public function carrer()
    {
    	return $this->belongsTo(Carrera::class);
    }


/*    public function getNumUsersAttribute()
    {
        return count($this->manyUsers);
    }*/
    
    //Para que en el formulario de editar se marquen los docentes que ya estaban asignados!!
    public function getUsersAttribute()
    {
        return $this->manyUsers()->pluck('user_id')->toArray();
    }

    public function equipos()
    {
        return $this->hasMany(Equipo::class);
    }

//Para ver el nombre del tutor de proyecto en la vista de la informacion general del proyecto en el modulo de docente
    public function tutorProyecto()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
