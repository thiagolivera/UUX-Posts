<?php
    include_once './public/extracaoCSV/Banco.php';
    $banco = new Banco();

    $sql = "SELECT * FROM `publicacoes` ORDER BY `anoPublicacao` DESC, `titulo`ASC;";
    $rtn = $banco->Executar($sql);

    $publicacoes = array();

    while($row = mysqli_fetch_assoc($rtn)){
        $publicacoes[] = $row;
    }
?>

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
                <div class="container"><a class="navbar-brand" href="index.html">UUX-Posts</a><button class="navbar-toggler" data-toggle="collapse" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse"
                        id="navcol-1">
                        <ul class="nav navbar-nav">
                            <li class="nav-item" role="presentation"><a class="nav-link" href="index.html">Página inicial</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="extrairPosts.php">Extrair posts</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="funcionalidades.html">Funcionalidades</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link active" href="sobre.php">Sobre o projeto</a></li>
                            <li class="nav-item" role="presentation"><a class="nav-link" href="contato.php">Contato</a></li>
                        </ul>
                        <form class="form-inline mr-auto" target="_self"></form><span class="navbar-text"> <a href="login.php" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="ferramenta/login/registro.php">Cadastre-se</a></div>
                </div>
            </nav>
        </div>
        
        <div class="row" style="margin-right: 0">
            <div class="card-header col-md-12" style="padding-top: 25px; padding-bottom: 20px;">
                <h4 style="text-align: center">Sobre o projeto</h4>
            </div>
            
            <div class="card-header col-md-12" style="padding-top: 25px; padding-bottom: 20px;">
                <h4 style="text-align: center">Publicações</h4>
            </div>
            <div class="container">
                <?php
                foreach ($publicacoes as $publicacoes){
                ?>
                    <br>
                    <div class="card col-md-12">
                        <div class="card-body">
                            <h5 class="card-title">(<?php echo $publicacoes["anoPublicacao"]; ?> - <i><?php echo $publicacoes["tipo"]; ?></i>) <?php echo $publicacoes["titulo"]; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo $publicacoes["autores"]; ?></h6>
                            <p class="card-text"><?php echo $publicacoes["conferencia"]; ?></p>
                            <a href="<?php echo $publicacoes["linkPublicacao"]; ?>" target="_blank" class="card-link">Acessar publicação</a>
                            <?php 
                                if($publicacoes["linkBibtex"] == ""){
                                ?>
                                    <a class="card-link disabled">Bibtex indisponível</a>
                                <?php
                                } else{
                                ?>
                                    <a href="<?php echo $publicacoes["linkBibtex"]; ?>" class="card-link">Baixar bibtex</a>
                                <?php
                                }
                            ?>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>