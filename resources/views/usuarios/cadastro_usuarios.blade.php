<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Cadastro Usuários</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
	    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>
    </head>
    <script type="text/javascript">

        function data(valor) {
                var x = document.getElementById('pesq2'); 
                var y = x.options[x.selectedIndex].text;  
                if(y == "Nome") {
                    document.getElementById('pesq').disabled = false;
                    document.getElementById('pesq').hidden   = false;
                } else if(y == "Matrícula"){
                    document.getElementById('pesq').disabled = false;
                    document.getElementById('pesq').hidden   = false;
                } else if(y == "Gestor"){
                    document.getElementById('pesq').disabled = false;
                    document.getElementById('pesq').hidden   = false;
                }
            }

            
        
        
</script>
    <body id="page-top">
    
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href=""><font size="4">Pesquisa de Clima - Cadastro Usuários</font></a>
            </div>
        </nav>
        <section class="page-section portfolio" id="portfolio">
            <div class="container"><br><br>
                <h4 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="5">Cadastro de Usuários</font></h4>
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
                <form action="{{route('pesquisarUsuario')}}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <table>
                    <tr>
                            <td>Escolha uma Opção:</td>
                                 <td> 
                                    <select class="form-control" id="pesq2" name="pesq2" onchange="data('sim')">
                                    <option id="pesq2" name="pesq2" value="">Selecione...</option>
                                    <option id="pesq2" name="pesq2" value="nome">Nome</option>	 
                                    <option id="pesq2" name="pesq2" value="matricula">Matrícula</option> 
                                    <option id="pesq2" name="pesq2" value="gestor">Gestor</option>
                                
                                  </select>	
                             </td>
                        <td> <input class="form-control" type="text" id="pesq" name="pesq" disabled required> </td>
                		<td> <input type="submit" style="color:white;" class="btn btn-info btn-sm" style="margin-top: 5px;" value="Pesquisar" id="Salvar" name="Salvar" /> </td>

                     </tr>
                    </table>
                 </form>
                <p align="right"><a href="{{ route('menus') }}" class="btn btn-ml btn-warning" value="Voltar" style="color: #FFFFFF;">Voltar<i class="fas fa-undo-alt"></i></a>
                <a href="{{ route('cadastroNovoUsuario') }}" class="btn btn-ml btn-dark" value="Novo">Novo<i class="fas fa-check"></i></a></p>
                <table class="table">
                 <thead>
                  <tr>   
                   <td style="width: 300px;"> NOME </td>
                   <td> MATRÍCULA </td>
                   <td> GESTOR </td>
                   <td> UNIDADE </td>
                   <td> ALTERAR </td>
                   <td> EXCLUIR </td>
                  </tr>
                 </thead>
                 <tbody>
                  <?php $qtd = sizeof($usuarios); ?>
                  @if($qtd > 0)
                  @foreach($usuarios as $us)
                   <tr> 
                    <td> {{ $us->nome }} </td>
                    <td> {{ $us->matricula }} </td>
                    @foreach($gestores as $ges)
                    @if($ges->id == $us->gestor_id)
                     <td> {{ $ges->nome }} </td>
                    @endif
                    @endforeach
                    @foreach($unidades as $und)
                    @if($und->id == $us->unidade_id)
                     <td> {{ $und->nome }} </td>
                    @endif
                    @endforeach
                    <td> <a href="{{ route('alterarUsuarios', $us->id) }}" class="btn btn-ml btn-info">Alterar<i class="fas fa-edit"></i></a></td>
                    <td> <a href="{{ route('excluirUsuarios', $us->id) }}" class="btn btn-ml btn-danger" value="Excluir">Excluir<i class="fas fa-times-circle"></i></a></td>
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



