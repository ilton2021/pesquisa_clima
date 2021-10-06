<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Unidade;
use App\Models\Gestor;
use App\Models\Perguntas;
use App\Models\PerguntasRespostas;
use App\Models\Departamento;
use DB;
use Validator;



class UsuarioController extends Controller
{
    public function cadastroUsuarios()
    {
        $usuarios = Usuario::all();
        $unidades = Unidade::all();
        $gestores = Gestor::all();
        return view('usuarios/cadastro_usuarios', compact('usuarios','unidades','gestores'));
    }

    public function cadastroNovoUsuario()
    {
        $unidades = Unidade::all();
        $usuarios = Usuario::all();
        $departamentos = Departamento::all();
        $gestores = Gestor::all();
        return view('usuarios/novo_usuarios', compact('unidades','gestores','departamentos'));
    }

    public function alterarUsuarios($id)
    {
        $departamentos = Departamento::all();
        $unidades = Unidade::all();
        $usuarios = Usuario::where('id', $id)->get();
        $gestores = Gestor::all();
        return view('usuarios/alterar_usuarios', compact('usuarios','unidades','gestores','departamentos'));
    }

    public function excluirUsuarios($id)
    {
        $usuarios = Usuario::where('id', $id)->get();
        return view('usuarios/excluir_usuarios', compact('usuarios'));
    }

    public function storeUsuarios(Request $request)
    {
        $input = $request->all();
        $unidades = Unidade::all();
        $gestores = Gestor::all();
        $validator = Validator::make($request->all(), [
			'nome'      => 'required|max:255',
            'matricula' => 'required|max:255'
		]);
        if ($validator->fails()) {
			return view('usuarios/novo_usuarios', compact('unidades','gestores'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $usuarios = Usuario::create($input);
            $usuarios = Usuario::all();
            $gestores = Gestor::all();
            $validator = "Usuário Cadastrado com Sucesso!!";
            return view('usuarios/cadastro_usuarios', compact('usuarios','unidades','gestores'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function updateUsuarios($id, Request $request)
    {
        $input = $request->all();
        $unidades = Unidade::all();
        $gestores = Gestor::all();
        $usuarios = Usuario::all();
        $validator = Validator::make($request->all(), [
			'nome' => 'required|max:255',
		]);
        if ($validator->fails()) {
			return view('usuarios/alterar_usuarios', compact('unidades','gestores','usuarios'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $usuarios = Usuario::find($id);
            $usuarios = $usuarios->update($input);
            $usuarios = Usuario::all();
            $validator = "Usuário Alterado com Sucesso!!";
            return view('usuarios/cadastro_usuarios', compact('usuarios','unidades','gestores'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function destroyUsuarios($id, Request $request)
    {
        $input = $request->all();
        $usuarios = Usuario::find($id);
        $usuarios = $usuarios->delete($input);
        $usuarios = Usuario::all();
        $unidades = Unidade::all();
        $gestores = Gestor::all();
        $validator = "Usuário Excluído com Sucesso!!";
        return view('usuarios/cadastro_usuarios', compact('usuarios','unidades','gestores'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
    }


    public function pesquisarUsuario(Request $request){

        $input = $request->all();
        $usuarios = Usuario::all();
        $unidades = Unidade::all();
        $gestores = Gestor::all();
		if(empty($input['pesq'])) { $input['pesq'] = ""; }

        $pesquisa = $input['pesq2'];
        $pesq = $input['pesq'];

        if($pesquisa == "nome"){
			$usuarios = Usuario::where('nome','like','%'.$pesq.'%')->get();

            
	    	} elseif($pesquisa == "matricula"){
                $usuarios = Usuario::where('matricula','like','%'.$pesq.'%')->get();


                } elseif($pesquisa == "gestor"){
                    $gestores = Gestor::where('nome','like','%'.$pesq.'%')->get();


                    }else{
                            $usuarios = Usuario::all();

                    }
         $gestores = Gestor::all();
         return view('usuarios/cadastro_usuarios', compact('usuarios','unidades','gestores'));

    }

    

}