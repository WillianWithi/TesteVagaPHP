<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class User extends Model
{
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'idade', 'cpf','whatsapp','foto', 
    ];

    public function Consultas(){
        return $this->hasMany(Consulta::Class);
    }

}


