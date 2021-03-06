<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gestor;
use App\Models\Unidade;
use App\Models\Departamento;
use Validator;

class GestorController extends Controller
{
    public function cadastroGestores()
    {
        $gestores = Gestor::all();
        $unidades = Unidade::all();
        return view('gestores/cadastro_gestores', compact('gestores','unidades'));
    }

    public function cadastroNovoGestor()
    {
        $unidades = Unidade::all();
        $gestores = Gestor::all();
        $departamentos = Departamento::all();
        return view('gestores/novo_gestores', compact('unidades','departamentos'));
    }

    public function alterarGestores($id)
    {
        $departamentos = Departamento::all();
        $unidades = Unidade::all();
        $gestores = Gestor::where('id', $id)->get();
        return view('gestores/alterar_gestores', compact('gestores','unidades','departamentos'));
    }

    public function excluirGestores($id)
    {
        $gestores = Gestor::where('id', $id)->get();
        return view('gestores/excluir_gestores', compact('gestores'));
    }

    public function storeGestores(Request $request)
    {
        $input = $request->all();
        $departamento = Departamento::all();

        $unidades = Unidade::all();
        $validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
            'perfil' => 'required|max:255'
       ]);
        if ($validator->fails()) {
			return view('gestores/novo_gestores', compact('unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $gestores = Gestor::create($input);
            $gestores = Gestor::all();
            $validator = "Gestor Cadastrado com Sucesso!!";
            return view('gestores/cadastro_gestores', compact('gestores','unidades','departamento'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function updateGestores($id, Request $request)
    {
        $input = $request->all();
        $unidades = Unidade::all();
        $validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
            'perfil' => 'required|max:255'
		]);
        if ($validator->fails()) {
			return view('gestores/alterar_gestores', compact('unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $gestores = Gestor::find($id);
            $gestores = $gestores->update($input);
            $gestores = Gestor::all();
            $validator = "Gestor Alterado com Sucesso!!";
            return view('gestores/cadastro_gestores', compact('gestores','unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function destroyGestores($id, Request $request)
    {
        $input = $request->all();
        $gestores = Gestor::find($id);
        $gestores = $gestores->delete($input);
        $gestores = Gestor::all();
        $unidades = Unidade::all();
        $validator = "Gestor Exclu??do com Sucesso!!";
        return view('gestores/cadastro_gestores', compact('gestores','unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
    }
}