<?php
$linkAPI = "http://uuxposts.russas.ufc.br/api/extracaoTwitter.php?";
$retorno = array();
$padroes = array();

//Padrões gramaticais
if (isset($_POST["verbos"]) && strcmp($_POST["verbos"], "on") == 0) {
    array_push($padroes, "Verbos");
    $verbos = json_decode(file_get_contents($linkAPI . "verbos"));
    $retorno = array_merge($retorno, $verbos);
}

if (isset($_POST["substantivos"]) && strcmp($_POST["substantivos"], "on") == 0) {
    array_push($padroes, "Substantivos");
    $substantivos = json_decode(file_get_contents($linkAPI . "substantivos"));
    $retorno = array_merge($retorno, $substantivos);
}

if (isset($_POST["adjetivos"]) && strcmp($_POST["adjetivos"], "on") == 0) {
    array_push($padroes, "Adjetivos");
    $adjetivos = json_decode(file_get_contents($linkAPI . "adjetivos"));
    $retorno = array_merge($retorno, $adjetivos);
}

if (isset($_POST["adverbios"]) && strcmp($_POST["adverbios"], "on") == 0) {
    array_push($padroes, "Advérbios");
    $adverbios = json_decode(file_get_contents($linkAPI . "adverbios"));
    $retorno = array_merge($retorno, $adverbios);
}


//Tipos de PRU
if (isset($_POST["elogio"]) && strcmp($_POST["elogio"], "on") == 0) {
    array_push($padroes, "Elogio");
    $elogio = json_decode(file_get_contents($linkAPI . "elogio"));
    $retorno = array_merge($retorno, $elogio);
}

if (isset($_POST["critica"]) && strcmp($_POST["critica"], "on") == 0) {
    array_push($padroes, "Crítica");
    $critica = json_decode(file_get_contents($linkAPI . "critica"));
    $retorno = array_merge($retorno, $critica);
}

if (isset($_POST["duvida"]) && strcmp($_POST["duvida"], "on") == 0) {
    array_push($padroes, "Dúvida");
    $duvida = json_decode(file_get_contents($linkAPI . "duvida"));
    $retorno = array_merge($retorno, $duvida);
}

if (isset($_POST["comparacao"]) && strcmp($_POST["comparacao"], "on") == 0) {
    array_push($padroes, "Comparação");
    $comparacao = json_decode(file_get_contents($linkAPI . "comparacao"));
    $retorno = array_merge($retorno, $comparacao);
}

if (isset($_POST["sugestao"]) && strcmp($_POST["sugestao"], "on") == 0) {
    array_push($padroes, "Sugestão");
    $sugestao = json_decode(file_get_contents($linkAPI . "sugestao"));
    $retorno = array_merge($retorno, $sugestao);
}




//Facetas UUX
if (isset($_POST["afeto"]) && strcmp($_POST["afeto"], "on") == 0) {
    array_push($padroes, "Afeto");
    $afeto = json_decode(file_get_contents($linkAPI . "afeto"));
    $retorno = array_merge($retorno, $afeto);
}

if (isset($_POST["aprendizado"]) && strcmp($_POST["aprendizado"], "on") == 0) {
    array_push($padroes, "Aprendizado");
    $aprendizado = json_decode(file_get_contents($linkAPI . "aprendizado"));
    $retorno = array_merge($retorno, $aprendizado);
}

if (isset($_POST["confianca"]) && strcmp($_POST["confianca"], "on") == 0) {
    array_push($padroes, "Confiança");
    $confianca = json_decode(file_get_contents($linkAPI . "confianca"));
    $retorno = array_merge($retorno, $confianca);
}

if (isset($_POST["eficacia"]) && strcmp($_POST["eficacia"], "on") == 0) {
    array_push($padroes, "Eficácia");
    $eficacia = json_decode(file_get_contents($linkAPI . "eficacia"));
    $retorno = array_merge($retorno, $eficacia);
}

if (isset($_POST["eficiencia"]) && strcmp($_POST["eficiencia"], "on") == 0) {
    array_push($padroes, "Eficiência");
    $eficiencia = json_decode(file_get_contents($linkAPI . "eficiencia"));
    $retorno = array_merge($retorno, $eficiencia);
}

if (isset($_POST["estetica"]) && strcmp($_POST["estetica"], "on") == 0) {
    array_push($padroes, "Estética");
    $estetica = json_decode(file_get_contents($linkAPI . "estetica"));
    $retorno = array_merge($retorno, $estetica);
}

if (isset($_POST["frustracao"]) && strcmp($_POST["frustracao"], "on") == 0) {
    array_push($padroes, "Frustração");
    $frustracao = json_decode(file_get_contents($linkAPI . "frustracao"));
    $retorno = array_merge($retorno, $frustracao);
}

if (isset($_POST["motivacao"]) && strcmp($_POST["motivacao"], "on") == 0) {
    array_push($padroes, "Motivação");
    $motivacao = json_decode(file_get_contents($linkAPI . "motivacao"));
    $retorno = array_merge($retorno, $motivacao);
}

if (isset($_POST["satisfacao"]) && strcmp($_POST["satisfacao"], "on") == 0) {
    array_push($padroes, "Satisfação");
    $satisfacao = json_decode(file_get_contents($linkAPI . "satisfacao"));
    $retorno = array_merge($retorno, $satisfacao);
}

if (isset($_POST["seguranca"]) && strcmp($_POST["seguranca"], "on") == 0) {
    array_push($padroes, "Segurança");
    $seguranca = json_decode(file_get_contents($linkAPI . "seguranca"));
    $retorno = array_merge($retorno, $seguranca);
}

