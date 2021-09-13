<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Escolha opção</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="{{ route('verificarUsuario')}}"><font size="4">Pesquisa de Clima</font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Escolha uma opção</font></h4>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                @if ($errors->any())
				  <div class="alert alert-success">
					<ul>
				      @foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					  @endforeach
					</ul>
				  </div>
				@endif
                <?php $id_us = $usuario[0]->id; ?>    
                <table class="table" border="0">     
                 <tr>
                  <td width="400px"> <center><b><a href="{{ route('pesquisaRH', $id_us) }}"><img class="img-fluid" src="{{ asset('assets/img/recursos-humanos.png') }}" width="70" height="70" alt="..." />RECURSOS HUMANOS</a></b></center> </td>
                  <td> <center><b><a href="{{ route('pesquisaEstrutura', $id_us) }}"><img class="img-fluid" src="{{ asset('assets/img/base-militar.png') }}" width="70" height="70" alt="..." /> ESTRUTURA</a></b></center> </td>   
                  <td> <center><b><a href="{{ route('pesquisaGestao', $id_us) }}"><img class="img-fluid" src="{{ asset('assets/img/gestao-de-talentos.png') }}" width="70" height="70" alt="..." /> GESTÃO</a></b></center> </td>   
                 </tr>
                </table>   
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
    <style>
      a{
          color: #2d4a58;
      }
      </style>
</html>
