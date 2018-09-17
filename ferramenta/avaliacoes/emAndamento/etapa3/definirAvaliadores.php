<?php
include '../verificarSessao.class';
include './avaliadoresControle.php';

if(!isset($_SESSION['idAvaliacao'])){
    header("location:erro.php");
}

$idAvalicao = $_SESSION['idAvaliacao'];

$avaliadoresControle = new AvaliadoresControle();

//Se não for o gerente de avaliação, não tem acesso a essa página, então.. sai
if(!$avaliadoresControle->isGerente($idAvalicao, $_SESSION['login'])){
    header("location:erro.php");
}

//Se concluiu tudo, então verifica se possui o mínimo de avaliadores informados e vai para o próximo passo
if(isset($_POST['salvar'])){
    if($avaliadoresControle->verificarAvaliadoresInformados($idAvalicao)){
        $avaliadoresControle->alterarStatus($idAvalicao);
        header("location:dashboardClassificacao.php");
    } else{
        header("location:definirAvaliadores.php?erroSalvar");
    }
}

//Se foi pedido para excluir uma categoria
if(isset($_GET['excluirCategoria'])){
    if(strcmp($_GET['excluirCategoria'], "Funcionalidade") == 0){
        $avaliadoresControle->excluirCategoriaFuncionalidade($idAvalicao);
        header("location:definirAvaliadores.php");
    }
    if(strcmp($_GET['excluirCategoria'], "Tipo") == 0){
        $avaliadoresControle->excluirCategoriaTipo($idAvalicao);
        header("location:definirAvaliadores.php");
    }
    if(strcmp($_GET['excluirCategoria'], "Intencao") == 0){
        $avaliadoresControle->excluirCategoriaIntencao($idAvalicao);
        header("location:definirAvaliadores.php");
    }
    if(strcmp($_GET['excluirCategoria'], "AnaliseSentimentos") == 0){
        $avaliadoresControle->excluirCategoriaAnaliseSentimentos($idAvalicao);
        header("location:definirAvaliadores.php");
    }
    if(strcmp($_GET['excluirCategoria'], "Usabilidade") == 0){
        $avaliadoresControle->excluirCategoriaUsabilidade($idAvalicao);
        header("location:definirAvaliadores.php");
    }
    if(strcmp($_GET['excluirCategoria'], "UX") == 0){
        $avaliadoresControle->excluirCategoriaUX($idAvalicao);
        header("location:definirAvaliadores.php");
    }
    if(strcmp($_GET['excluirCategoria'], "Artefato") == 0){
        $avaliadoresControle->excluirCategoriaArtefato($idAvalicao);
        header("location:definirAvaliadores.php");
    }
}

$avaliacaoAtual = $avaliadoresControle->obterAvaliacao($idAvalicao);
$categoriasClassificacao = $avaliadoresControle->obterCategoriasAvaliacao($idAvalicao);
$classificadores = $avaliadoresControle->obterClassificadores($idAvalicao);
$validadores = $avaliadoresControle->obterValidadores($idAvalicao);
$numTotalPostagens = $avaliadoresControle->obterNumeroPostagens($idAvalicao);