if (isset($_POST["suporte"]) && strcmp($_POST["suporte"], "on") == 0) {
    array_push($padroes, "Suporte");
    $suporte = json_decode(file_get_contents($linkAPI . "suporte"));
    $retorno = array_merge($retorno, $suporte);
}

if (isset($_POST["utilidade"]) && strcmp($_POST["utilidade"], "on") == 0) {
    array_push($padroes, "Utilidade");
    $utilidade = json_decode(file_get_contents($linkAPI . "utilidade"));
    $retorno = array_merge($retorno, $utilidade);
}

if (isset($_POST["padroesPersonalizados"])) {
    array_push($padroes, $_POST["padroesPersonalizados"]);
    $padroesPersonalizados = json_decode(file_get_contents($linkAPI . "personalizado=" . $_POST["padroesPersonalizados"]));
    $retorno = array_merge($retorno, $padroesPersonalizados);
}

if (count($padroes) == 0) {
    header("location:../extrairPosts.php");
} else {
    session_start();
    $_SESSION['postagens'] = $retorno;

    //o for a seguir remove as postagens com id duplicado
    $r = array();
    for ($i = 0; $i < count($retorno); $i++) {
        $id = (array) $retorno[$i];
        $r[$id["id_str"]] = $retorno[$i];
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-129169516-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() {
                dataLayer.push(arguments);
            }
            gtag('js', new Date());

            gtag('config', 'UA-129169516-1');
        </script>
        
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>UUX-Posts</title>
        <meta name="description" content="Uma ferramenta de avaliação de sistemas por meio de textos dos usuários">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/fonts/ionicons.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700">
        <link rel="stylesheet" href="../assets/css/Footer-Dark.css">
        <link rel="stylesheet" href="../assets/css/Header-Blue.css">
        <link rel="stylesheet" href="../assets/css/Navigation-with-Button.css">
        <link rel="stylesheet" href="../assets/css/styles.css">

        <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
        <link rel="icon" href="../favicon.ico" type="image/x-icon">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

        <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
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
                                <li class="nav-item" role="presentation"><a class="nav-link" href="../index.html">Página inicial</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link active" href="../extrairPosts.php">Extrair posts</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="../funcionalidades.html">Funcionalidades</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="../sobre.html">Sobre o projeto</a></li>
                                <li class="nav-item" role="presentation"><a class="nav-link" href="../contato.php">Contato</a></li>
                            </ul>
                            <form class="form-inline mr-auto" target="_self"></form><span class="navbar-text"> <a href="../login.php" class="login">Log In</a></span><a class="btn btn-light action-button" role="button" href="../ferramenta/login/registro.php">Cadastre-se</a></div>
                    </div>
                </nav>
            </div>

            <div class="card text-center">
                <div class="card-header" style="padding-top: 25px; padding-bottom: 20px;">
                    <h4>Extrair postagens</h4>
                </div>
                <div class="card-body" style="padding-left: 20px; padding-right: 20px;">
                    <section class="content"> 
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="box box-body">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Postagens extraídas do Twitter com padrões de: 
                                        <?php
                                        for ($i = 0; $i < count($padroes); $i++) {
                                            if ($i == (count($padroes) - 1)) {
                                                echo $padroes[$i] . '.';
                                            } else {
                                                echo $padroes[$i] . ', ';
                                            }
                                        }
                                        ?>

                                    </h3>
                                </div>
                                <div class="table" style="padding-right: 20px; padding-left: 20px; padding-top: 10px">
                                    <table id="example1" class="table table-hover no-margin text-center table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Postagem</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php
                                            $j = 1;
                                            foreach ($r as $r) {
                                                $post = (array) $r;
                                                ?>
                                                <tr>
                                                    <td><?php echo $j++; ?></td>
                                                    <td style="text-align: left"><?php echo $post["text"]; ?></td>
                                                </tr>
                                                <?php
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-info" onclick="voltar();" style="margin-left: 10px;">Voltar</button>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-info" onclick="exportarPostagens();" style="margin-right: 10px;">Exportar postagens para CSV</button>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="card-footer text-muted">
                    A UUX-Posts coleta apenas postagens de usuários cujos perfis são públicos. A UUX Posts não coleta imagens.
                    <br> Os dados coletados dos usuários são referentes a informação disponibilizada pelo usuário no site de rede social, como idade, sexo e localização.
                </div>
            </div>
        </div>    

        <script>
            $(document).ready(function () {
                $('#example1').DataTable({
                    "language": {
                        "sEmptyTable": "Nenhum registro encontrado",
                        "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                        "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                        "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                        "sInfoPostFix": "",
                        "sInfoThousands": ".",
                        "sLengthMenu": "Exibindo até _MENU_ resultados por página",
                        "sLoadingRecords": "Carregando...",
                        "sProcessing": "Processando...",
                        "sZeroRecords": "Nenhum registro encontrado",
                        "sSearch": "Pesquisar: ",
                        "oPaginate": {
                            "sNext": "Próximo",
                            "sPrevious": "Anterior",
                            "sFirst": "Primeiro",
                            "sLast": "Último"
                        },
                        "oAria": {
                            "sSortAscending": ": Ordenar colunas de forma ascendente",
                            "sSortDescending": ": Ordenar colunas de forma descendente"
                        },
                    }
                });
            });
        </script>
    </body>

    <script>
        function exportarPostagens() {
            window.location.href = "exportarCSV.php?exportarSessao";
        }

        function voltar() {
            window.location.href = "../extrairPosts.php";
        }
    </script>

</html>