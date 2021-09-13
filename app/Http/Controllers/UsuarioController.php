<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Unidade;
use App\Models\Gestor;
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
        $gestores = Gestor::where('unidade_id',1)->get();
        return view('usuarios/novo_usuarios', compact('unidades','gestores'));
    }

    public function alterarUsuarios($id)
    {
        $unidades = Unidade::all();
        $usuarios = Usuario::where('id', $id)->get();
        $gestores = Gestor::all();
        return view('usuarios/alterar_usuarios', compact('usuarios','unidades','gestores'));
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
}