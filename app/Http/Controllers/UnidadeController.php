<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unidade;
use Validator;

class UnidadeController extends Controller
{
    public function cadastroUnidades()
    {
        $unidades = Unidade::all();
        return view('unidade/cadastro_unidades', compact('unidades'));
    }

    public function cadastroNovaUnidade()
    {
        return view('unidade/novo_unidades');
    }

    public function alterarUnidades($id)
    {
        $unidades = Unidade::where('id', $id)->get();
        return view('unidade/alterar_unidades', compact('unidades'));
    }

    public function excluirUnidades($id)
    {
        $unidades = Unidade::where('id', $id)->get();
        return view('unidade/excluir_unidades', compact('unidades'));
    }

    public function storeUnidades(Request $request)
    {
        $input = $request->all(); 
        $nome = $_FILES['imagem']['name'];
        $nomeI = $_FILES['icone']['name'];
		$extensao = pathinfo($nome, PATHINFO_EXTENSION);
        $validator = Validator::make($request->all(), [
            'nome'  => 'required|max:255',
            'sigla' => 'required|max:255'
        ]);
        if ($validator->fails()) {
            return view('unidade/novo_unidades')
                  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
        if($request->file('imagem') === NULL) {	
			$validator = "Selecione uma foto para a Unidade!!";
            return view('unidade/novo_unidades')
                ->withErrors($validator)
                ->withInput(session()->flashInput($request->input()));
		} else {
			if($extensao == 'jpg' || $extensao == 'png' || $extensao == 'jpeg') {
                    $request->file('imagem')->move('../public/storage/unidade/', $nome);
                    $request->file('icone')->move('../public/storage/unidade/', $nomeI);
                    $input['imagem']  = $nome; 
                    $input['icone']   = $nomeI;
                    $input['caminho'] = 'unidade/'.$nome; 
                    $unidades  = Unidade::create($input);
                    $unidades  = Unidade::all();
                    $validator = "Unidade Cadastrada com Sucesso!!";
                    return view('unidade/cadastro_unidades', compact('unidades'))
                          ->withErrors($validator)
                          ->withInput(session()->flashInput($request->input()));
            } else {
                $validator = "a Foto tem que ser do tipo: .jpg ou .png ou .jpeg!!";
                return view('unidade/novo_unidades')
                    ->withErrors($validator)
                    ->withInput(session()->flashInput($request->input()));
            }
        }
    }

    public function updateUnidades($id, Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($request->all(), [
			'nome' => 'required|max:255',
		]);
        if ($validator->fails()) {
			$unidades = Unidade::where('id',$id)->get();
			return view('unidade/alterar_unidades', compact('unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $unidades = Unidade::find($id);
            $unidades = $unidades->update($input);
            $unidades = Unidade::all();
            $validator = "Unidade Alterada com Sucesso!!";
            return view('unidade/cadastro_unidades', compact('unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }

    public function destroyUnidades($id, Request $request)
    {
        $input = $request->all();
        $unidades = Unidade::find($id);
        $unidades = $unidades->delete($input);
        $unidades = Unidade::all();
        $validator = "Unidade Excluída com Sucesso!!";
        return view('unidade/cadastro_unidades', compact('unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
    }
}