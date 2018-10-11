<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UUX-Posts</title>
    <meta name="description" content="Uma ferramenta de avaliação de sistemas por meio de textos dos usuários">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/ionicons.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
    <link rel="stylesheet" href="assets/css/Footer-Dark.css">
    <link rel="stylesheet" href="assets/css/Header-Blue.css">
    <link rel="stylesheet" href="assets/css/Navigation-with-Button.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">
</head>

<body>
    <div></div>
    <div class="geral">
        <div class="header-blue" style="padding-bottom:0;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="#">UUX-Posts</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Página inicial</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="extrairPosts.php">Extrair posts</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="conhecer.html">Conhecer</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="publicacoes.html">Publicações</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="contato.php">Contato</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self"></form><span class="navbar-text"> <a href="#" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="#">Cadastre-se</a></div>
                </div>
            </nav>
        </div>
        
        <div class="card text-center">
            <div class="card-header" style="padding-top: 25px; padding-bottom: 20px;">
                <h4>Extrair postagens</h4>
            </div>
            <div class="card-body" style="padding-left: 20px; padding-right: 20px;">
              <?php include_once './public/escolherExtracao.php';?>
            </div>
            <div class="card-footer text-muted">
              A UUX-Posts coleta apenas postagens de usuários cujos perfis são públicos. A UUX Posts não coleta imagens.
              <br> Os dados coletados dos usuários são referentes a informação disponibilizada pelo usuário no site de rede social, como idade, sexo e localização.
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>