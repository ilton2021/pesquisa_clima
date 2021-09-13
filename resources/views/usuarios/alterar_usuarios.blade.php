<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Alterar Usuários</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><font size="4">Pesquisa de Clima - Alterar Usuários</font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Alterar Usuários</font></h4>
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
                <form action="{{\Request::route('updateUsuarios')}}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <table class="table">
                  <thead>
                   <tr> 
                    <td> NOME: </td>
                    <td> <input type="text" id="nome" name="nome" class="form-control" width="200px" value="<?php echo $usuarios[0]->nome; ?>" /> </td>
                   </tr>
                   <tr> 
                    <td> MATRÍCULA: </td>
                    <td> <input type="text" id="matricula" name="matricula" class="form-control" width="200px" value="<?php echo $usuarios[0]->matricula; ?>" /> </td>
                   </tr>
                   <tr>
                    <td> GESTOR: </td>
                    <td>
                     <select id="gestor_id" name="gestor_id" class="form-control">
                      @foreach($gestores as $get)
                       @if($get->id == $usuarios[0]->gestor_id)
                        <option id="gestor_id" name="gestor_id" value="<?php echo $get->id; ?>" selected>{{ $get->nome }}</option>
                       @else
                        <option id="gestor_id" name="gestor_id" value="<?php echo $get->id; ?>">{{ $get->nome }}</option>
                       @endif
                      @endforeach
                     </select>
                    </td>
                   </tr>
                   <tr> 
                    <td> UNIDADE: </td>
                    <td> 
                     <select id="unidade_id" name="unidade_id" class="form-control" width="200px">
                      @foreach($unidades as $unidade)
                       @if($unidade->id == $usuarios[0]->unidade_id)
                        <option id="unidade_id" name="unidade_id" value="<?php echo $unidade->id; ?>" selected>{{ $unidade->nome }}</option>
                       @else
                        <option id="unidade_id" name="unidade_id" value="<?php echo $unidade->id; ?>">{{ $unidade->nome }}</option>
                       @endif
                      @endforeach
                     </select> 
                    </td>
                   </tr>
                  </thead>
                   <tr> 
                    <td colspan="2"> <br><p align="right">
                     <a href="{{ route('cadastroUsuarios') }}" class="btn btn-warning btn-sm" value="Voltar">Voltar</a>
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