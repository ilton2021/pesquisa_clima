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
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">
            google.charts.load("current", {packages:["corechart"]});
            google.charts.setOnLoadCallback(drawChart);
            function drawChart() {
                var data = google.visualization.arrayToDataTable([
                ['Elemento', 'Total'],
                ['Muito Insatisfeito - <?php echo $qtdR1 ?>', <?php echo $qtdR1 ?>],
                ['Insatisfeito - <?php echo $qtdR2 ?>', <?php echo $qtdR2 ?>],
                ['Indiferente - <?php echo $qtdR3 ?>', <?php echo $qtdR3 ?>],
                ['Muito Satisfeito - <?php echo $qtdR4 ?>', <?php echo $qtdR4 ?>],
                ['Satisfeito - <?php echo $qtdR5 ?>', <?php echo $qtdR5 ?>]
                ]);
                var options = {
                title: 'Total Pesquisas:',
                width: 700,
                height: 300,
                pieHole: 0.5
                };
                var chart = new google.visualization.PieChart(document.getElementById('donutchart1'));
                chart.draw(data, options);
            }
        </script>
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top"><font size="4">Pesquisa de Clima - Gráficos</font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                @if ($errors->any())
				  <div class="alert alert-success">
					<ul>
				      @foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					  @endforeach
					</ul>
				  </div>
				@endif
                <table class="table" border="0">     
                 <tr>
                  <td width="500px"> <center><img class="img-fluid" src="{{ asset('assets/img/graficos.jpg') }}" width="80" height="80" />  Média por Gestor de Cada Unidade</center> </td>
                 </tr>
                </table>
                <center> 
                <form action="{{\Request::route('pesquisaGraficos1')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">   
                <table class="table" style="width: 1000px;"> 
                  <tr>
                    <td>
                      <a href="{{ route('graficos') }}" style="margin-top: 5px;" class="btn btn-sm btn-warning">Voltar</a>
                    </td>
                    <td align="right"> Unidade: </td>
                    <td>  
                      <select id="unidade_id" name="unidade_id" class="form-control">
                        @foreach($unidades as $und)
                          <option id="unidade_id" name="unidade_id" value="<?php echo $und->id; ?>">{{ $und->nome }}</option>
                        @endforeach
                      </select>
                    </td>
                    <td align="right"> Perfil do Gestor: </td>
                    <td>  
                      <select id="perfil" name="perfil" class="form-control">
                          <option id="perfil" name="perfil" value="Supervisor">Supervisor</option>
                          <option id="perfil" name="perfil" value="Coordenador">Coordenador</option>
                          <option id="perfil" name="perfil" value="Gerente">Gerente</option>
                          <option id="perfil" name="perfil" value="Diretor">Diretor</option>
                      </select>
                    </td>
                    <td align="center">
                     <input type="submit" style="margin-top: 5px;" class="btn btn-info btn-sm" value="Pesquisar" id="Salvar" name="Salvar" /> </p>
                    </td>
                    
                  </tr>
                  <tr> 
                   <td colspan="5" align="center"><div id="donutchart1" style="width: 400px; height: 300px;"></div></td>
                  </tr>
                </table>
                </form>
                </center>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
