<?php
include '../../../verificarSessao.class';
include './validacaoControle.php';

$idAvalicao = $_SESSION['idAvaliacao'];

$controle = new ValidacaoControle();
$avaliacaoAtual = $controle->obterAvaliacao($idAvalicao);
$categoriasClassificacao = $controle->obterCategoriasAvaliacao($idAvalicao);

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UUX-Posts | Classificação de Postagens</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../../../../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../../../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../../../../bower_components/Ionicons/css/ionicons.min.css">
    <!-- daterange picker -->
    <link rel="stylesheet" href="../../../../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap datepicker -->
    <link rel="stylesheet" href="../../../../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    <link rel="stylesheet" href="../../../../plugins/iCheck/all.css">
    <!-- Bootstrap Color Picker -->
    <link rel="stylesheet" href="../../../../bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
    <!-- Bootstrap time Picker -->
    <link rel="stylesheet" href="../../../../plugins/timepicker/bootstrap-timepicker.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="../../../../bower_components/select2/dist/css/select2.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../../../../dist/css/skins/_all-skins.min.css">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
                    <li><a href="../../avaliacoesAndamento.php">Avaliações em andamento</a></li><li class="active">Classificação de Postagens</li>
                </ol>
            </section>

            <section class="content">
                <?php include_once("../../avaliacaoEmAndamento.php");?>
                <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                          <h3 class="box-title">Classificação de Postagens</h3>
                        </div>
                        <div class="box-body" style="padding-left: 25px; padding-right: 35px">
                            <?php
                                if(strcmp($_SESSION['modoVisualizacao'],"Por postagem") == 0){
                                    include("./porPostagem.php");
                                } else if(strcmp($_SESSION['modoVisualizacao'],"Por conjunto de postagens") == 0){
                                    include("./porConjunto.php");
                                }
                            ?>
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

    <!-- jQuery 3 -->
    <script src="../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="../../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../dist/js/demo.js"></script>
    <!-- Page script -->
    <script>
      $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()
        $("#intencao").select2({ maximumSelectionLength: 1 });
        $("#sentimento").select2({ maximumSelectionLength: 1 });

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
          {
            ranges   : {
              'Today'       : [moment(), moment()],
              'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
              'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
              'Last 30 Days': [moment().subtract(29, 'days'), moment()],
              'This Month'  : [moment().startOf('month'), moment().endOf('month')],
              'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            },
            startDate: moment().subtract(29, 'days'),
            endDate  : moment()
          },
          function (start, end) {
            $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
          }
        )

        //Date picker
        $('#datepicker').datepicker({
          autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
          checkboxClass: 'icheckbox_minimal-blue',
          radioClass   : 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
          checkboxClass: 'icheckbox_minimal-red',
          radioClass   : 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
          checkboxClass: 'icheckbox_flat-green',
          radioClass   : 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
          showInputs: false
        })
      })
    </script>

</html>




<div id="classificacaoPorFuncionalidade">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR FUNCIONALIDADE  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="col-sm-4">Postagem</th>
                    <th class="col-sm-1">Ação</th>
                    <th class="col-sm-6">Funcionalidade</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                        que abro e começo a ouvir uma música aparece um aviso de que o app está
                        apresentando falhas continuamente. Não consigo utilizar mais pelo 
                        celular sem me irritar."</p></td>
                    <td>
                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td>
                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td>
                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td>
                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td>
                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="col-sm-6" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div id="btnVoltar" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="voltar()" style="margin-left: 10px;">Voltar</button>
        </div>
        <div id="btnSalvar" style="float: right; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassTipo()" style="margin-right: 10px;">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorTipo" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR TIPO  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Ação</th>
                    <th>Crítica</th>
                    <th>Elogio</th>
                    <th>Dúvida</th>
                    <th>Comparação</th>
                    <th>Sugestão</th>
                    <th>Ajuda</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    
                    <td id="tipo"><input id="critica1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassFunc()" style="margin-right: 10px;">Voltar</button>
        </div>
        
        
        <div class="col-sm-3" style="padding-bottom: 10px; float: right">
            <button class="btn btn-info center-block" onclick="abrirClassIntencao()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorIntencao" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR INTENÇÃO  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Ação</th>
                    <th>Visceral</th>
                    <th>Comportamental</th>
                    <th>Reflexiva</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="visceral1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="visceral2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="visceral3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="visceral4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="visceral5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassTipo()" style="margin-right: 10px;">Voltar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px; float: right">
            <button class="btn btn-info center-block" onclick="abrirClassAnaliseSentimentos()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorAnaliseSentimentos" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR ANÁLISE DE SENTIMENTOS  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Ação</th>
                    <th>Positiva</th>
                    <th>Neutra</th>
                    <th>Negativa</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="positiva1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="positiva2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="positiva3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="positiva4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="positiva5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassIntencao()" style="margin-right: 10px;">Voltar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px; float: right">
            <button class="btn btn-info center-block" onclick="abrirClassUsabilidade()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorFacetasUsabilidade" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR CRITÉRIOS DE QUALIDADE DE USO (USABILIDADE)  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Ação</th>
                    <th>Eficácia</th>
                    <th>Eficiência</th>
                    <th>Satisfação</th>
                    <th>Segurança</th>
                    <th>Utilidade</th>
                    <th>Memorabilidade</th>
                    <th>Aprendizado</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="eficacia1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="eficacia2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="eficacia3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="eficacia4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="eficacia5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassAnaliseSentimentos()" style="margin-right: 10px;">Voltar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px; float: right">
            <button class="btn btn-info center-block" onclick="abrirClassUX()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorFacetasUX" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR CRITÉRIOS DE QUALIDADE DE USO (EXPERIÊNCIA DO USUÁRIO)  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Ação</th>
                    <th>Afeto</th>
                    <th>Estética</th>
                    <th>Frustração</th>
                    <th>Satisfação</th>
                    <th>Motivação</th>
                    <th>Suporte</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="afeto1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="afeto2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="afeto3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="afeto4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="tipo"><input id="afeto5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassUsabilidade()" style="margin-right: 10px;">Voltar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px; float: right">
            <button class="btn btn-info center-block" onclick="abrirClassArtefato()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorArtefato" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR ARTEFATO  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="col-sm-4">Postagem</th>
                    <th class="col-sm-4">Ação</th>
                    <th class="col-sm-4">Artefato</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                        que abro e começo a ouvir uma música aparece um aviso de que o app está
                        apresentando falhas continuamente. Não consigo utilizar mais pelo 
                        celular sem me irritar."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="post1-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="post2-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="post3-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="post4-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td>
                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-primary center-block"><i class="fa fa-star"></i></button>
                        </div>

                        <div class="" style="padding-bottom: 10px;">
                            <button class="btn btn-warning center-block"><i class="fa fa-question"></i></button>
                        </div>
                    </td>
                    <td id="post5-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassUX()" style="margin-right: 10px;">Voltar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px; float: right">
            <button class="btn btn-info center-block" onclick="proximo()">Salvar e próximo</button>
        </div>
    </div>
</div>

<script>
    function abrirClassFunc(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'block';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassTipo(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'block';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassIntencao(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'block';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassAnaliseSentimentos(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'block';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassUsabilidade(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'block';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassUX(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'block';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassArtefato(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'block';
    }
    
    function voltar(){
        window.location.href = "introEtapa3.php";
    }
</script>


<style>
    #tipo{
        vertical-align: middle;
    }
</style>