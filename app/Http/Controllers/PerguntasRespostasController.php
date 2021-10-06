<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Usuario;
use App\Models\Unidade;

class PerguntasRespostasController extends Controller
{
   public function respostasPesquisa()
   {
        $perguntas = DB::table('perguntas_respostas')
                    ->join('unidade','unidade.id','=','perguntas_respostas.unidade_id')
                    ->join('usuario','usuario.id','=','perguntas_respostas.usuario_id')
                    ->join('categorias','categorias.id','=','perguntas_respostas.categoria_id')
                    ->select('unidade.nome as nomeUnidade','usuario.nome as nomeUser','categorias.descricao as catDesc',
                    'perguntas_respostas.categoria_id as cat','perguntas_respostas.usuario_id as userId')
                    ->orderBy('catDesc','ASC')
                    ->groupBy('catDesc','nomeUser','nomeUnidade','cat','userId')
                    ->get();

        return view('resultados/resposta_pesquisa', compact('perguntas'));
   }

   public function resposta($userId, $categoria)
   {
        $perguntas = DB::table('perguntas_respostas')
            ->join('unidade','unidade.id','=','perguntas_respostas.unidade_id')
            ->join('usuario','usuario.id','=','perguntas_respostas.usuario_id')
            ->join('perguntas','perguntas.id','=','perguntas_respostas.perguntas_id')
            ->join('respostas','respostas.id','=','perguntas_respostas.respostas_id')
            ->join('categorias','categorias.id','=','perguntas_respostas.categoria_id')
            ->select('perguntas_respostas.*','usuario.nome as nomeUser','unidade.nome as nomeUnidade',
            'perguntas.descricao as descricaoPerg','respostas.descricao as respostaPerg',
            'categorias.descricao as nomeCat')
            ->where('perguntas_respostas.usuario_id','=',$userId)
            ->where('perguntas_respostas.categoria_id','=',$categoria)
            ->orderBy('perguntas_respostas.perguntas_id')
            ->get();

        $usuario = Usuario::where('id',$userId)->get();
        
        return view('resultados/pesquisa', compact('perguntas','usuario'));
   }

   public function resultadoUsuariosPesq(Request $request){

    $input = $request->all();
    $unidades = Unidade::all();
    $usuarios = Usuario::all();
    $und  = $input['und'];
    

    
        $perguntas = DB::table('perguntas_respostas')
        ->join('unidade','unidade.id','=','perguntas_respostas.unidade_id')
        ->join('usuario','usuario.id','=','perguntas_respostas.usuario_id')
        ->join('categorias','categorias.id','=','perguntas_respostas.categoria_id')
        ->select('unidade.nome as nomeUnidade','usuario.nome as nomeUser','categorias.descricao as catDesc',
        'perguntas_respostas.categoria_id as cat','perguntas_respostas.usuario_id as userId')
        ->where('unidade.id','=',$und)
        ->orderBy('catDesc','ASC')
        ->groupBy('catDesc','nomeUser','nomeUnidade','cat','userId')
        ->get();
       
                return view('resultados/resposta_pesquisa', compact('unidades','usuarios','und','perguntas'));

            }
        }