if(isset($_POST["avaliadores"])){
    
    if(($_POST["postInicial"] > $numTotalPostagens) || ($_POST["postFinal"] > $numTotalPostagens) || ($_POST["postFinal"] < $_POST["postInicial"])){
        header("location:definirAvaliadores.php?alertaFaixaValores");
    } else{
        $avaliador = new Avaliador();
        $avaliador->email = $_POST["email"];
        $avaliador->idAvaliacao = $idAvalicao;
        $avaliador->papel = "Classificador";
        $avaliador->faixaInicio = $_POST["postInicial"];
        $avaliador->faixaFim = $_POST["postFinal"];
        
        if($avaliadoresControle->inserirAvaliador($avaliador)){
            header("location:definirAvaliadores.php?sucesso");
        } else{
            header("location:definirAvaliadores.php?erro");
        }
    }
} else if(isset($_POST["validadores"])){
    if(($_POST["postInicial"] > $numTotalPostagens) || ($_POST["postFinal"] > $numTotalPostagens) || ($_POST["postFinal"] < $_POST["postInicial"])){
        header("location:definirAvaliadores.php?alertaFaixaValores");
    } else{
        $avaliador = new Avaliador();
        $avaliador->email = $_POST["email"];
        $avaliador->idAvaliacao = $idAvalicao;
        $avaliador->papel = "Validador";
        $avaliador->faixaInicio = $_POST["postInicial"];
        $avaliador->faixaFim = $_POST["postFinal"];

        if($avaliadoresControle->inserirValidador($avaliador)){
            header("location:definirAvaliadores.php?sucesso");
        } else{
            header("location:definirAvaliadores.php?erro");
        }
    }
} else if(isset($_POST["categorias"])){
    $categorias = new Categorias();
     
    if(isset($_POST["funcionalidade"])){
        $categorias->funcionalidade = true;
    } else{
        $categorias->funcionalidade = 0;
    }
    
    if(isset($_POST["tipo"])){
        $categorias->tipo = true;
    } else{
        $categorias->tipo = 0;
    }
    
    if(isset($_POST["intencao"])){
        $categorias->intencao = true;
    } else{
        $categorias->intencao = 0;
    }
    
    if(isset($_POST["analiseSentimentos"])){
        $categorias->sentimentos = true;
    } else{
        $categorias->sentimentos = 0;
    }
    
    if(isset($_POST["usabilidade"])){
        $categorias->usabilidade = true;
    } else{
        $categorias->usabilidade = 0;
    }
    
    if(isset($_POST["ux"])){
        $categorias->ux = true;
    } else{
        $categorias->ux = 0;
    }
    
    if(isset($_POST["artefato"])){
        $categorias->artefato = true;
    } else{
        $categorias->artefato = 0;
    }
    
    if($avaliadoresControle->inserirCategoriasClassificacao($idAvalicao, $categorias)){
        header("location:definirAvaliadores.php?sucessoCategorias");
    } else{
        header("location:definirAvaliadores.php?erro");
    }
}

