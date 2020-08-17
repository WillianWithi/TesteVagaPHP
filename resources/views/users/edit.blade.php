@extends('users.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="float-left">
            <h2>
                Editar Usuário
            <h2>    
        </div>
        <div class="float-right">
            <a href="{{route('users.index')}}" class="btn btn-primary">
                Voltar
            </a>    
        </div>    
    </div>
</div>

@if($errors->any())

<div class="alert alert-danger">
    <strong>Erro</strong> Você deve preencher todos os campos<br><br>
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{$error}}</li>    
        @endforeach
    </ul>    
</div>
@endif

<form action="{{route('users.update', $user->id)}}" method="post">
    @csrf
    @method('PUT')

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
                <strong>Nome</strong>
                <input type="text" name="nome" value='{{$user->nome}}' class="form-control" placeholder="Nome">
            </div>     
        </div> 
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Idade</strong>
                 <input type="text" name="idade" value='{{$user->idade}}'' class="form-control" placeholder="Idade">
             </div>     
         </div> 

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>CPF</strong>
                 <input type="text" name="cpf" value='{{$user->cpf}}' class="form-control" placeholder="CPF">
             </div>     
         </div>
         
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Telefone  (Whatsapp) </strong>
                 <input type="text" name="whatsapp" value='{{$user->whatsapp}}' class="form-control" placeholder="Whatsapp">
             </div>     
         </div> 

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Foto</strong>
                 <input type="file" name="foto" class="form-control" value='{{$user->foto}}' placeholder="foto">
             </div>     
         </div> 

         <div class="col-xs-12 col-sm-12 col-md-12">
             <button type="submit" class="btn btn-primary">
                 Editar
             </button>
         </div>


    </div>    
</form>

@endsection