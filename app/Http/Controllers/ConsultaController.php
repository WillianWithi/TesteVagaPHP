<?php

namespace App\Http\Controllers;
use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {  

        $request['febre']  == 'on' ? $request['febre'] = 1 : $request['febre'] = 0;
        $request['coriza']  == 'on' ? $request['coriza'] = 1 : $request['coriza'] = 0;
        $request['nariz_entupido']  == 'on' ? $request['nariz_entupido'] = 1 : $request['nariz_entupido'] = 0;
        $request['cansaco']  == 'on' ? $request['cansaco'] = 1 : $request['cansaco'] = 0;
        $request['tosse']  == 'on' ? $request['tosse'] = 1 : $request['tosse'] = 0;
        $request['dor_cabeca']  == 'on' ? $request['dor_cabeca'] = 1 : $request['dor_cabeca'] = 0;
        $request['dor_corpo']  == 'on' ? $request['dor_corpo'] = 1 : $request['dor_corpo'] = 0;
        $request['mal_estar_geral']  == 'on' ? $request['mal_estar_geral'] = 1 : $request['mal_estar_geral'] = 0;
        $request['dor_garganta']  == 'on' ? $request['dor_garganta'] = 1 : $request['dor_garganta'] = 0;
        $request['dificuldade_respirar']  == 'on' ? $request['dificuldade_respirar'] = 1 : $request['dificuldade_respirar'] = 0;
        $request['falta_paladar']  == 'on' ? $request['falta_paladar'] = 1 : $request['falta_paladar'] = 0;
        $request['falta_olfato']  == 'on' ? $request['falta_olfato'] = 1 : $request['falta_olfato'] = 0;
        $request['dificuldade_locomocao']  == 'on' ? $request['dificuldade_locomocao'] = 1 : $request['dificuldade_locomocao'] = 0;
        $request['diareia']  == 'on' ? $request['diareia'] = 1 : $request['diareia'] = 0;
        Consulta::create($request->all());
        return redirect()->route('users.index')->with('success','Consulta Cadastrada com Sucesso');
    }
}
