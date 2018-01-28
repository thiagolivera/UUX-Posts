<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Nova avaliação</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="../../plugins/iCheck/all.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/skin-blue.min.css">
  
    <link rel="stylesheet" href="dist/bootstrap-tagsinput.css">
    <link rel="stylesheet" href="assets/app.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.2.20/angular.min.js"></script>
    <script src="dist/bootstrap-tagsinput.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/rainbow.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/generic.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/html.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/rainbow/1.2.0/js/language/javascript.js"></script>
  
	<!-- jQuery 3 -->
	<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck 1.0.1 -->
        <script src="../../plugins/iCheck/icheck.min.js"></script>
	<!-- FastClick -->
	<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../../dist/js/adminlte.min.js"></script>
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
          <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Avaliações</li><li class="active">Criar uma nova avaliação</li>
      </ol>
    </section>

    <section class="content">
        <div class="col-md-12 col-sm-12 col-xs-12" style=" padding-left: 0;">
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Criar uma nova avaliação</h3>
            </div>
              <br><label style="color: #ff0000; padding-left: 20px;">* Campos obrigatórios</label>
            <div class="box-body">
                <form class="form-horizontal">
              <div class="box-body">
                <div class="form-group">
                  <label for="nome" class="col-sm-2 control-label">Sistema avaliado <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" placeholder="Ex.: Google Maps">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="plataforma" class="col-sm-2 control-label">Plataforma do sistema <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                    <select class="form-control col-sm-10">
                        <option>Android</option>
                        <option>iOS</option>
                        <option>Web</option>
                        <option>Windows</option>
                    </select>
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="nome" class="col-sm-2 control-label">Fonte das postagens <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="nome" placeholder="Ex.: Twitter">
                  </div>
                </div>
                  
                <div class="form-group">
                    <label for="funcionalidades" class="col-sm-2 control-label">Funcionalidades</label>

                    <div class="col-sm-10">
                        <input type="text" placeholder="Ex.: Cálculo de rotas" data-role="tagsinput" />
                    </div>
                </div>
                  
                <div class="form-group">
                    <label for="tipoUsuario" class="col-sm-2 control-label">Objetivos de avaliação <a style="color: #ff0000">*</a></label>

                    <div class="col-sm-10">
                        <textarea type="text" class="form-control" id="nome" placeholder="Ex.: Identificar problemas na interação e na interface"></textarea>
                  </div>
                </div>
                  
                <div class="form-group">
                    <label for="tipoUsuario" class="col-sm-2 control-label">Categorias de classificação<a style="color: #ff0000">*</a></label>

                    <div class="col-sm-10">
                        <label style="font-weight: 500;">
                          <input type="checkbox" class="minimal">
                          Classificação por funcionalidade
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                          <input type="checkbox" class="minimal">
                          Classificação por tipo
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                          <input type="checkbox" class="minimal">
                          Classificação por intenção
                        </label >
                        <br>
                        <label style="font-weight: 500;">
                          <input type="checkbox" class="minimal">
                          Classificação por análise de sentimentos
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" id="criteriosQualidade" onclick="showCriterios()" class="minimal">
                          Classificação por critérios de qualidade de uso
                        </label>
                        <br>
                        <div id="criterios" style="display:none;">
                            <label style="font-weight: 300; padding-left:2em;">
                                <input type="checkbox" class="minimal">
                                Acessibilidade
                            </label>
                            <br>
                            
                            <label style="font-weight: 300; padding-left:2em;">
                                <input type="checkbox" class="minimal">
                                Comunicabilidade
                            </label>
                            <br>
                            
                            <label style="font-weight: 300; padding-left:2em;">
                                <input type="checkbox" class="minimal">
                                Experiência do usuário
                            </label>
                            <br>
                        
                            <label style="font-weight: 300; padding-left:2em;">
                                <input type="checkbox" class="minimal">
                                Usabilidade
                            </label>
                            <br>
                        </div>

                        <label style="font-weight: 500;">
                          <input type="checkbox" class="minimal">
                          Classificação por artefato
                        </label>
                        <br>
                        
                    </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Criar avaliação</button>
              </div>
              <!-- /.box-footer -->
            </form>
            </div>
          </div>
      </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>
    <?php include_once("../../rodape.php");?>
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
    })
    
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass   : 'iradio_minimal-blue'
    })
    </script>
    
    <script>
        function showCriterios() {
            if (!document.getElementById('criteriosQualidade').checked){
                document.getElementById('criterios').style.display = 'block';
            } else {
                document.getElementById('criterios').style.display = 'none';
            }
        }
    </script>

</html>