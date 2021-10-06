<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Gráficos</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><font size="4">Pesquisa de Clima - Gráficos</font></a>
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
           <table class="border-borderless" id="graf" class="table" border="0" style="text-align: left;">     
                 <tr>
                  <td width="500px"  > <b><a href="{{ route('graficos1') }}"><img class="img-fluid" src="{{ asset('assets/img/grafico.png') }}" width="60" height="60"  />  Média Total da Unidade das Notas dos Três Pilares</a></b></center> </td>
                  </tr>
                  <tr>

                  <td colspan ="2"> <b><a  href="{{ route('graficos2') }}"><img class="img-fluid" src="{{ asset('assets/img/grafico.png') }}" width="60" height="60" />  Média de Cada Pilar da Unidade</a></b></center> </td>   
                 </tr>
                 <tr> 
                  <td> <b><a href="{{ route('graficos3') }}"><img class="img-fluid" src="{{ asset('assets/img/grafico.png') }}" width="60" height="60" />  Média de Cada Item de Cada Pilar por Unidade</a></b></center> </td>   
                  </tr>
                  <tr>

                  <td> <b><a href="{{ route('graficos4') }}"><img class="img-fluid" src="{{ asset('assets/img/grafico.png') }}" width="60" height="60" />  Média de Cada Pilar Geral de Todas as Unidades</a></b></center> </td>   
                 </tr>
                 <tr> 
                  <td colspan="2"><b><a href="{{ route('graficos5') }}"><img class="img-fluid" src="{{ asset('assets/img/grafico.png') }}" width="60" height="60" /> Média por Gestor de Cada Unidade</a></b></center> </td>   
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
          color: #80c52e;
      }
      </style>

<style>

table{
    margin-left: 430px;
}
  


</style>    
</html>
