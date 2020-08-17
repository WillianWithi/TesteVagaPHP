<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consulta extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'febre', 'coriza', 'nariz_entubido', 'cansaco', 'tosse', 'dor_cabeca', 'dor_corpo', 'mal_estar_geral',
        'dor_garganta', 'dificuldade_respirar', 'falta_paladar', 'falta_olfato', 'dificuldade_locomocao', 'diarreia', 'user_id'
    ];

    public function user(){
        return $this->belongsTo(User::Class, 'user_id');
    }
}
