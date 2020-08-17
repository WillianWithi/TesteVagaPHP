@extends('users.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="col-lg-11">
            <h3>
                Dados do Usuário
            <h3>    
        </div>
        <div class="col-lg-1">
            <a href="{{route('users.index')}}" class="btn btn-primary" style="margin-top: 20px">
                Voltar
            </a>    
        </div>    
    </div>
</div>



<div>
    <div class="row">
        <div class="col-xs-3 col-sm-3 col-md-3">
           <div class="form-group">
                <strong>Nome</strong>
                <p>{{$user->nome}}</p>
            </div>     
        </div> 
        
        <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                 <strong>Idade</strong>
                 <p>{{$user->idade}}</p>
             </div>     
         </div> 
    </div>    

    <div class="row">
         <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                 <strong>CPF</strong>   
                 <p>{{$user->cpf}}</p> 
             </div>     
         </div>
         
         <div class="col-xs-3 col-sm-3 col-md-3">
            <div class="form-group">
                 <strong>Telefone(Whatsapp)</strong> 
                 <p>{{$user->whatsapp}}</p>
             </div>     
         </div> 
    </div>    
</div>

<div class="row">
    <div class="col-lg-6">
        <h3>
            Ficha de consulta
        <h3>    
    </div>
</div>
 
<form action="{{route('consultas.store')}}" method="post" >
    @csrf
    <div class="row">
        <input class="form-check-input" type="hidden"  name="user_id" value={{$user->id}}>
        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="febre"  name="febre" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Febre
            </label>
        </div>
        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="coriza" name="coriza" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Coriza
            </label>
        </div>
        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="nariz_entupido" name="nariz_entupido" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Nariz Entupido
            </label>
        </div>

        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="cansaco" name="cansaco" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Cansaço
            </label>
        </div>

        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="tosse" name="tosse" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Tosse
            </label>
        </div>

        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="dor_cabeca" name="dor_cabeca" onclick="onCheck()"> 
            <label class="form-check-label" for="defaultCheck1">
            Dor de Cabeça
            </label>
        </div>


        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="dor_garaganta" name="dor_garganta" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Dor no corpo
            </label>
        </div>

        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="mal_estar_geral" name="mal_estar_geral" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Mal estar Geral
            </label>
        </div>
        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="dor_garganta" name="dor_garganta" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Dor de Garganta
            </label>
        </div>
        
        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="falta_paladar" name="falta_paladar" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Falta de paladar
            </label>
        </div>
        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="falta_olfato" name="falta_olfato" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Falta de olfato
            </label>
        </div>

        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="diarreia" name="diarreia" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Diarréia
            </label>
        </div>

        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="dificuldade_respirar" name="dificuldade_respirar" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Dificuldade de respirar
            </label>
        </div>

        <div class="col-lg-3">
            <input class="form-check-input" type="checkbox"  id="dificuldade_locomocao" name="dificuldade_locomocao" onclick="onCheck()">
            <label class="form-check-label" for="defaultCheck1">
            Dificuldade de locomoção
            </label>
        </div>

        <div id="diagnostico" class="col-xs-12 col-sm-12 col-md-12 alert alert-success">
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <button type="submit" class="btn btn-primary">
                Cadastrar
            </button>
        </div>
    </div>  
</form>  

<script type="text/javascript">

 function onCheck(){
    let percentual = 100 / 14;
    let percentualTotal = 0;
    $('.form-check-input').each(function(item, tag) {
     
        if ($(tag).prop('checked')) {
        
            percentualTotal += percentual;
        }
    })
    if (percentualTotal >= 60) {
        $('#diagnostico').html('Possível Infectado');
    } else if (percentualTotal >= 40) {
        $('#diagnostico').html('Potencial Infectado');
    } else {
        $('#diagnostico').html('Sintomas Insuficientes');
    }
 }
    
</script>    

@endsection