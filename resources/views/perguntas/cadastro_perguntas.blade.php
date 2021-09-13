<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Cadastro Perguntas</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><font size="4">Pesquisa de Clima - Cadastro de Perguntas</font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Cadastro de Perguntas</font></h4>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <p align="right"><a href="{{ route('menus') }}" class="btn btn-ml btn-warning" value="Voltar" style="color: #FFFFFF;">Voltar<i class="fas fa-undo-alt"></i></a>
                <a href="{{ route('cadastroNovaPergunta') }}" class="btn btn-ml btn-dark" value="Novo">Novo<i class="fas fa-check"></i></a></p>
                <table class="table">
                 <thead>
                  <tr> 
                   <td> DESCRIÇÃO </td>
                   <td> CATEGORIA </td>
                   <td> ALTERAR </td>
                   <td> EXCLUIR </td>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $qtd = sizeof($perguntas); ?>
                   @if($qtd > 0)
                   @foreach($perguntas as $peg)
                    <tr> 
                     <td> {{ $peg->descricao }} </td>
                     @foreach($categorias as $cat)
                     @if($cat->id == $peg->categoria_id)   
                      <td> {{ $cat->descricao }} </td>
                     @endif
                     @endforeach
                     <td> <a href="{{ route('alterarPergunta', $peg->id) }}" class="btn btn-ml btn-info">Alterar<i class="fas fa-edit"></i></a> </td>
                     <td> <a href="{{ route('excluirPergunta', $peg->id) }}" class="btn btn-ml btn-danger" value="Excluir">Excluir<i class="fas fa-times-circle"></i> </a> </td>
                    </tr>
                    @endforeach
                    @endif
                  </tbody>
                  </table>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
