<?php
include '../../../verificarSessao.class';
include './validacaoControle.php';
//falta verificar se o usuário logado tem permissões para acessar essa página

$idAvalicao = $_SESSION['idAvaliacao'];

$controle = new ValidacaoControle();
$avaliacaoAtual = $controle->obterAvaliacao($idAvalicao);
$categoriasClassificacao = $controle->obterCategoriasAvaliacao($idAvalicao);
$classificacoes = $controle->obterPostagensNaoValidadas($idAvalicao);
$postagem = $controle->obterPostagem($classificacoes[0][0]["idPostagem"]);

if(isset($_POST["classPRU"])){
    
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>UUX-Posts | Validação da classificação</title>
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
                          <h3 class="box-title">Validação da classificação de Postagens</h3>
                        </div>
                        <div class="box-body" style="padding-left: 25px; padding-right: 35px">
                            <div class="box box-body center-block" style="width: 95%; font-size: 16px">
                                <div style="float: left;">
                                    <p>Postagem <?php echo $postagem[0]["idPostagem"]; ?></p>
                                </div>
                                <br><br>
                                <p style="text-align: center; font-style: italic">"<?php echo $postagem[0]["postagem"]; ?>"</p>
                                <div style="float: right;">
                                    <p><?php echo $postagem[0]["data"]; ?></p>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <div class="table">
                                    <table class="table table-hover no-margin">
                                        <tbody>
                                                <?php 
                                                for($i=0; $i < count($classificacoes[0]); $i++){
                                                    ?>
                                                    <tr>
                                                        <td rowspan="2" style="justify-content: center;">
                                                            Classificação <?php echo $i + 1; ?>
                                                        </td>
                                                        <td style="width: 21.25%">
                                                            <select disabled name="classPRU<?php echo $i;?>" class="form-control" style="width: 156px">
                                                                <?php if($classificacoes[0][$i]["classPRU"] == 1){
                                                                    ?><option selected>PRU</option>
                                                                      <option>Não-PRU</option><?php
                                                                } else{
                                                                    ?><option>PRU</option>
                                                                      <option selected>Não-PRU</option><?php
                                                                } ?>
                                                            </select>
                                                        </td>
                                                        <?php 
                                                        if(strcmp($categoriasClassificacao[0]["funcionalidade"], '1') == '0'){
                                                            ?>
                                                            <td style="width: 21.25%">
                                                                <input disabled name="classFuncionalidade<?php echo $i;?>" type="text" style="width: 156px" class="form-control" id="funcionalidade" name="funcionalidade" value="<?php echo $classificacoes[0][$i]["classFuncionalidade"]; ?>">
                                                            </td>
                                                        <?php
                                                        }
                                                        if(strcmp($categoriasClassificacao[0]["tipo"], '1') == '0'){
                                                            ?>
                                                            <td style="width: 21.25%">
                                                                <select disabled name="classTipo<?php echo $i;?>[]" style="width: 156px" class="form-control select2" multiple="multiple" data-placeholder="Tipo de PRU" style="width: 100%;">
                                                                    <?php if($classificacoes[0][$i]["critica"] == 1){
                                                                        ?><option selected>Crítica</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["elogio"] == 1){
                                                                        ?><option selected>Elogio</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["duvida"] == 1){
                                                                        ?><option selected>Dúvida</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["comparacao"] == 1){
                                                                        ?><option selected>Comparação</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["sugestao"] == 1){
                                                                        ?><option selected>Sugestão</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["ajuda"] == 1){
                                                                        ?><option selected>Ajuda</option><?php
                                                                    } ?>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["intencao"], '1') == '0'){
                                                            ?>
                                                            <td style="width: 21.25%">
                                                                <select disabled name="classIntencao<?php echo $i;?>" id="intencao" style="width: 156px" class="form-control select2" multiple="multiple" data-placeholder="Intenção" style="width: 100%;">
                                                                    <?php if(strcmp($classificacoes[0][$i]["classIntencao"], "Visceral") == '0'){
                                                                        ?><option selected>Visceral</option><?php
                                                                    }?>
                                                                    <?php if(strcmp($classificacoes[0][$i]["classIntencao"], "Comportamental") == 0){
                                                                        ?><option selected>Comportamental</option><?php
                                                                    }?>
                                                                    <?php if(strcmp($classificacoes[0][$i]["classIntencao"], "Reflexiva") == 0){
                                                                        ?><option selected>Reflexiva</option><?php
                                                                    }?>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        if(strcmp($categoriasClassificacao[0]["analiseSentimentos"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <select disabled name="classSentimento<?php echo $i;?>" id="sentimento" class="form-control select2" multiple="multiple" data-placeholder="Sentimento" style="width: 156px">
                                                                    <?php if(strcmp($classificacoes[0][$i]["classAnaliseSentimentos"], "Positiva") == '0'){
                                                                        ?><option selected>Positiva</option><?php
                                                                    }?>
                                                                    <?php if(strcmp($classificacoes[0][$i]["classAnaliseSentimentos"], "Negativa") == '0'){
                                                                        ?><option selected>Negativa</option><?php
                                                                    }?>
                                                                    <?php if(strcmp($classificacoes[0][$i]["classAnaliseSentimentos"], "Neutra") == '0'){
                                                                        ?><option selected>Neutra</option><?php
                                                                    }?>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["usabilidade"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <select disabled name="classUsabilidade<?php echo $i;?>[]" class="form-control select2" multiple="multiple" style="width: 156px">
                                                                    <?php if($classificacoes[0][$i]["eficacia"] == 1){
                                                                        ?><option selected>Eficácia</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["eficiencia"] == 1){
                                                                        ?><option selected>Eficiencia</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["satisfacaoUs"] == 1){
                                                                        ?><option selected>Satisfação</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["seguranca"] == 1){
                                                                        ?><option selected>Segurança</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["utilidade"] == 1){
                                                                        ?><option selected>Utilidade</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["memorabilidade"] == 1){
                                                                        ?><option selected>Memorabilidade</option><?php
                                                                    } ?>
                                                                    <?php if($classificacoes[0][$i]["aprendizado"] == 1){
                                                                        ?><option selected>Aprendizado</option><?php
                                                                    }?>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["ux"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <select disabled name="classUX<?php echo $i;?>[]" class="form-control select2" multiple="multiple" data-placeholder="Facetas UX" style="width: 156px">
                                                                    <?php if($classificacoes[0][$i]["afeto"] == 1){
                                                                        ?><option selected>Afeto</option><?php
                                                                    }?>
                                                                    <?php if($classificacoes[0][$i]["estetica"] == 1){
                                                                        ?><option selected>Estética</option><?php
                                                                    }?>
                                                                    <?php if($classificacoes[0][$i]["frustracao"] == 1){
                                                                        ?><option selected>Frustração</option><?php
                                                                    }?>
                                                                    <?php if($classificacoes[0][$i]["satisfacao"] == 1){
                                                                        ?><option selected>Satisfação</option><?php
                                                                    }?>
                                                                    <?php if($classificacoes[0][$i]["motivacao"] == 1){
                                                                        ?><option selected>Motivação</option><?php
                                                                    }?>
                                                                    <?php if($classificacoes[0][$i]["suporte"] == 1){
                                                                        ?><option selected>Suporte</option><?php
                                                                    }?>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["artefato"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <input disabled style="width: 156px" type="text" class="form-control" id="artefato" name="classArtefato<?php echo $classificacoes[0][$i]["classArtefato"];?>" value="<?php ?>">
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <?php
                                                } ?>
                                                
                                                <form method="POST" action="../porConjuntoControle.php">
                                                    <?php $i = 0; ?>
                                                    <input type="hidden" name="idAvaliacao" value="<?php echo $idAvalicao;?>">
                                                    <input type="hidden" name="idPostagem<?php echo $i;?>" value="<?php echo $postagem[0]["idPostagem"]; ?>">
                                                    <input type="hidden" name="numPostagens" value="1">
                                                    <input type="hidden" name="isValidacao<?php echo $i;?>" value="true">
                                                    <input type="hidden" name="validacao" value="true">
                                                    
                                                    <tr>
                                                        <td rowspan="2" style="justify-content: center;">
                                                            Classificação Final
                                                        </td>
                                                        <td style="width: 21.25%">
                                                            <select required="" name="classPRU<?php echo $i;?>" class="form-control" style="width: 156px">
                                                                <option selected>PRU</option>
                                                                <option>Não-PRU</option>
                                                            </select>
                                                        </td>
                                                        <?php 
                                                        if(strcmp($categoriasClassificacao[0]["funcionalidade"], '1') == '0'){
                                                            ?>
                                                            <td style="width: 21.25%">
                                                                <input name="classFuncionalidade<?php echo $i;?>" type="text" style="width: 156px" class="form-control" id="funcionalidade" name="funcionalidade" placeholder="Funcionalidade">
                                                            </td>
                                                        <?php
                                                        }
                                                        if(strcmp($categoriasClassificacao[0]["tipo"], '1') == '0'){
                                                            ?>
                                                            <td style="width: 21.25%">
                                                                <select required name="classTipo<?php echo $i;?>[]" style="width: 156px" class="form-control select2" multiple="multiple" data-placeholder="Tipo de PRU" style="width: 100%;">
                                                                    <option>Crítica</option>
                                                                    <option>Elogio</option>
                                                                    <option>Dúvida</option>
                                                                    <option>Comparação</option>
                                                                    <option>Sugestão</option>
                                                                    <option>Ajuda</option>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["intencao"], '1') == '0'){
                                                            ?>
                                                            <td style="width: 21.25%">
                                                                <select required name="classIntencao<?php echo $i;?>" id="intencao" style="width: 156px" class="form-control select2" multiple="multiple" data-placeholder="Intenção" style="width: 100%;">
                                                                    <option>Visceral</option>
                                                                    <option>Comportamental</option>
                                                                    <option>Reflexiva</option>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                                    <tr>
                                                        <?php
                                                        if(strcmp($categoriasClassificacao[0]["analiseSentimentos"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <select required name="classSentimento<?php echo $i;?>" id="sentimento" class="form-control select2" multiple="multiple" data-placeholder="Sentimento" style="width: 156px">
                                                                    <option>Positiva</option>
                                                                    <option>Negativa</option>
                                                                    <option>Neutra</option>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["usabilidade"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <select name="classUsabilidade<?php echo $i;?>[]" class="form-control select2" multiple="multiple" data-placeholder="Facetas Usabilidade" style="width: 156px">
                                                                    <option>Eficácia</option>
                                                                    <option>Eficiencia</option>
                                                                    <option>Satisfação</option>
                                                                    <option>Segurança</option>
                                                                    <option>Utilidade</option>
                                                                    <option>Memorabilidade</option>
                                                                    <option>Aprendizado</option>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["ux"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <select name="classUX<?php echo $i;?>[]" class="form-control select2" multiple="multiple" data-placeholder="Facetas UX" style="width: 156px">
                                                                    <option>Afeto</option>
                                                                    <option>Estética</option>
                                                                    <option>Frustração</option>
                                                                    <option>Satisfação</option>
                                                                    <option>Motivação</option>
                                                                    <option>Suporte</option>
                                                                </select>
                                                            </td>
                                                        <?php
                                                        } if(strcmp($categoriasClassificacao[0]["artefato"], '1') == '0'){
                                                            ?>
                                                            <td>
                                                                <input style="width: 156px" type="text" class="form-control" id="artefato" name="classArtefato<?php echo $i;?>" placeholder="Artefato">
                                                            </td>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
                            <button class="btn btn-info" onclick="voltar()" style="margin-right: 10px;">Voltar</button>
                    </div>
                    
                    <div class="col-sm-6" style="padding-bottom: 10px;">
                        <button class="btn btn-info" type="submit" style="float: right">Salvar e próximo</button>
                    </div>
                    </form>
                </div>
                <a style="color: #ecf0f5">'</a>
            </section>
        </div>
        <?php include_once("../../../../rodape.php");?>
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
    <script src="../../../../bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="../../../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- Select2 -->
    <script src="../../../../bower_components/select2/dist/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="../../../../plugins/input-mask/jquery.inputmask.js"></script>
    <script src="../../../../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="../../../../plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="../../../../bower_components/moment/min/moment.min.js"></script>
    <script src="../../../../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="../../../../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <!-- bootstrap color picker -->
    <script src="../../../../bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="../../../../plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- SlimScroll -->
    <script src="../../../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="../../../../plugins/iCheck/icheck.min.js"></script>
    <!-- FastClick -->
    <script src="../../../../bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="../../../../dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../../../../dist/js/demo.js"></script>
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