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

class DepartamentoController extends Controller
{
    public function cadastroDepartamento()
    {
        $usuarios = Usuario::all();
        $departamentos = Departamento::all(); 
        return view('departamentos/cadastro_departamento', compact('usuarios','departamentos'));
    }


    public function cadastroNovoDepartamento()
    {
        $departamentos = Departamento::all();
        return view('departamentos/novo_departamento', compact('departamentos'));
    }


    public function alterarDepartamento($id)
    {
        $unidades = Unidade::all();
        $departamentos = Departamento::where('id', $id)->get();
        return view('departamentos/alterar_departamento', compact('departamentos'));
    }    


    public function excluirDepartamento($id)
    {
        $departamentos = Departamento::where('id', $id)->get();
        return view('departamentos/excluir_departamento', compact('departamentos'));
    }




    
    public function storeDepartamento(Request $request)
    {
        $input = $request->all();
        $unidades = Unidade::all();

        $validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
       ]);
        if ($validator->fails()) {
			return view('departamentos/novo_departamento', compact('unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $departamentos = Departamento::create($input);
            $departamentos = Departamento::all();
            $validator = "Departamento Cadastrado com Sucesso!!";
            return view('departamentos/cadastro_departamento', compact('unidades','departamentos'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }



    public function updateDepartamento($id, Request $request)
    {
        $input = $request->all();
        $unidades = Unidade::all();

        $validator = Validator::make($request->all(), [
			'nome'   => 'required|max:255',
		]);
        if ($validator->fails()) {
			return view('departamentos/alterar_departamento', compact('unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
		} else {
            $departamentos = Departamento::find($id);
            $departamentos = $departamentos->update($input);
            $departamentos = Departamento::all();
            $validator = "Departamento Alterado com Sucesso!!";
            return view('departamentos/cadastro_departamento', compact('unidades','departamentos'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
        }
    }



    public function destroyDepartamento($id, Request $request)
    {
        $input = $request->all();
        $departamentos = Departamento::find($id);
        $departamentos = $departamentos->delete($input);
        $departamentos = Departamento::all();
        $unidades = Unidade::all();
        $validator = "Departamento Excluído com Sucesso!!";
        return view('departamentos/cadastro_departamento', compact('departamentos','unidades'))
				  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
    }

    public function pesquisarDepartamento(Request $request){

        $input = $request->all();
        $unidades = Unidade::all();
        $departamentos = Departamento::all();

        $pesq = $input['pesq'];

        if(!empty($pesq)){
            $departamentos = DB::table('departamento')->where('nome','like','%'.$pesq.'%')->get();	  

            $validator = 'Aqui está sua pesquisa!';
            return view('departamentos/cadastro_departamento', compact('departamentos','unidades'))
            ->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));
    
        }else{

            return view('departamentos/cadastro_departamento', compact('departamentos','unidades'));
            
        }



    }


}

?>