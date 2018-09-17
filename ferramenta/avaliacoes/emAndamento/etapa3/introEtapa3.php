<?php
include '../verificarSessao.class';
include './classificacaoControle.php';

$controle = new ClassificacaoControle();
$status = $controle->obterStatus($_SESSION["idAvaliacao"])[0];;

if (isset($_POST["avaliadores"])) {
    header("location:definirAvaliadores.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UUX-Posts | Classificação de PRUs</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../../../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../../plugins/iCheck/all.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">

    <link rel="stylesheet" href="../../../dist/bootstrap-tagsinput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
    <link rel="stylesheet" href="assets/app.css">
    <script src="../../../dist/bootstrap-tagsinput.min.js"></script>

    <!-- jQuery 3 -->
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../../plugins/iCheck/icheck.min.js"></script>
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
    <?php include("cabecalho.php"); ?>
    <?php include("slidebar.php"); ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                UUX-Posts
                <small>Versão 2.0</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="../../../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li>Avaliações</li>
                <li class="active">Classificaçao de PRUs</li>
            </ol>
        </section>

        <section class="content">

            <!-- ***************************
            *      descrição da etapa 3    *
            ********************************-->
            <div class="col-md-6">
                <div class="box box-solid">
                    <div class="box box-widget widget-user">
                        <div class="widget-user-header bg-black" style="height: 250px;
                             background: url('../../../images/ClassificacaoPRUs.svg') center center; position: relative">
                            <div style="width: 100%; left: 0; top: 0; background-color: #3c8dbc;  position: absolute;">
                                <h3 style="color: white; padding-left: 15px; padding-top: 10px"
                                    class="widget-user-username">Etapa 3 - Classificação das PRUs</h3>
                                <h5 style="color: white; padding-left: 15px;" class="widget-user-desc">Metodologia
                                    MALTU</h5>
                            </div>
                        </div>
                        <div class="box-footer" style="padding-top: 10px;">
                            <h4 style="text-align: center">Nessa etapa as postagens extraídas na <a
                                        href="../etapa2/introEtapa2.php">Etapa 2 - Extração das PRUs</a>, são
                                classificadas. A classificação pode ser feita de forma automática ou por avaliadores.
                            </h4>
                        </div>
                        <!-- /.row -->
                    </div>
                </div>
            </div>

            <!-- ***************************
            *           As 5 etapas        *
            ********************************-->
            <div class="col-md-6" id="etapas">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-list-ol" style="font-size: 20px"></i>
                        <h3 class="box-title">ETAPAS DE AVALIAÇÃO</h3>
                    </div>
                    <div class="box-body">
                        <ul class="timeline">
                            <li>
                                <i class="fa fa-eercast bg-yellow"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header"><a
                                                href="../../novaAvaliacao/criarAvaliacao.php?id=<?php echo $_SESSION["idAvaliacao"]; ?>">ETAPA
                                            1 - Definição do contexto de avaliação</a></h3>
                                </div>
                            </li>

                            <li>
                                <i class="fa fa-cloud-download bg-yellow"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header"><a href="../etapa2/introEtapa2.php">ETAPA 2 - Extração
                                            das PRUs</a></h3>
                                </div>
                            </li>

                            <li>
                                <i class="fa fa-check-circle-o bg-yellow"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header"><strong>ETAPA 3 - Classificação das PRUs</strong></h3>
                                </div>
                            </li>

                            <li>
                                <i class="fa fa-bar-chart bg-yellow"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">ETAPA 4 - Interpretação dos resultados</h3>
                                </div>
                            </li>

                            <li>
                                <i class="fa fa-align-justify bg-yellow"></i>
                                <div class="timeline-item">
                                    <h3 class="timeline-header">ETAPA 5 - Relato dos resultados</h3>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- ********************************
            *       Ações do botão próximo      *
            *************************************-->
            <div style="padding-bottom: 10px;">
                <?php
                if (isset($_SESSION['papel'])) {
                    if (strcmp($_SESSION['papel'], "Gerente") == '0') {
                        if (strcmp($status, "Etapa 3 - Classificação de PRUS") == 0) {
                            ?>
                            <form action="dashboardClassificacao.php" method="POST">
                                <button type="submit" class="btn btn-info" style="width: 100%; margin-right: 10px;">
                                    Próximo
                                </button>
                            </form>
                            <?php
                        } else {
                            ?>
                            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default"
                                    style="width: 100%; margin-right: 10px;">Próximo
                            </button><?php
                        }
                    } else if (strcmp($_SESSION['papel'], "Validador") == '0') {
                        ?>
                        <form action="validacao/validacaoPostagens.php" method="POST">
                            <button type="submit" class="btn btn-info" style="width: 100%; margin-right: 10px;">
                                Próximo
                            </button>
                        </form>
                        <?php
                    } else {
                        ?>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-visualizacao"
                                style="width: 100%; margin-right: 10px;">Próximo
                        </button><?php
                    }
                }
                ?>
            </div>

            <!-- ********************************************************
            * Modal para escolher em classificação manual ou automática *
            *************************************************************-->
            <div class="modal fade" id="modal-default">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Escolha a forma de classificação</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <form action="" method="POST">
                                    <div class="col-md-6"
                                         style="display: flex; justify-content: center; padding-top: 15px">
                                        <button type="button" onclick="deshabilita()" class="btn btn-default pull-left"
                                                data-toggle="modal" data-target="#modal-avaliacoes"
                                                style="width: 350px">
                                            <img class="img-responsive center-block"
                                                 src="../../../images/automatica.png" width="150px">
                                            <br><strong style="font-size: 16px">Classificação automática</strong>
                                        </button>
                                    </div>
                                </form>

                                <form action="introEtapa3.php" method="POST">
                                    <div class="col-md-6"
                                         style="display: flex; justify-content: center; padding-top: 15px">
                                        <button type="submit" class="btn btn-default pull-left" style="width: 350px">
                                            <input type="hidden" value="avaliadores" name="avaliadores">
                                            <img class="img-responsive center-block"
                                                 src="../../../images/avaliadores.png" width="235px">
                                            <br><strong style="font-size: 16px">Classificação por avaliadores</strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- ********************************************************
            *           Modal visualização (ver oque é depois)          *
            *************************************************************-->
            <div class="modal fade" id="modal-visualizacao">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Escolha a forma de visualização da classificação</h4>
                        </div>

                        <div class="modal-body">
                            <div class="row">
                                <form action="classificacaoPostagens.php" method="POST">
                                    <div class="col-md-6"
                                         style="display: flex; justify-content: center; padding-top: 5px">
                                        <button type="submit" class="btn btn-default pull-left" style="width: 350px">
                                            <input type="hidden" value="Por postagem" name="modoVisualizacao">
                                            <img class="img-responsive center-block"
                                                 src="../../../images/porPostagem.svg" width="220px">
                                            <br><strong style="font-size: 16px">Por postagem</strong>
                                        </button>
                                    </div>
                                </form>

                                <form action="classificacaoPostagens.php" method="POST">
                                    <div class="col-md-6"
                                         style="display: flex; justify-content: center; padding-top: 5px">
                                        <button type="submit" class="btn btn-default pull-left" style="width: 350px">
                                            <input type="hidden" value="Por conjunto de postagens"
                                                   name="modoVisualizacao">
                                            <img class="img-responsive center-block"
                                                 src="../../../images/porConjunto.svg" width="200px">
                                            <br><strong style="font-size: 16px">Por conjunto de postagens</strong>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ****************************************************
            *        Modal das formas de avaliação automática       *
            *********************************************************-->
            <div class="modal fade" id="modal-avaliacoes">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Selecione o tipo de avaliação</h4>
                        </div>

                        <div class="modal-body">
                            <form class="form-horizontal" action="" method="POST" id="formCategorias"
                                  style="padding-right: 20px; padding-left: 10px">
                                <div class="form-group" style="padding-left: 20px">
                                    <div class="col-sm-12">
                                        <div class="custom-radio">
                                            <input type="radio" class="form-check-input" id="booleana"
                                                   name="formaAvaliacao" onclick="habilita(this.id, 'proximo')">
                                            <label class="custom-control-label" for="booleana">Booleana</label>
                                        </div>
                                    </div>
                                    <br>
                                    <br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                                            Cancelar
                                        </button>
                                        <button type="button" id="proximo" class="btn btn-primary"
                                                data-target="#modal-categorias" data-toggle="modal" disabled="disabled">
                                            Próximo
                                        </button>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <!-- ****************************************************
            *     Modal das cateogiras para avaliação automática    *
            *********************************************************-->
            <div class="modal fade" id="modal-categorias">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content col-sm-12">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title">Selecione as categorias de classificação</h4>
                        </div>
                        <div class="modal-body">
                            <form class="form-horizontal" action="Classificacao.php?c=FachadaClassificacao&m=classificacaoBooleana" method="POST" id="formCategorias" style="padding-right: 20px; padding-left: 10px">
                                    <div class="form-group" style="padding-left: 20px">
                                    <div class="col-sm-6">
                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Verbos" class="minimal"> Classificação
                                            por verbos
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Substantivos" class="minimal">
                                            Classificação por substantivos
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Adjetivos" class="minimal">
                                            Classificação por adjetivos
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Adverbios" class="minimal">
                                            Classificação por adverbios
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Comparacao" class="minimal">
                                            Classificação por comparações
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Elogio" class="minimal"> Classificação
                                            por elogios
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Duvida" class="minimal"> Classificação
                                            por dúvidas
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Critica" class="minimal"> Classificação
                                            por críticas
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Sugestao" class="minimal">
                                            Classificação por sugestões
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Afeto" class="minimal"> Classificação
                                            por afeto
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Confianca" class="minimal">
                                            Classificação por confiança
                                        </label>
                                        <br>
                                    </div>
                                    <div class="col-sm-6">
                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Eficacia" class="minimal">
                                            Classificação por eficácia
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Eficiencia" class="minimal">
                                            Classificação por eficiência
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Estetica" class="minimal">
                                            Classificação por estética
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Frustracao" class="minimal">
                                            Classificação por frustrações
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Motivacao" class="minimal">
                                            Classificação por motivações
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Satisfacao" class="minimal">
                                            Classificação por satisfações
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Seguranca" class="minimal">
                                            Classificação por segurança
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Suporte" class="minimal"> Classificação
                                            por suporte
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" name="Utilidade" class="minimal">
                                            Classificação por utilidades
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;">
                                            <input type="checkbox" id="outros" name="Outros"
                                                   onclick="habilita(this.id, 'outro')" class="minimal"> Outro:
                                        </label>
                                        <br>

                                        <label style="font-weight: 500;width:100%;">
                                            <input type="text" id="outro" name="filtros" class="minimal" placeholder="Separe-as por vírgula" data-role="tagsinput" disabled>
                                        </label>
                                        <br>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">
                                        Cancelar
                                    </button>
                                    <button type="submit" class="btn btn-primary">Classificar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            <a style="color: #ecf0f5">'</a>
        </section>
    </div>
    <?php include("../../../rodape.php"); ?>
</div>
</body>

<script>
    $(".alert-dismissible").fadeTo(7000, 500).slideUp(500, function () {
        $(".alert-dismissible").alert('close');
    });
</script>

<!-- Select 2 -->
<link rel="stylesheet" href="../../../dist/css/select2.css"/>
<script src="../../../dist/js/select2.js"></script>
<script src="../../../dist/js/translation.js"></script>

<script>
    $(document).ready(function () {
        $('.js-example-basic-single').select2({
            placeholder: 'Selecione',
            minimumResultsForSearch: Infinity
        });
    });

    function habilita(e, desativa) {
        document.getElementById(desativa).disabled = document.getElementById(e).checked !== true;
    }

    function deshabilita() {
        document.getElementById('proximo').disabled = true;
        document.getElementById('booleana').checked = false;
    }
</script>
</html>
