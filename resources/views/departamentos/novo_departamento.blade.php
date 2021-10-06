<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Cadastro Gestores</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><font size="4">Pesquisa de Clima - Cadastro Gestores</font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Cadastro de Gestores</font></h4>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                @if ($errors->any())
                  <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                  </ul>
                  </div>
                @endif 
                <form action="{{\Request::route('storeDepartamento')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <table class="table">
                    <thead>
                    <tr>
                      <td> DEPARTAMENTO </td>
                      <td> <input type="text" id="nome" name="nome" class="form-control" width="400px" /> </td>
                     </tr>
                    </thead>
                     <tr> 
                      <td colspan="2"> <br><p align="right">
                       <a href="{{ route('cadastroDepartamento') }}" class="btn btn-warning btn-sm" value="Voltar">Voltar</a>
                       <input type="submit" class="btn btn-success btn-sm" value="Salvar" id="Salvar" name="Salvar" /> </p>
                      </td>
                     </tr>
                  </table>
                  </form>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>