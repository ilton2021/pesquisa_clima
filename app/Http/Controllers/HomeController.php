<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Perguntas;
use App\Models\PerguntasRespostas;
use App\Models\Unidade;
use App\Models\Gestor;
use App\Models\Usuario;
use App\Models\Comentario;
use App\Models\Categoria;
use Validator;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('menus');
    }

    public function pesquisa($id)
    {
        $usuario = Usuario::where('id',$id)->get();
        return view('pesquisa', compact('usuario'));
    }

    public function menus()
    {
        return view('menus');
    }

    public function graficos()
    {
      return view('graficos');
    }

    public function graficos1()
    {
      $unidades = Unidade::all();
      $media = 0;
      return view('graficos/graficos1', compact('unidades','media'));
    }

    public function graficos2()
    {
      $unidades   = Unidade::all();
      $categorias = Categoria::all();
      $media = 0;
      return view('graficos/graficos2', compact('unidades','media','categorias'));
    }

    public function graficos3()
    {
      $unidades   = Unidade::all();
      $categorias = Categoria::all();
      $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
      return view('graficos/graficos3', compact('unidades','qtdR1','qtdR2','qtdR3','qtdR4','qtdR5','categorias'));
    }

    public function graficos4()
    {
      $unidades   = Unidade::all();
      $categorias = Categoria::all();
      $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0; $media = 0;
      return view('graficos/graficos4', compact('unidades','media','qtdR1','qtdR2','qtdR3','qtdR4','qtdR5','categorias'));
    }

    public function graficos5()
    {
      $unidades   = Unidade::all();
      $categorias = Categoria::all();
      $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0; $media = 0;
      return view('graficos/graficos5', compact('unidades','media','qtdR1','qtdR2','qtdR3','qtdR4','qtdR5','categorias'));
    }

    public function pesquisaGraficos2(Request $request)
    {
      $input = $request->all();
      $und    = $input['unidade_id'];
      $perfil = $input['categoria_id'];
      $unidades = Unidade::all();
      $categorias = Categoria::all();
      $qtd1 = 0; $qtd2 = 0; $qtd3 = 0;
      if($perfil == 1){
        $pilar1 = PerguntasRespostas::where('categoria_id',1)->where('unidade_id',$und)->get();
        $qtd1 = sizeof($pilar1);
        if($qtd1 == 0){ $a = ""; } else { $a = $qtd1 % 11; if($a == 0){ $qtd1 = 1; } else { $qtd1 = $a; } }  
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd1; $z++){
          if($pilar1[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar1[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar1[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar1[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar1[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
        $media = ($qtdR1 + $qtdR2 + $qtdR3 + $qtdR4 + $qtdR5) / 2;
      } else if($perfil == 2) {
        $pilar2 = PerguntasRespostas::where('categoria_id',2)->where('unidade_id',$und)->get();
        $qtd2 = sizeof($pilar2);
        if($qtd2 == 0){ $b = ""; } else { $b = $qtd2 % 8; if($b == 0){ $qtd2 = 1; } else { $qtd2 = $b; } }  
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd2; $z++){
          if($pilar2[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar2[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar2[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar2[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar2[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
        $media = ($qtdR1 + $qtdR2 + $qtdR3 + $qtdR4 + $qtdR5) / 2;
      } else if($perfil == 3) {
        $pilar3 = PerguntasRespostas::where('categoria_id',3)->where('unidade_id',$und)->get();
        $qtd3 = sizeof($pilar3);
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd3; $z++){
          if($pilar3[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar3[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar3[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar3[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar3[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
        $media = ($qtdR1 + $qtdR2 + $qtdR3 + $qtdR4 + $qtdR5) / 2; 
        if($qtd3 == 0){ $c = ""; } else { $c = $qtd3 % 11; if($c == 0){ $qtd3 = 1; } else { $qtd3 = $c; } }           
      }
      session()->flashInput($request->input());
      $qtdT = $qtd1 + $qtd2 + $qtd3;  
      return view('graficos/graficos2', compact('unidades','categorias','media'));
    }

    public function pesquisaGraficos3(Request $request)
    {
      $input = $request->all();
      $und    = $input['unidade_id'];
      $perfil = $input['categoria_id'];
      $unidades = Unidade::all();
      $categorias = Categoria::all();
      $qtd1 = 0; $qtd2 = 0; $qtd3 = 0;
      if($perfil == 1){
        $pilar1 = PerguntasRespostas::where('categoria_id',1)->where('unidade_id',$und)->get();
        $qtd1 = sizeof($pilar1);
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd1; $z++){
          if($pilar1[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar1[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar1[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar1[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar1[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
      } else if($perfil == 2) {
        $pilar2 = PerguntasRespostas::where('categoria_id',2)->where('unidade_id',$und)->get();
        $qtd2 = sizeof($pilar2);
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd2; $z++){
          if($pilar2[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar2[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar2[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar2[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar2[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
      } else if($perfil == 3) {
        $pilar3 = PerguntasRespostas::where('categoria_id',3)->where('unidade_id',$und)->get();
        $qtd3 = sizeof($pilar3);
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd3; $z++){
          if($pilar3[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar3[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar3[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar3[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar3[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
      }
      session()->flashInput($request->input());
      return view('graficos/graficos3', compact('unidades','categorias','qtdR1','qtdR2','qtdR3','qtdR4','qtdR5'));
    }

    public function pesquisaGraficos4(Request $request)
    {
      $input = $request->all();
      $perfil = $input['categoria_id'];
      $unidades = Unidade::all();
      $categorias = Categoria::all();
      $qtd1 = 0; $qtd2 = 0; $qtd3 = 0;
      if($perfil == 1){
        $pilar1 = PerguntasRespostas::where('categoria_id',1)->get();
        $qtd1 = sizeof($pilar1);
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd1; $z++){
          if($pilar1[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar1[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar1[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar1[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar1[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
      } else if($perfil == 2) {
        $pilar2 = PerguntasRespostas::where('categoria_id',2)->get();
        $qtd2 = sizeof($pilar2);
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd2; $z++){
          if($pilar2[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar2[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar2[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar2[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar2[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
      } else if($perfil == 3) {
        $pilar3 = PerguntasRespostas::where('categoria_id',3)->get();
        $qtd3 = sizeof($pilar3);
        $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
        for($z = 0; $z < $qtd3; $z++){
          if($pilar3[$z]->respostas_id == 1){ $qtdR1 += 1; } else if($pilar3[$z]->respostas_id == 2){ $qtdR2 += 1; } else if($pilar3[$z]->respostas_id == 3){ $qtdR3 += 1; } else if($pilar3[$z]->respostas_id == 4){ $qtdR4 += 1; } else if($pilar3[$z]->respostas_id == 5){ $qtdR5 += 1; } 
        }
      }
      session()->flashInput($request->input());
      return view('graficos/graficos4', compact('unidades','categorias','qtdR1','qtdR2','qtdR3','qtdR4','qtdR5'));
    }

    public function pesquisaGraficos5(Request $request)
    {
      $input = $request->all();
      $und   = $input['unidade_id'];
      $perf  = $input['perfil'];
      $respostas = DB::table('perguntas_respostas')
        ->join('gestor','gestor.id','=','perguntas_respostas.gestor_id')
        ->select('gestor.*','perguntas_respostas.*')->where('gestor.perfil',$perf)
        ->where('perguntas_respostas.categoria_id',3)->get();
      $qtd = sizeof($respostas); 
      $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
      for($a = 0; $a < $qtd; $a++){
        if($respostas[$a]->respostas_id == 1){ $qtdR1 += 1; } else if($respostas[$a]->respostas_id == 2){ $qtdR2 += 1; } else if($respostas[$a]->respostas_id == 3){ $qtdR3 += 1; } else if($respostas[$a]->respostas_id == 4){ $qtdR4 += 1; } else if($respostas[$a]->respostas_id == 5){ $qtdR5 += 1; }
      } 
      $unidades = Unidade::all();
      return view('graficos/graficos5', compact('unidades','qtdR1','qtdR2','qtdR3','qtdR4','qtdR5'));
    }

    public function pesquisaGraficos1(Request $request)
    {
      $input = $request->all();
      $und   = $input['unidade_id'];
      $respostas = PerguntasRespostas::where('unidade_id',$und)->get();
      $qtdT = sizeof($respostas);
      $qtdR1 = 0; $qtdR2 = 0; $qtdR3 = 0; $qtdR4 = 0; $qtdR5 = 0;
      for($a = 0; $a < $qtdT; $a++){
        if($respostas[0]->respostas_id == 1){ $qtdR1 += 1; } else if($respostas[0]->respostas_id == 2){ $qtdR2 += 1; } else if($respostas[0]->respostas_id == 3){ $qtdR3 += 1; } else if($respostas[0]->respostas_id == 4){ $qtdR4 += 1; } else if($respostas[0]->respostas_id == 5){ $qtdR5 += 1; }
      } 
      $media = ($qtdR1 + $qtdR2 + $qtdR3 + $qtdR4 + $qtdR5) / 3;
      $unidades = Unidade::all();
      return view ('graficos/graficos1', compact('unidades','media'));
    }

    public function usuario_unidade()
    {
        $unidades = Unidade::all();
        return view('usuario_unidade', compact('unidades'));
    }
 
    public function verificarUsuario(Request $request)
    {
        $input = $request->all();
        $unidades  = Unidade::all();
        $validator = Validator::make($request->all(), [
          'matricula' => 'required',
        ]);
            if ($validator->fails()) {
              return view('usuario_unidade', compact('unidades'))
                  ->withErrors($validator)
                  ->withInput(session()->flashInput($request->input()));
            } else {
              $matricula = $input['matricula'];
              $unidade   = $input['unidade_id'];
              $usuario = Usuario::where('matricula',$matricula)->where('unidade_id',$unidade)->get();
              $qtdUs = sizeof($usuario);
              if($qtdUs > 0){
                return view('pesquisa', compact('usuario'));
              } else {
                $validator = "Você ainda não foi cadastrado! Fale com o RH da sua Unidade!";
                return view('usuario_unidade', compact('unidades'))
                 ->withErrors($validator)
                 ->withInput(session()->flashInput($request->input()));
            }
        }
    }

    public function pesquisaRH($id)
    {
        $usuario = Usuario::where('id',$id)->get();
        $perguntas = Perguntas::where('categoria_id',1)->get();
        return view('pesquisa/pesquisaRH', compact('perguntas','usuario'));
    }

    public function storePergRH($id, Request $request)
    {
        $input = $request->all();
        $usuario = Usuario::where('id',$id)->get();
        $input['usuario_id'] = $usuario[0]->id;
        $input['unidade_id'] = $usuario[0]->unidade_id;
        $input['gestor_id']  = $usuario[0]->gestor_id; 
        $input['categoria_id'] = 1;
        $resp = 0;
        for($a = 1; $a <= 11; $a++) {
            $input['perguntas_id'] = $a;
            if(!empty($input['mi_'.$a])) {
              if($input['mi_'.$a] == "on"){
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 1; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 1; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }  
            }
            if(!empty($input['in_'.$a])){
              if($input['in_'.$a] == "on"){   
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 2; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 2; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
            if(!empty($input['ind_'.$a])){
              if($input['ind_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 3; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 3; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
            if(!empty($input['sa_'.$a])){
              if($input['sa_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 4; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input); 
                } else {
                    $input['respostas_id'] = 4; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              } 
            }
            if(!empty($input['ms_'.$a])){
              if($input['ms_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 5; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 5; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
        }
        if($resp == 1){
          $validator = "Pesquisa Realizada com Sucesso!!";
          return view('pesquisa', compact('usuario'))
				    ->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));
        } else {
          $usuario = Usuario::where('id',$id)->get();
          $perguntas = Perguntas::where('categoria_id',1)->get();
          $validator = "Você Precisa Informar suas Respostas!!";
          return view('pesquisa/pesquisaRH', compact('perguntas','usuario'))
				    ->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));
        }
    }   

    public function pesquisaEstrutura($id)
    {
        $usuario = Usuario::where('id',$id)->get();
        $perguntas = Perguntas::where('categoria_id',2)->get();
        return view('pesquisa/pesquisaEstrutura', compact('perguntas','usuario'));
    }

    public function storePergEstrutura($id, Request $request)
    {
        $input = $request->all();
        $usuario = Usuario::where('id',$id)->get();
        $input['usuario_id'] = $usuario[0]->id;
        $input['unidade_id'] = $usuario[0]->unidade_id;
        $input['gestor_id']  = $usuario[0]->gestor_id; 
        $input['categoria_id'] = 2;
        $resp = 0;
        for($a = 1; $a <= 8; $a++) {
            $input['perguntas_id'] = $a;
            if(!empty($input['mi_'.$a])) {
              if($input['mi_'.$a] == "on"){
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 1; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 1; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }  
            }
            if(!empty($input['in_'.$a])){
              if($input['in_'.$a] == "on"){   
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 2; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 2; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
            if(!empty($input['ind_'.$a])){
              if($input['ind_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 3; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 3; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
            if(!empty($input['sa_'.$a])){
              if($input['sa_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 4; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 4; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              } 
            }
            if(!empty($input['ms_'.$a])){
              if($input['ms_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 5; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 5; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
        }
        if($resp == 1){
          $validator = "Pesquisa Realizada com Sucesso!!";
          return view('pesquisa', compact('usuario'))
            ->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));
        } else {
          $usuario = Usuario::where('id',$id)->get();
          $perguntas = Perguntas::where('categoria_id',2)->get();
          $validator = "Você Precisa Informar suas Respostas!!";
          return view('pesquisa/pesquisaEstrutura', compact('perguntas','usuario'))
            ->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));
        }
    }

    public function pesquisaGestao($id)
    {
        $usuario = Usuario::where('id',$id)->get();
        $perguntas = Perguntas::where('categoria_id',3)->get();
        return view('pesquisa/pesquisaGestao', compact('perguntas','usuario'));
    }

    public function storePergGestao($id, Request $request)
    {
        $input = $request->all();
        $usuario = Usuario::where('id',$id)->get();
        $input['usuario_id'] = $usuario[0]->id;
        $input['unidade_id'] = $usuario[0]->unidade_id;
        $input['gestor_id']  = $usuario[0]->gestor_id; 
        $input['categoria_id'] = 3;
        $resp = 0;
        for($a = 1; $a <= 12; $a++) {
            $input['perguntas_id'] = $a;
            if(!empty($input['mi_'.$a])) {
              if($input['mi_'.$a] == "on"){
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 1; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 1; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }  
            }
            if(!empty($input['in_'.$a])){
              if($input['in_'.$a] == "on"){   
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 2; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 2; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
            if(!empty($input['ind_'.$a])){
              if($input['ind_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 3; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 3; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
            if(!empty($input['sa_'.$a])){
              if($input['sa_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 4; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 4; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              } 
            }
            if(!empty($input['ms_'.$a])){
              if($input['ms_'.$a] == "on"){  
                if(!empty($input['comentario_'.$a])) {
                    $input['comentario'] = $input['comentario_'.$a]; $input['respostas_id'] = 5; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                } else {
                    $input['respostas_id'] = 5; $input['comentario'] = ""; $resp = 1;
                    $perguntas = PerguntasRespostas::create($input);
                }
              }
            }
        }
        if($resp == 1){
          $validator = "Pesquisa Realizada com Sucesso!!";
          return view('pesquisa', compact('usuario'))
            ->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));
        } else {
          $usuario = Usuario::where('id',$id)->get();
          $perguntas = Perguntas::where('categoria_id',3)->get();
          $validator = "Você Precisa Informar suas Respostas!!";
          return view('pesquisa/pesquisaGestao', compact('perguntas','usuario'))
            ->withErrors($validator)
            ->withInput(session()->flashInput($request->input()));
        }
    }
}