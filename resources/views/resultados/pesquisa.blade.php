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
                <font size="2" color="white"><?php echo $usuario[0]->nome; ?></font>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Visualização das Respostas (<?php echo $perguntas[0]->nomeCat; ?>)</font></h4>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                @if($errors->any())
				  <div class="alert alert-success">
                    <ul>
                      @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                      @endforeach
                    </ul>
                  </div>
                @endif                
                <p align="right"><a href="{{ route('respostasPesquisa') }}" class="btn btn-sm btn-warning" value="Voltar" style="color: #FFFFFF;">Voltar<i class="fas fa-undo-alt"></i></a>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table class="table">
                 <thead>
                  <tr> 
                    <td> <b>PERGUNTAS</b> </td>
                    <td><center> <b>RESPOSTAS</b> </center></td>
                  </tr>
                 </thead>
                 <tbody>
                 <?php $qtd = sizeof($perguntas); ?>
                 @foreach($perguntas as $perg) 
                  <tr> 
                    <td> {{ $perg->descricaoPerg }} </td>
                    <td><center> {{ $perg->respostaPerg }} </center></td>
                  </tr>
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