<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Respostas;
use Validator;

class RespostasController extends Controller
{
    public function cadastroRespostas()
    {
        $respostas = Respostas::all();
        return view('respostas/cadastro_respostas', compact('respostas'));
    }

    public function cadastroNovaResposta()
    {
        return view('respostas/novo_respostas');
    }

    public function alterarRespostas($id)
    {
        $respostas = Respostas::where('id', $id)->get();
        return view('respostas/alterar_respostas', compact('respostas'));
    }

    public function excluirRespostas($id)
    {
        $respostas = Respostas::where('id', $id)->get();
        return view('respostas/excluir_respostas', compact('respostas'));
    }

    public function storeRespostas(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'descricao' => 'required|max:255',
		]);
        if ($validator->fails()) {
			return view('respostas/novo_respostas')
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $respostas  = Respostas::create($input);
            $respostas  = Respostas::all();
            $validator  = "Resposta Cadastrada com Sucesso!!";
            return view('respostas/cadastro_respostas', compact('respostas'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function updateRespostas($id, Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'descricao' => 'required|max:255',
		]);
        if ($validator->fails()) {
			$respostas = Respostas::where('id',$id)->get();
            return view('respostas/alterar_respostas', compact('respostas'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $respostas = Respostas::find($id);
            $respostas = $respostas->update($input);
            $respostas = Respostas::all();
            $validator = "Resposta Alterada com Sucesso!!";
            return view('respostas/cadastro_respostas', compact('respostas'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function destroyRespostas($id, Request $request)
    {
        $input = $request->all();
        $respostas = Respostas::find($id);
        $respostas = $respostas->delete($input);
        $respostas = Respostas::all();
        $validator = "Resposta Excluída com Sucesso!!";
        return view('respostas/cadastro_respostas', compact('respostas'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
    }
}