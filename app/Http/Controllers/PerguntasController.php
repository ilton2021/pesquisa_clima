<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perguntas;
use App\Models\Categoria;
use Validator;

class PerguntasController extends Controller
{
    public function cadastroPerguntas()
    {
        $perguntas = Perguntas::all();
        $categorias = Categoria::all();
        return view('perguntas/cadastro_perguntas', compact('perguntas','categorias'));
    }

    public function cadastroNovaPergunta()
    {
        $categorias = Categoria::all();
        return view('perguntas/novo_perguntas', compact('categorias'));
    }

    public function alterarPergunta($id)
    {
        $perguntas  = Perguntas::where('id', $id)->get();
        $categorias = Categoria::all();
        return view('perguntas/alterar_perguntas', compact('perguntas','categorias'));
    }

    public function excluirPergunta($id)
    {
        $perguntas = Perguntas::where('id', $id)->get();
        return view('perguntas/excluir_perguntas', compact('perguntas'));
    }

    public function storePerguntas(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'descricao' => 'required|max:255',
		]);
        if ($validator->fails()) {
			$text = true;
			return view('perguntas/novo_perguntas')
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $perguntas  = Perguntas::create($input);
            $perguntas  = Perguntas::all();
            $categorias = Categoria::all();
            $validator  = "Pergunta Cadastrada com Sucesso!!";
            return view('perguntas/cadastro_perguntas', compact('perguntas','categorias'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function updatePerguntas($id, Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'descricao' => 'required|max:255',
		]);
        if ($validator->fails()) {
			$text = true;
			return view('perguntas/alterar_perguntas')
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $perguntas = Perguntas::find($id);
            $perguntas = $perguntas->update($input);
            $perguntas = Perguntas::all();
            $validator = "Pergunta Alterada com Sucesso!!";
            return view('perguntas/cadastro_perguntas', compact('perguntas'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function destroyPerguntas($id, Request $request)
    {
        $input = $request->all();
        $perguntas = Perguntas::find($id);
        $perguntas = $perguntas->delete($input);
        $perguntas = Perguntas::all();
        $validator = "Pergunta Excluída com Sucesso!!";
        return view('perguntas/cadastro_perguntas', compact('perguntas'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
    }
}