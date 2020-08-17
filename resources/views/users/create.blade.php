@extends('users.layout')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="float-left">
            <h2>
                Adicionar novo Usuário
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

<form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
           <div class="form-group">
                <strong>Nome</strong>
                <input type="text" name="nome" class="form-control" placeholder="Nome">
            </div>     
        </div> 
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Idade</strong>
                 <input type="text" name="idade" class="form-control" placeholder="Idade">
             </div>     
         </div> 

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>CPF</strong>
                 <input type="text" name="cpf" class="form-control" placeholder="CPF">
             </div>     
         </div>
         
         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Telefone(Whatsapp)</strong>
                 <input type="text" name="whatsapp" class="form-control" placeholder="Whatsapp">
             </div>     
         </div> 

         <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                 <strong>Foto</strong>
                 <input type="file" name="foto" class="form-control" placeholder="foto">
             </div>     
         </div> 

         <div class="col-xs-12 col-sm-12 col-md-12">
             <button type="submit" class="btn btn-primary">
                 Cadastrar
             </button>
         </div>


    </div>    
</form>

@endsection