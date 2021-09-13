<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use Validator;

class CategoriaController extends Controller
{
    public function cadastroCategorias()
    {
        $categorias = Categoria::all();
        return view('categorias/cadastro_categorias', compact('categorias'));
    }

    public function cadastroNovaCategorias()
    {
        return view('categorias/novo_categorias');
    }

    public function alterarCategorias($id)
    {
        $categorias = Categoria::where('id', $id)->get();
        return view('categorias/alterar_categorias', compact('categorias'));
    }

    public function excluirCategorias($id)
    {
        $categorias = Categoria::where('id', $id)->get();
        return view('categorias/excluir_categorias', compact('categorias'));
    }

    public function storeCategorias(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'descricao' => 'required|max:255',
		]);
        if ($validator->fails()) {
			return view('categorias/novo_categorias')
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $categorias = Categoria::create($input);
            $categorias = Categoria::all();
            $validator = "Categoria Cadastrada com Sucesso!!";
            return view('categorias/cadastro_categorias', compact('categorias'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function updateCategorias($id, Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'descricao' => 'required|max:255',
		]);
        if ($validator->fails()) {
			$categorias = Categoria::where('id',$id)->get();
			return view('categorias/alterar_categorias', compact('categorias'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $categorias = Categoria::find($id);
            $categorias = $categorias->update($input);
            $categorias = Categoria::all();
            $validator = "Categoria Alterada com Sucesso!!";
            return view('categorias/cadastro_categorias', compact('categorias'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function destroyCategorias($id, Request $request)
    {
        $input = $request->all();
        $categorias = Categoria::find($id);
        $categorias = $categorias->delete($input);
        $categorias = Categoria::all();
        $validator = "Categoria Excluída com Sucesso!!";
        return view('categorias/cadastro_categorias', compact('categorias'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
    }
}