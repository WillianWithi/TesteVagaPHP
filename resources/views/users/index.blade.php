@extends('users.layout')

@section('content')


<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="col-lg-11">
            <h2>Lista de usuários</h2>
        </div>
        <div class="col-lg-1">
            <!-- Button trigger modal -->
            <button id="btn-modal" data-action="{{route('users.store')}}" type="button" class="btn btn-primary" style="margin-top: 20px">
                Adicionar
            </button>
        </div>     
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{$message}}</p>
</div>
@endif


<!-- Modal Cadastro-->
<div class="modal fade" id="modal-cadastro" style="display: none;" tabindex='-1'>
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                <h4 id="title" class="modal-title"><i class="fa fa-user"></i> Cadastro de Usuário <b><span id="dados-id-exibicao"> </span></b></h4>
            </div>
            <form id="form" method="post" enctype='multipart/form-data'>
                
                <div id="container">
                </div>   
                
                <input  type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <div class="modal-body">
                
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="nome">Nome Completo<span class="obrigatorio"> *</span></label>
                            <input type="text" class="form-control nome" id="nome" name="nome" placeholder="Informe seu nome completo" minlength="3" maxlength="70" autocomplete="off">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="cpf">CPF<span class="obrigatorio"> *</span></label>
                            <input type="text" class="form-control cpf" id="cpf" name="cpf" placeholder="000.000.000-00" autocomplete="off">
                        </div>
                    </div>
                    <div class="row"> 
                    
                        <div class="form-group col-md-3">
                            <label for="idade">Idade <span class="obrigatorio"> *</span></label>
                            <input type="text" class="form-control numero" name="idade" id="idade" autocomplete="off">
                        </div>   
                        <div class="col-md-4 form-group">
                            <label for="telefone" >Telefone ( Whatsapp ) <span class="obrigatorio"> *</span></label>
                            <input type="text" class="form-control celular" name="whatsapp" id="telefone" placeholder="Informe o telefone" autocomplete="off">
                        </div>
                        <div class="col-md-2 form-group">
                            <label for="foto">Foto</label>
                            <input type="file" name="foto">
                        </div>
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <button type="submit" class="btn btn-primary">
                        Cadastrar
                    </button>
                </div>
            </div>

        </form>   
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<!-- Modal Deletar-->
<div id="modal-deletar" class="modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Deletar Usuário</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Você deseja Deletar o usuário?</p>
        </div>
        <div class="modal-footer">
          <button id="btn-submit" type="button" class="btn btn-danger">Sim</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Não</button>
        </div>
      </div>
    </div>
  </div>




<table class="table table-bordered">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Idade</th>
        <th>CPF</th>
        <th>Telefone (Whatsapp) </th>
        <th>Foto</th>
        <th width="280px">Ações</th>
    </tr>   
    </thead> 
    <tbody id="listagem">
    @foreach($users as $user)
    <tr>
        <td>{{$user->nome}}</td>    
        <td>{{$user->idade}}</td>    
        <td>{{$user->cpf}}</td>    
        <td>{{$user->whatsapp}}</td> 
        
    <td><img src="{{public_path("storage/usuarios/{$user->foto}")}}"></td> 
        <td>
            <form id="form-delete" action="{{route('users.destroy',$user->id)}}" method="post">
                @csrf
                @method('DELETE')
                <a class="btn btn-info" href="{{route('users.show', $user->id)}}">Ficha</a> 
                {{-- <a class="btn btn-primary" href="{{route('users.edit', $user->id)}}">Editar</a> --}}
    
                <button data-user="{{$user}}" data-action="{{route('users.update', $user->id)}}" type="button" class="btn btn-primary btn-editar" >
                    Editar
                </button>      
                
                <button id="btn-deletar"  type="button" class="btn btn-danger">Deletar</button>
            </form>
        </td>  

        
           
</tr>
@endforeach     
</tbody>
</table>   




{!! $users->links() !!} 

@endsection