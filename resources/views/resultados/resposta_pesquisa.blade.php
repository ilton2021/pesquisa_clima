<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Pesquisa Respostas</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><font size="4">Pesquisa de Clima - Visualização das Respostas</font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Visualização das Respostas</font></h4>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <form action="{{route('resultadoUsuariosPesq')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table>
                 <tr>
                 <td> <select    id="und" name="und" class="form-select" aria-label="Default select example" >
                            <option id="und" name="und"selected>Selecione a Unidade</option>
                            <option id="und" name="und" value="1">HMR</option>
                            <option id="und" name="und" value="2">UPAE BELO JARDIM</option>
                            <option id="und" name="und" value="3">UPAE ARCO VERDE</option>
                            <option id="und" name="und" value="4">UPAE ARRUDA</option>
                            <option id="und" name="und" value="5">UPAE CARUARU</option>
                            <option id="und" name="und" value="6">HSS</option>
                            <option id="und" name="und" value="7">HCA</option>
                             </select>
                    </td>
                    <td><b> <input type="submit" class="btn btn-info btn-sm" style="color:white;" value="Pesquisar" id="Pesquisar" name="Pesquisar" /></b></td>
                    </tr>
                </table>
                </form>
                @if ($errors->any())
				        <div class="alert alert-success">
                  <ul>
                      @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  </div>
                @endif
                <p align="right"><a href="{{ route('menus') }}" class="btn btn-sm btn-warning" value="Voltar" style="color: #FFFFFF;">Voltar<i class="fas fa-undo-alt"></i></a>
                
                 <?php $qtd = sizeof($perguntas); ?>
                 <table class="table">
                 <thead>
                  <tr> 
                    <td style="width: 600px;"> <b>RH</b> </td>
                    <td style="width: 400px;"> <b>UNIDADE</b> </td>
                    <td> <b>VISUALIZAR</b> </td>
                  </tr>
                 </thead>
                 <tbody>
                    @foreach($perguntas as $perg) 
                    @if($perg->catDesc == "RH")
                    <tr> 
                     <td> {{ $perg->nomeUser }} </td>
                     <td> {{ $perg->nomeUnidade }} </td>
                     <td> <a href="{{ route('resposta', array($perg->userId ,$perg->cat)) }}"  class="btn btn-sm btn-info">{{ 'VISUALIZAR' }}</a> </td>
                    </tr> 
                    @endif
                    @endforeach
                 </tbody>
                 </table>
                 
                 <table class="table">
                 <thead>
                  <tr> 
                    <td style="width: 600px;"> <b>ESTRUTURA</b> </td>
                    <td style="width: 400px;"> <b>UNIDADE</b> </td>
                    <td> <b>VISUALIZAR</b> </td>
                  </tr>
                 </thead>
                 <tbody>
                    @foreach($perguntas as $perg) 
                    @if($perg->catDesc == "Estrutura")
                    <tr> 
                     <td> {{ $perg->nomeUser }} </td>
                     <td> {{ $perg->nomeUnidade }} </td>
                     <td> <a href="{{ route('resposta', array($perg->userId ,$perg->cat)) }}" class="btn btn-sm btn-info">{{ 'VISUALIZAR' }}</a> </td>
                    </tr>
                    @endif
                    @endforeach
                 </tbody>
                 </table>   

                 <table class="table">
                 <thead>
                  <tr> 
                    <td style="width: 600px;"> <b>GESTOR</b> </td>
                    <td style="width: 400px;"> <b>UNIDADE</b> </td>
                    <td> <b>VISUALIZAR</b> </td>
                  </tr>
                 </thead>
                 <tbody>
                    @foreach($perguntas as $perg) 
                    @if($perg->catDesc == "Gestor")
                    <tr> 
                     <td> {{ $perg->nomeUser }} </td>
                     <td> {{ $perg->nomeUnidade }} </td>
                     <td> <a href="{{ route('resposta', array($perg->userId ,$perg->cat)) }}" class="btn btn-sm btn-info">{{ 'VISUALIZAR' }}</a> </td>
                    </tr> 
                    @endif
                    @endforeach
                 </tbody>
                 </table>   
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>     