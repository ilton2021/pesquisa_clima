<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Menu Principal</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><font size="4">Pesquisa de Clima - Menu Principal</font></a>
            </div>
            @if(Auth::check())
             <a class="nav-link" href="{{ url('/') }}" method="GET">Sair</a>
            @endif
        </nav>
          
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Menu Principal</font></h4>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <table class="table">
                 <thead>
                  <tr>   
                   <td colspan="4"> </td>
                  </tr>
                  </thead>
                  <tbody>
                   <tr> 
                    <td> Cadastro Perguntas </td>
                    <td> <a href="{{ route('cadastroPerguntas') }}" class="btn btn-ml btn-info" value="Perguntas">Perguntas </a> </td>
                    <td> Cadastro Respostas </td>
                    <td> <a href="{{ route('cadastroRespostas') }}" class="btn btn-ml btn-info" value="Respostas">Respostas </a> </td>
                   </tr>
                   <tr> 
                    <td> Cadastro Categorias </td>
                    <td> <a href="{{ route('cadastroCategorias') }}" class="btn btn-ml btn-info" value="Categorias">Categorias </a> </td>
                    <td> Cadastro Unidades </td>
                    <td> <a href="{{ route('cadastroUnidades') }}" class="btn btn-ml btn-info" value="Unidades">Unidades </a> </td>
                   </tr>
                   <tr> 
                    <td> Cadastro Gestores </td>
                    <td> <a href="{{ route('cadastroGestores') }}" class="btn btn-ml btn-info" value="Gestores">Gestores </a> </td>
                    <td> Cadastro Usuários </td>
                    <td> <a href="{{ route('cadastroUsuarios') }}" class="btn btn-ml btn-info" value="Usuarios">Usuários </a> </td>
                   </tr>
                  </tbody>
                </table>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
    <style>
            a{
                width: 100px;
        }
        </style>
</html>