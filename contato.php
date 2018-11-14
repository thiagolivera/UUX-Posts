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
    
    <style>
        .col-form-label{
            text-align: -webkit-right;
        }
    </style>
</head>

<body>
    <div></div>
    <div class="geral">
        <div class="header-blue" style="padding-bottom:0;">
            <nav class="navbar navbar-dark navbar-expand-md navigation-clean-search">
                <div class="container"><a class="navbar-brand" href="index.html">UUX-Posts</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Página inicial</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="extrairPosts.php">Extrair posts</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="funcionalidades.html">Funcionalidades</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="sobre.php">Sobre o projeto</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="contato.php">Contato</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self"></form><span class="navbar-text"> <a href="login.php" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="ferramenta/login/registro.php">Cadastre-se</a></div>
                </div>
            </nav>
        </div>
        
        <div class="row" style="margin-right: 0">
            <div class="card-header col-md-12" style="padding-top: 25px; padding-bottom: 20px;">
                <h4 style="text-align: center">Entre em contato conosco</h4>
            </div>
            
            <?php if(isset($_GET["sucesso"])){
                ?>
                <div class="alert alert-success alert-dismissible fade show col-md-12" role="alert" style="text-align: center">
                    <strong>E-mail enviado com sucesso!</strong> Em breve, retornaremos seu contato.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } ?>
            
            <?php if(isset($_GET["erro"])){
                ?>
                <div class="alert alert-danger alert-dismissible fade show col-md-12" role="alert" style="text-align: center">
                    <strong>Desculpe-nos.</strong> Algo de errado aconteceu, tente novamente mais tarde.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php
            } ?>
            
            <div class="col-md-8" id="formularioContato">
                <form method="POST" action="sendEmail.php">
                    <div class="form-group row">
                        <label for="seuNome" class="col-sm-2 col-form-label">Seu nome</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" autofocus name="nome" id="seuNome" required="required" placeholder="Fulano de Tal">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="seuEmail" class="col-sm-2 col-form-label">Seu e-mail</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email" id="seuEmail" required="required" placeholder="uuxposts@russas.ufc.br">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="assunto" class="col-sm-2 col-form-label">Assunto</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="assunto" id="assunto" placeholder="Quero colaborar no projeto">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mensagem" class="col-sm-2 col-form-label">Mensagem</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="mensagem" id="mensagem" required="required" placeholder="Sua mensagem..." rows="3"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="mensagem" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary col-md-2">Enviar</button>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="col-md-4" id="informacoesAlternativas">
                <h3 class="h6 hide-on-fullwidth">Informações de contato</h3>

                <div class="cinfo">
                    <h5>Onde você pode nos encontrar</h5>
                    <p>
                        Universidade Federal do Ceará - Campus Russas <br>
                        Rua Felipe Santiago, N° 411 <br>
                        Cidade Universitária, Russas - CE <br>
                        Brasil
                    </p>
                </div>

                <div class="cinfo">
                    <h5>Você pode nos enviar e-mail</h5>
                    <p>
                        marilia.mendes@ufc.br<br>
                    </p>
                </div>

                <div class="cinfo">
                    <h5>Você também pode nos ligar</h5>
                    <p>
                        Telefone: +55 88 3411 9209<br>
                    </p>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>