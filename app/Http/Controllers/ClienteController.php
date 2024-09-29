<?php

namespace App\Http\Controllers;
use App\Http\Requests\ClienteRequest;
use App\Models\Cliente;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;

class ClienteController extends Controller
{
    //Exibe a tela inicial com a tabela.
    public function welcome(){
        $clientes = Cliente::latest()->paginate(5);
        return view('welcome',compact('clientes'));
    }

    //Faz a pesquisa no banco de dados.
    public function search(Request $request){
        $pesquisa = $request->input('pesquisa');
        $opcao = $request->input('opcao');
        if($opcao == 'nome'){
            $clientes = Cliente::query()->when($pesquisa, function ($query,$pesquisa){
                return $query->where('nome','like',"%{$pesquisa}%");
            })->latest()->paginate(5);
        }else{
            $clientes = Cliente::query()->when($pesquisa, function ($query,$pesquisa){
                return $query->where('cpf_cnpj','like',"%{$pesquisa}%");
            })->latest()->paginate(5);
        }
        return view('welcome',compact('clientes'));
    }

    //Exibe o formulário de cadastro.
    public function create(){
            return view('cadastrar');            
    }

    //Insere os dados do cadastro no banco de dados.
    public function store(ClienteRequest $request)
    {
        $validatedData = $request->validated();
        if(isset($request->foto)){
            $nomeFoto = time().'.'.$request->foto->extension();
            $this->saveImage($request->foto,$nomeFoto);       
        }else{
            $nomeFoto = null;
        }
        Cliente::create([
            'nome' => $validatedData['nome'],            
            'cpf_cnpj' => $validatedData['cpf_cnpj'],
            'dt_nascimento' => $validatedData['dt_nascimento'],
            'nome_social' => $validatedData['nome_social'],
            'foto' => $nomeFoto
        ]);
        return redirect('/')->with('success', 'Cliente adicionado com sucesso!');
    }

    //Visualização individual do cliente.
    public function read($id){
    $cliente = Cliente::find($id);
    if($cliente == null){
        return redirect('/')->with('error','Cliente não encontrado');
    }
    return view('visualizar',['cliente' => $cliente]);
    }

    //Exibe o formulário de edição de cliente.
    public function edit($id){        
    $cliente = Cliente::find($id);
    if($cliente == null){
        return redirect('/')->with('error','Cliente não encontrado');
    }
    return view('atualizar', ['cliente' => $cliente]);
    }

    //Envia os dados do formulário de edição para o banco de dados.
    public function update(ClienteRequest $request, $id){
        $cliente = Cliente::find($id);
        if($cliente == null){
            return redirect('/')->with('error','Cliente não encontrado');
        }
        $validatedData = $request->validated();
        if(isset($request->foto)){
            $path = 'clientes/'.$cliente->foto;
            if(File::exists($path)){
                File::delete($path);
            }
            $nomeFoto = time().'.'.$request->foto->extension();
            $this->saveImage($request->foto,$nomeFoto);  
            $cliente->foto = $nomeFoto;
        }
        $cliente->nome = $request->nome;
        $cliente->cpf_cnpj = $request->cpf_cnpj;
        $cliente->dt_nascimento = $request->dt_nascimento;
        $cliente->nome_social = $request->nome_social;
        $cliente->save();
        return redirect('/')->with('success', 'Cliente atualizado com sucesso!'); 
    }

    //Salva a imagem dos formulários em dois formatos.
    private function saveImage($foto,$nomeFoto){
        $foto = ImageManager::gd()->read($foto)->coverDown(200,200);
        $foto->save(public_path('clientes/'.$nomeFoto));
        $fotomini = $foto->coverDown(50,50);
        $fotomini->save(public_path('clientes/mini/'.$nomeFoto));    

    }

    //Deleta o cadastro do cliente.
    public function delete($id){
        $cliente = Cliente::find($id);
        if($cliente == null){
            return redirect('/')->with('error','Cliente não encontrado');
        }
        $path = 'clientes/'.$cliente->foto;
        if(File::exists($path)){
            File::delete($path);
        }
        $path = 'clientes/mini/'.$cliente->foto;
        if(File::exists($path)){
            File::delete($path);
        }
        $cliente->delete();
        return redirect('/')->with('success', 'Cliente deletado com sucesso!');
    }
}