if(isset($_GET["excluir"])){
    $avaliador = new Avaliador();
    $avaliador->idAvaliacao = $idAvalicao;
    $avaliador->idPessoa = $_GET["excluir"];
    $avaliador->papel = $_GET["tipo"];
    $avaliadoresControle->excluirAvaliador($avaliador);
    header("location:definirAvaliadores.php?sucessoExcluir");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UUX-Posts | Definir avaliadores</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
  
    <!-- jQuery 3 -->
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    
    <!-- Select 2 -->
    <link rel="stylesheet" href="../../../dist/css/select2.css"/>
    <script src="../../../dist/js/select2.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include_once("cabecalho.php");?>
  <?php include_once("slidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UUX-Posts
        <small>Versão 2.0</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Associar avaliadores</li>
      </ol>
    </section>

    <section class="content">
        <div class="alert alert-error alert-dismissible" id="alertaErro" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i> E-mail não cadastrado</h4>
            Você informou o e-mail de um usuário que não possui cadastro na UUX-Posts.<br>
            Peça-o para se cadastrar e tente novamente.
        </div>
        
        <div class="alert alert-error alert-dismissible" id="alertaErroSalvar" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i>Número de avaliadores insuficiente</h4>
            O número de avaliadores informado não é suficiente para essa avaliação<br>
            Você deve informar pelo menos dois classificadores e um validador
        </div>
        
        <div class="alert alert-error alert-dismissible" id="alertaFaixaValores" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-warning"></i>A faixa de valores é inválida</h4>
            Você digitou uma faixa de valores inválida<br>
            Atente-se ao número de postagens extraídas
        </div>

        <div class="alert alert-success alert-dismissible" id="alertaSucesso" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Avaliador adicionado</h4>
            O avaliador foi adicionado com sucesso!
        </div>
        
        <div class="alert alert-success alert-dismissible" id="alertaSucessoExcluir" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Avaliador removido</h4>
            O avaliador foi removido com sucesso!
        </div>
        
        <?php
        if(isset($_GET['erro'])){
            ?> 
            <script>
                document.getElementById('alertaErro').style.display = 'block';
                $("#alertaErro").fadeTo(7000, 500).slideUp(500, function(){
                    $("#alertaErro").alert('close');
                });
            </script>
            <?php
        }
        
        if(isset($_GET['erroSalvar'])){
            ?> 
            <script>
                document.getElementById('alertaErroSalvar').style.display = 'block';
                $("#alertaErroSalvar").fadeTo(7000, 500).slideUp(500, function(){
                    $("#alertaErroSalvar").alert('close');
                });
            </script>
            <?php
        }
        
        if(isset($_GET['sucesso'])){
            ?> 
            <script>
                document.getElementById('alertaSucesso').style.display = 'block';
                $("#alertaSucesso").fadeTo(7000, 500).slideUp(500, function(){
                    $("#alertaSucesso").alert('close');
                });
            </script>
            <?php
        }
        
        if(isset($_GET['sucessoExcluir'])){
            ?> 
            <script>
                document.getElementById('alertaSucessoExcluir').style.display = 'block';
                $("#alertaSucessoExcluir").fadeTo(7000, 500).slideUp(500, function(){
                    $("#alertaSucessoExcluir").alert('close');
                });
            </script>
            <?php
        }
        
        if(isset($_GET['alertaFaixaValores'])){
            ?> 
            <script>
                document.getElementById('alertaFaixaValores').style.display = 'block';
                $("#alertaFaixaValores").fadeTo(7000, 500).slideUp(500, function(){
                    $("#alertaFaixaValores").alert('close');
                });
            </script>
            <?php
        }
        
        include_once("../avaliacaoEmAndamento.php");?>
        
        <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0; padding-right: 0;">
            <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Categorias de classificação</h3>
                        <br><i>Adicione as categorias de classificação que os avaliadores irão classificar</i>
                    </div>

                    <div class="box-body" style="padding-left: 15px; padding-right: 15px">
                        <table id="example3" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th>Categoria de classificação</th>
                                    <th style="width: 10px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                for($i = 0; $i < count($categoriasClassificacao); $i++){ ?>
                                        <?php 
                                            if(strcmp($categoriasClassificacao[$i]["funcionalidade"], '1') == '0'){
                                                ?><tr><td>Funcionalidade</td>
                                                <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?excluirCategoria=Funcionalidade"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr><?php
                                            }

                                            if(strcmp($categoriasClassificacao[$i]["tipo"], '1') == '0'){
                                                ?><tr><td>Tipo</td>
                                                <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?excluirCategoria=Tipo"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr><?php
                                            }

                                            if(strcmp($categoriasClassificacao[$i]["intencao"], '1') == '0'){
                                                ?><tr><td>Intenção</td>
                                                <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?excluirCategoria=Intencao"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr><?php
                                            }

                                            if(strcmp($categoriasClassificacao[$i]["analiseSentimentos"], '1') == '0'){
                                                ?><tr><td>Análise de Sentimentos</td>
                                                <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?excluirCategoria=AnaliseSentimentos"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr><?php
                                            }

                                            if(strcmp($categoriasClassificacao[$i]["usabilidade"], '1') == '0'){
                                                ?><tr><td>Critérios de qualidade de uso (Usabilidade)</td>
                                                <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?excluirCategoria=Usabilidade"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr><?php
                                            }

                                            if(strcmp($categoriasClassificacao[$i]["ux"], '1') == '0'){
                                                ?><tr><td>Critérios de qualidade de uso (Experiência do usuário)</td>
                                                <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?excluirCategoria=UX"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr><?php
                                            }

                                            if(strcmp($categoriasClassificacao[$i]["artefato"], '1') == '0'){
                                                ?><tr><td>Artefato</td>
                                                <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?excluirCategoria=Artefato"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td></tr><?php
                                            }
                                        ?>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <form class="form-horizontal" style="">
                            <div class="form-group" style="padding-right: 10px; display: flex; justify-content: flex-end;">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-categorias">Adicionar categoria de classificação</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-6 col-sm-12 col-xs-12" style=" padding-left: 0;">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Classificadores de postagens</h3>
                        <br><i>Para cada faixa de postagens, deve ter no mínimo 02 (dois) classificadores</i>
                        <br><i>Número total de postagens: <?php echo $numTotalPostagens ?></i>
                    </div>

                    <div class="box-body" style="padding-left: 15px; padding-right: 15px">
                        <table id="example1" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th style="width: 120px">Faixa de Postagens</th>
                                    <th>Nome</th>
                                    <th id="profissao">Profissão</th>
                                    <th style="width: 25px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                for($i = 0; $i < count($classificadores); $i++){ ?>
                                    <tr>
                                        <td><?php echo $classificadores[$i]["faixaInicio"]; ?> - <?php echo $classificadores[$i]["faixaFim"]; ?></td>
                                        <td><?php echo $classificadores[$i]["nome"]; ?></td>
                                        <td><?php echo $classificadores[$i]["profissao"]; ?></td>
                                        <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?tipo=classificador&excluir=<?php echo $classificadores[$i]["codLogin"]; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <form class="form-horizontal" style="">
                            <div class="form-group" style="padding-right: 10px; display: flex; justify-content: flex-end;">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-classificador">Adicionar classificador</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modal-classificador">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Adicionar um classificador</h4>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" action="definirAvaliadores.php" method="POST" style="padding-right: 20px; padding-left: 10px">
                                    <input type="hidden" value="avaliadores" name="avaliadores">
                                    <h4 style="text-align: center">Informe o e-mail do usuário que você deseja adicionar como classificador</h4>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" required name="email" id="email" placeholder="Ex.: fulano@uxabilidade.com">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <h4 style="text-align: center">Indique a faixa de postagens para o classificador</h4>
                                        <h4 style="text-align: center">Número total de postagens: <?php echo $numTotalPostagens ?></h4>
                                        <label for="postInicial" class="col-sm-2 control-label" style="padding-top: 0px;">Postagem inicial</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" required name="postInicial" id="postInicial" placeholder="Ex.: 2501">
                                        </div>
                                        <label for="postFinal" class="col-sm-2 control-label" style="padding-top: 0px;">Postagem final</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" required name="postFinal" id="postFinal" placeholder="Ex.: 3000">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                                </form>
                    </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            <div class="col-md-6 col-sm-12 col-xs-12" style=" padding-left: 0;">
                <div class="box box-default">
                    <div class="box-header with-border">
                        <h3 class="box-title">Validadores de classificação</h3>
                        <br><i>Para cada faixa de postagens, deve ter no mínimo 01 (um) validador</i>
                        <br><i>Número total de postagens: <?php echo $numTotalPostagens; ?></i>
                    </div>

                    <div class="box-body" style="padding-left: 15px; padding-right: 15px">
                        <table id="example2" class="table table-bordered table-hover text-center">
                            <thead>
                                <tr>
                                    <th style="width: 120px">Faixa de Postagens</th>
                                    <th>Nome</th>
                                    <th id="profissao">Profissão</th>
                                    <th style="width: 25px">Ação</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                for($i = 0; $i < count($validadores); $i++){
                                    ?>
                                    <tr>
                                        <td><?php echo $validadores[$i]["faixaInicio"]; ?> - <?php echo $validadores[$i]["faixaFim"]; ?></td>
                                        <td><?php echo $validadores[$i]["nome"]; ?></td>
                                        <td><?php echo $validadores[$i]["profissao"]; ?></td>
                                        <td><a class="btn btn-sm btn-default" href="definirAvaliadores.php?tipo=validador&excluir=<?php echo $validadores[$i]["codLogin"]; ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                        <form class="form-horizontal" style="">
                            <div class="form-group" style="padding-right: 10px; display: flex; justify-content: flex-end;">
                                <button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal-validador">Adicionar um validador</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="modal fade" id="modal-validador">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Adicionar um validador</h4>
                        </div>
                        
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" action="definirAvaliadores.php" method="POST" id="formValidadores" style="padding-right: 20px; padding-left: 10px">
                                    <input type="hidden" value="validadores" name="validadores">
                                    <h4 style="text-align: center">Informe o e-mail do usuário que você deseja adicionar como validador</h4>
                                    <h5 style="text-align: center">Recomenda-se que o validador seja experiente em classificação de postagens</h5>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">E-mail</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" required name="email" id="email" placeholder="Ex.: fulano@uxabilidade.com">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group">
                                        <h4 style="text-align: center">Indique a faixa de postagens para o validador</h4>
                                        <h4 style="text-align: center">Número total de postagens: <?php echo $numTotalPostagens ?></h4>
                                        <label for="postInicial" class="col-sm-2 control-label" style="padding-top: 0px;">Postagem inicial</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" required name="postInicial" id="postInicial" placeholder="Ex.: 2501">
                                        </div>
                                        <label for="postFinal" class="col-sm-2 control-label" style="padding-top: 0px;">Postagem final</label>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" required name="postFinal" id="postFinal" placeholder="Ex.: 3000">
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </div>
                                </form>
                    </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            
            <div class="modal fade" id="modal-categorias">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Selecione as categorias de classificação</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <form class="form-horizontal" action="definirAvaliadores.php" method="POST" id="formCategorias" style="padding-right: 20px; padding-left: 10px">
                                    <input type="hidden" value="categorias" name="categorias">
                                    <div class="form-group" style="padding-left: 20px">
                                        <div class="col-sm-10">
                                            <label style="font-weight: 500;">
                                                <input type="checkbox" name="funcionalidade" class="minimal"> Classificação por funcionalidade
                                            </label>
                                            <br>

                                            <label style="font-weight: 500;">
                                                <input type="checkbox" name="tipo" class="minimal"> Classificação por tipo
                                            </label>
                                            <br>

                                            <label style="font-weight: 500;">
                                                <input type="checkbox" name="intencao" class="minimal"> Classificação por intenção
                                            </label>
                                            <br>

                                            <label style="font-weight: 500;">
                                                <input type="checkbox" name="analiseSentimentos" class="minimal"> Classificação por análise de sentimentos
                                            </label>
                                            <br>

                                            <label style="font-weight: 500;">
                                                <input type="checkbox" name="usabilidade" id="criteriosQualidade" class="minimal"> Classificação por critérios de qualidade de uso (Usabilidade)
                                            </label>
                                            <br>

                                            <label style="font-weight: 500;">
                                                <input type="checkbox" name="ux" id="criteriosQualidade" class="minimal"> Classificação por critérios de qualidade de uso (Experiência do Usuário)
                                            </label>
                                            <br>

                                            <label style="font-weight: 500;">
                                                <input type="checkbox" name="artefato" class="minimal"> Classificação por artefato
                                            </label>
                                            <br>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </div>
                                </form>
                    </div>
                  <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
        </div>
        <div class="col-sm-3" id="btnVoltar" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="voltar()" type="button" style="margin-right: 10px;">Voltar</button>
        </div>
        <div style="float: right; padding-bottom: 10px;">
            <form action="definirAvaliadores.php" method="POST">
                <input type="hidden" name="salvar" value="salvar">
                <button type="submit" class="btn btn-info" style="margin-right: 10px;">Salvar e próximo</button>
            </form>
        </div>
        <a style="color: #ecf0f5">'</a>
    </section>
      <br>
  </div>
    <?php include_once("../../../rodape.php");?>
</div>

</body>

<style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-left: 10px;
    padding-right: 10px;
}

.content{
    padding-right: 5px;
}

@media(max-width: 1175px){    
    #profissao {
        display: none;  
    }
}
</style>

<!-- DataTables -->
<script src="../../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<script>
    $(function () {
        $('#example1').DataTable({
            "language": {
                "sEmptyTable": "Nenhum classificador encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Exibindo até _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum classificador encontrado",
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
                }
            },
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        }),
        $('#example2').DataTable({
            "language": {
                "sEmptyTable": "Nenhum validador encontrado",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Exibindo até _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum validador encontrado",
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
                }
            },
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : false,
            'autoWidth'   : false
        }),
        $('#example3').DataTable({
            "language": {
                "sEmptyTable": "Ainda não foi incluída alguma categoria de classificação",
                "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                "sInfoPostFix": "",
                "sInfoThousands": ".",
                "sLengthMenu": "Exibindo até _MENU_ resultados por página",
                "sLoadingRecords": "Carregando...",
                "sProcessing": "Processando...",
                "sZeroRecords": "Nenhum validador encontrado",
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
                }
            },
            'paging'      : false,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : false,
            'info'        : false,
            'autoWidth'   : false
        })
    })
  
    function proximo(){
        window.location.href = "contextoAvaliacao.php";
    }
    function voltar(){
        window.location.href = "../../novaAvaliacao/criarAvaliacao.php";
    }
</script>
</html>
