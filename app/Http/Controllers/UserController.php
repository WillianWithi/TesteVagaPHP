<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Consulta;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::latest()->paginate(5);

        return View('users.index', compact('users'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        // //make a post request
        $request->validate([
            'nome'     => 'required',
            'idade'    => 'required',
            'cpf'      => 'required',
            'whatsapp' => 'required'
        ]);
        //dd($request);

        // Define o valor default para a variável que contém o nome da imagem 
        $nameFile = null;
 
        // Verifica se informou o arquivo e se é válido
        if($request->hasFile('foto'))
        { 
            // Define um aleatório para o arquivo baseado no timestamps atual
            $name = uniqid(date('HisYmd'));
    
            $file = $request->foto;

            // Recupera a extensão do arquivo
            $extension = $file->extension();
    
            // Define finalmente o nome
            $nameFile = "{$name}.{$extension}";
    
            // Faz o upload:
            $upload = $file->storeAs('usuarios', $nameFile);
            // Se tiver funcionado o arquivo foi armazenado em storage/app/public/categories/nomedinamicoarquivo.extensao
    
            // Verifica se NÃO deu certo o upload (Redireciona de volta)
            if (!$upload )
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload')
                            ->withInput();
            
            $request['foto'] = $nameFile;
        }  
       
        
       
        User::create($request->all());

        return redirect()->route('users.index')->with('success','Usuário Cadastrado com Sucesso');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,User $user)
    {
        // update the user value

        $request->validate([
            'nome'     => 'required',
            'idade'    => 'required',
            'cpf'      => 'required',
            'whatsapp' => 'required',
        ]);

        

        $user->update($request->all());

        return redirect()->route('users.index')
        ->with('success', 'Usuário Atualizado com Sucesso');

    }




    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
       $user->delete();

       return redirect()->route('users.index')
       ->with('success', 'Usuário deletado com Sucesso');
    }
}
