<?php
    include_once '../verificarSessao.class';
    include_once './contextoAvaliacaoControle.php';

    $idAvalicao = $_SESSION['idAvaliacaoCriada'];
    unset( $_SESSION['idAvaliacao'] );
    $controleContextoAvaliacao = new ContextoAvaliacaoControle();
    
    if(!$controleContextoAvaliacao->isGerente($idAvalicao, $_SESSION['login'])){
        header("location:erro.php");
    }
    
    $avaliacaoAtual = $controleContextoAvaliacao->obterAvaliacao($idAvalicao);
    $contextoAtual = $controleContextoAvaliacao->obterContexto($idAvalicao);

    if(isset($_POST["ambFisico"]) || isset($_POST["ambSocial"]) || isset($_POST["ambCultural"]) || isset($_POST["faixaEtaria"])
            || isset($_POST["sexo"]) || isset($_POST["formacao"]) || isset($_POST["tempoUso"]) || isset($_POST["experiencia"])){
        $contextoAvaliacao = new ContextoAvaliacao();
        if(isset($_POST["ambFisico"])){
            $contextoAvaliacao->ambFisico = $_POST["ambFisico"];
        }
        if(isset($_POST["ambSocial"])){
            $contextoAvaliacao->ambSocial = $_POST["ambSocial"];
        }
        if(isset($_POST["ambCultural"])){
            $contextoAvaliacao->ambCultural = $_POST["ambCultural"];
        }
        if(isset($_POST["faixaEtaria"])){
            $contextoAvaliacao->faixaEtaria = $_POST["faixaEtaria"];
        }
        if(isset($_POST["sexo"])){
            $contextoAvaliacao->sexo = $_POST["sexo"];
        }
        if(isset($_POST["formacao"])){
            $contextoAvaliacao->formacao = $_POST["formacao"];
        }
        if(isset($_POST["tempoUso"])){
            $contextoAvaliacao->tempoUso = $_POST["tempoUso"];
        }
        if(isset($_POST["experiencia"])){
            $contextoAvaliacao->experiencia = $_POST["experiencia"];
        }

        $controleContextoAvaliacao->definirContexto($contextoAvaliacao, $idAvalicao);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Contexto de avaliação</title>
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
  <!-- Theme style -->
  <link rel="stylesheet" href="../../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../../dist/css/skins/skin-blue.min.css">
  
    <link rel="stylesheet" href="../../../dist/bootstrap-tagsinput.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="../../../dist/bootstrap-tagsinput.min.js"></script>
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
    
    <script>
        $(document).ready(function() {
            $('.js-example-basic-single').select2({
                placeholder: 'Selecione',
                minimumResultsForSearch: Infinity
            })
        })
    </script>
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
          <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Contexto de avaliação</li>
      </ol>
    </section>

    <section class="content">
        <?php include_once("../avaliacaoEmAndamento.php");?>
        <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
            <div class="box box-default">

                <div class="box-header with-border">
                  <h3 class="box-title">Informe o contexto da avaliação (opcional)</h3>
                </div>

                <div class="box-body">
                    <form class="form-horizontal" id="contextoUso" method="POST" action="contextoAvaliacao.php" style="padding-right: 10px; padding-left: 10px">
                        <div class="form-group">
                            <label for="fisico" class="col-sm-2 control-label">Ambiente físico</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="ambFisico" id="fisico" placeholder="Ex.: Os usuários usam o aplicativo em casa"><?php echo $contextoAtual[1]; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="social" class="col-sm-2 control-label">Ambiente social</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="ambSocial" id="social" placeholder="Ex.: Os usuários usam o aplicativo em casa"><?php echo $contextoAtual[2]; ?></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                          <label for="cultural" class="col-sm-2 control-label">Ambiente cultural</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="ambCultural" id="cultural" placeholder="Ex.: Os usuários usam o aplicativo em casa"><?php echo $contextoAtual[3]; ?></textarea>
                          </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="faixaEtaria" class="col-sm-2 control-label">Faixa etária</label>
                            <div class="col-sm-10">
                                <select class="js-example-basic-single" id="faixaEtaria" name="faixaEtaria" style="width: 100%">
                                    <option></option>
                                    <?php if(strcmp($contextoAtual[4], '0 - 10 anos') == 0){
                                        ?> <option selected="true">0 - 10 anos</option> <?php
                                    } else{
                                        ?> <option>0 - 10 anos</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[4], '11 - 20 anos') == 0){
                                        ?> <option selected="true">11 - 20 anos</option> <?php
                                    } else{
                                        ?> <option>11 - 20 anos</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[4], '21 - 30 anos') == 0){
                                        ?> <option selected="true">21 - 30 anos</option> <?php
                                    } else{
                                        ?> <option>21 - 30 anos</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[4], '31 - 40 anos') == 0){
                                        ?> <option selected="true">31 - 40 anos</option> <?php
                                    } else{
                                        ?> <option>31 - 40 anos</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[4], '41 - 50 anos') == 0){
                                        ?> <option selected="true">41 - 50 anos</option> <?php
                                    } else{
                                        ?> <option>41 - 50 anos</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[4], '51 - 60 anos') == 0){
                                        ?> <option selected="true">51 - 60 anos</option> <?php
                                    } else{
                                        ?> <option>51 - 60 anos</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[4], 'Acima de 60 anos') == 0){
                                        ?> <option selected="true">Acima de 60 anos</option> <?php
                                    } else{
                                        ?> <option>Acima de 60 anos</option> <?php
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="sexo" class="col-sm-2 control-label">Sexo</label>
                            <div class="col-sm-10">
                                <select class="js-example-basic-single" id="sexo" name="sexo" style="width: 100%">
                                    <option></option>
                                    <?php if(strcmp($contextoAtual[5], 'Feminino') == 0){
                                        ?> <option selected="true">Feminino</option> <?php
                                    } else{
                                        ?> <option>Feminino</option> <?php
                                    } ?>
                                        <?php if(strcmp($contextoAtual[5], 'Masculino') == 0){
                                        ?> <option selected="true">Masculino</option> <?php
                                    } else{
                                        ?> <option>Masculino</option> <?php
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="formacao" class="col-sm-2 control-label">Formação acadêmica</label>
                            <div class="col-sm-10">
                                <select class="js-example-basic-single" id="formacao" name="formacao" style="width: 100%">
                                    <option></option>
                                    <?php if(strcmp($contextoAtual[6], 'Analfabeto') == 0){
                                        ?> <option selected="true">Analfabeto</option> <?php
                                    } else{
                                        ?> <option>Analfabeto</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[6], 'Ensino Fundamental Incompleto') == 0){
                                        ?> <option selected="true">Ensino Fundamental Incompleto</option> <?php
                                    } else{
                                        ?> <option>Ensino Fundamental Incompleto</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[6], 'Ensino Fundamental Completo') == 0){
                                        ?> <option selected="true">Ensino Fundamental Completo</option> <?php
                                    } else{
                                        ?> <option>Ensino Fundamental Completo</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[6], 'Ensino Médio Incompleto') == 0){
                                        ?> <option selected="true">Ensino Médio Incompleto</option> <?php
                                    } else{
                                        ?> <option>Ensino Médio Incompleto</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[6], 'Ensino Médio Completo') == 0){
                                        ?> <option selected="true">Ensino Médio Completo</option> <?php
                                    } else{
                                        ?> <option>Ensino Médio Completo</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[6], 'Ensino Superior Incompleto') == 0){
                                        ?> <option selected="true">Ensino Superior Incompleto</option> <?php
                                    } else{
                                        ?> <option>Ensino Superior Incompleto</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[6], 'Ensino Superior Completo') == 0){
                                        ?> <option selected="true">Ensino Superior Completo</option> <?php
                                    } else{
                                        ?> <option>Ensino Superior Completo</option> <?php
                                    } ?>
                                    <?php if(strcmp($contextoAtual[6], 'Pós-graduação') == 0){
                                        ?> <option selected="true">Pós-graduação</option> <?php
                                    } else{
                                        ?> <option>Pós-graduação</option> <?php
                                    } ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="tempoUso" class="col-sm-2 control-label">Tempo de uso do sistema</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="tempoUso" id="tempoUso" value="<?php echo $contextoAtual[7]; ?>" placeholder="Ex.: 2 anos">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="experiencia" class="col-sm-2 control-label">Experiência tecnológica</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="experiencia" id="experiencia" value="<?php echo $contextoAtual[8]; ?>" placeholder="Ex.: Usa com frequência">
                            </div>
                        </div>
                        
                        <div class="col-sm-3" id="btnVoltar" style="float: left; padding-bottom: 10px; padding-top: 20px">
                            <button class="btn btn-info" onclick="voltar()" type="button" style="margin-right: 10px;">Voltar</button>
                        </div>

                        <div style="float: right; padding-bottom: 10px; padding-top: 20px">
                            <button class="btn btn-info" type="submit" style="margin-right: 10px;">Salvar e próximo</button>
                        </div>
                    </form>
                </div>
            </div>
      </div>
        <a style="color: #ecf0f5">'</a>
    </section>
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
</style>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
        ga('create', 'UA-42755476-1', 'bootstrap-tagsinput.github.io');
        ga('send', 'pageview');

        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
          checkboxClass: 'icheckbox_flat-blue',
          radioClass   : 'iradio_flat-blue'
        });

        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        });

        function voltar(){
            history.back();
        }
    </script>

</html>