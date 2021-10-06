<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Perguntas RH</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><font size="4">Pesquisa de Clima - Perguntas RH</font></a>
                <a class="navbar-brand" href=""><font size="4">
                @foreach ($usuario as $user)
                       {{$user->nome}}
                    @endforeach
                </font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Perguntas - RH</font></h4>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div> <?php $a = 0; ?>
                @if ($errors->any())
				  <div class="alert alert-danger">
					<ul>
				      @foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					  @endforeach
					</ul>
				  </div>
				@endif 
                <?php $id_us = $usuario[0]->id; ?>
                <form action="{{\Request::route('storePergRH')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table table-bordered" style="width: 121%; margin-left: -120px" >     
                 <thead>
                  <tr>
                    <td><b> PERGUNTAS </b></td>
                    <td title="MUITO INSATISFEITO"><center><b> Muito Insatisfeito </b></center></td>
                    <td title="INSATISFEITO"><center><b> Insatisfeito </b></center></td>
                    <td title="INDIFERENTE"><center><b> Indiferente </b></center></td>
                    <td title="SATISFEITO"><center><b> Satisfeito </b></center></td>
                    <td title="MUITO SATISFEITO"><center><b> Muito Satisfeito </b></center></td>
                    <td><center><b> COMENTÁRIOS, SUGESTÕES E CRÍTICAS </b></center></td>
                  </tr>
                 </thead>
                 <tbody>
                 @foreach($perguntas as $perg)
                 <?php $a += 1; ?>
                 <tr>
                  <td style="width: 780px;"><b>  {{ $perg->descricao }} </b></td>
                  <td> <center> <input type="checkbox" id="mi_<?php echo $a ?>" name="mi_<?php echo $a ?>" /> </center> </td>
                  <td> <center> <input type="checkbox" id="in_<?php echo $a ?>" name="in_<?php echo $a ?>" /> </center> </td>
                  <td> <center> <input type="checkbox" id="ind_<?php echo $a ?>" name="ind_<?php echo $a ?>" /> </center> </td>
                  <td> <center> <input type="checkbox" id="sa_<?php echo $a ?>" name="sa_<?php echo $a ?>" /> </center> </td>
                  <td> <center> <input type="checkbox" id="ms_<?php echo $a ?>" name="ms_<?php echo $a ?>" /> </center> </td>
                  <td> <input type="text" maxlength="4000" id="comentario_<?php echo $a ?>" name="comentario_<?php echo $a ?>" class="form-control" /> </td>
                 </tr>
                 @endforeach
                 </tbody>
                 <td colspan="7"> <br><p align="right">
                   <a href="{{ route('pesquisa', $id_us) }}" class="btn btn-warning btn-sm" value="Voltar">Voltar</a>
                   <input type="submit" class="btn btn-success btn-sm" value="Salvar" id="Salvar" name="Salvar" /> </p>
                 </td>
                 <td hidden>
                 <input type="text" id="unidade_id" name="unidade_id" value="" />
                 <input type="text" id="gestor_id" name="gestor_id" value="" />
                 <input type="text" id="usuario_id" name="usuario_id" value="" />
                 <input type="text" id="comentario" name="comentario" value="" />
                 <input type="text" id="categoria_id" name="categoria_id" value="" />
                 </td>
                </table>
                </form>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
