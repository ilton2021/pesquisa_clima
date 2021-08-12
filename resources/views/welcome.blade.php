<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pesquisa de Clima - Index</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <center><a class="navbar-brand" href="#page-top">Pesquisa de Clima</a></center>
            </div>
        </nav>
        <header class="masthead bg-primary text-white text-center">
            <div class="container d-flex align-items-center flex-column">
                <img class="masthead-avatar mb-5" src="{{ asset('assets/img/avataaars.svg') }}" alt="..." />
                <h1 class="masthead-heading text-uppercase mb-0"><font size="6">Pesquisa de Clima</font></h1>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <p class="masthead-subheading font-weight-light mb-0">HCP GESTÃO</p>
            </div>
        </header>
        <section class="page-section portfolio" id="portfolio">
            <div class="container">
             <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0"><font size="6">Olá! Prezado colaborador</font></h2>
                <div class="divider-custom">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
                <div class="row">
                    <div class="col-lg-12 ms-auto"><p class="lead" align="justify">A pesquisa de clima é um recurso para levantamento de informações, que orienta de forma relevante a percepção dos funcionários em relação à empresa.
                    Nossa expectativa é que você contribua para a constante melhoria em relação aos nossos processos e desenvolvimento das nossas estratégias corporativas, desta forma, responda de forma transparente, baseado em fatos e dados de acordo com a sua experiência dentro da empresa.
                    <br>Essa é uma ferramenta sigilosa e que não fornecerá dados sobre quem responde, mas, apresentará o resultado geral do que está sendo avaliado.
                    <br><center>Contamos com a sua colaboração,</center> 
                    <br><center>Equipe de Recursos Humanos.</center></P></DIV>
                </div>
                <div class="text-center mt-4">
                    <a class="btn btn-xl btn-outline-light btn-success" href="{{ route('usuario_unidade') }}">
                        Clique aqui para realizar a Pesquisa!
                    </a>
                </div>
            </div>
        </section>
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 mb-5 mb-lg-0">
                        <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0);">
                            <img src="{{asset('assets/img/logo-hcp-gestao-oss-v2.png')}}" alt="" srcset="">
                        </li><br>
                        <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="https://www.facebook.com/sigahcp/"><i class="fab fa-fw fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="https://www.youtube.com/user/hcppernambuco"><i class="fab fa-fw fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social mx-1" target="_blank" href="https://www.linkedin.com/company-beta/5314142/"><i class="fab fa-fw fa-linkedin-in"></i></a>
                        <h4 class="text-uppercase mb-4"><br>HCPGESTAO@HCP.ORG.BR</h4>
                    </div>
                    <div class="col-lg-4">
                        <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0);">
                           <a href="http://hcp.org.br" target="_blank"> <img src="{{asset('assets/img/imagem-link-site-hcp-rodape-v2.png')}}" alt="" srcset=""> </a>
                        </li>
                        <li class="list-group-item border-0" style="background-color: rgba(185, 178, 178, 0); margin-top: 30px;">
                            <img src="{{asset('assets/img/logo-ibross-rodape.png')}}" alt="" srcset="">
                        </li>
                    </div>
                </div>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="{{ asset('js/scripts.js') }}"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
