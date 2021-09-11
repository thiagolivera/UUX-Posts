<?php
include_once './verificarSessao.class';
include_once './publicacoesControle.php';
if($_SESSION['isAdmin'] == 1){
    $controle = new PublicacoesControle();
    
    if (isset($_POST['titulo']) && isset($_POST['autores']) && isset($_POST['ano']) && isset($_POST['tipo']) && isset($_POST['conferencia']) && isset($_POST['doi'])) {
        $publicacao = new Publicacao();
        $publicacao->titulo = $_POST['titulo'];
        $publicacao->autores = $_POST['autores'];
        $publicacao->ano = $_POST['ano'];
        $publicacao->tipo = $_POST['tipo'];
        $publicacao->conferencia = $_POST['conferencia'];
        $publicacao->doi = $_POST['doi'];
        
        if(isset($_POST["bibtex"])){
            $publicacao->bibtex = $_POST["bibtex"];
        } 
        
        $controle->cadastrarPublicacao($publicacao);
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Cadastrar publicação</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/skin-blue.min.css">
  
	<!-- jQuery 3 -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>
	<!-- Bootstrap 3.3.7 -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<!-- FastClick -->
	<script src="../bower_components/fastclick/lib/fastclick.js"></script>
	<!-- AdminLTE App -->
	<script src="../dist/js/adminlte.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  
  <link rel="shortcut icon" href="../images/uux-icon.ico" type="image/x-icon">
  <link rel="icon" href="../images/uux-icon.ico" type="image/x-icon">
</head>

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <?php include("cabecalho.php");?>
  <?php include("slidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UUX-Posts
        <small>Versão 2.0</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="../index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Usuários</li> <li class="active">Cadastrar publicação</li>
      </ol>
    </section>

    <section class="content">
        <div class="alert alert-success alert-dismissible" id="alertaSucesso" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Publicação cadastrada com sucesso!</h4>
            A publicação foi cadastrada com sucesso. Agora, ela está disponível na página da ferramenta.
        </div>
        
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Cadastrar publicação</h3>
            </div>
              <form class="form-horizontal" method="post" action="cadastrarPublicacao.php">
              <div class="box-body">
                <label style="color: #ff0000; padding-left: 20px;">* Campos obrigatórios</label> <br><br>
                <div class="form-group">
                  <label for="titulo" class="col-sm-2 control-label">Título <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="titulo" maxlength="200" id="titulo" autocomplete="off" required="required">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="autores" class="col-sm-2 control-label">Autores <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" name="autores" maxlength="800" id="autores" autocomplete="off" required="required">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="ano" class="col-sm-2 control-label">Ano de publicação <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                      <input type="number" class="form-control" name="ano" id="ano" autocomplete="off" required="required">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="tipo" class="col-sm-2 control-label">Tipo de publicação <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" maxlength="50" name="tipo" id="tipo" autocomplete="off" required="required">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="conferencia" class="col-sm-2 control-label">Conferência <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" maxlength="200" name="conferencia" id="conferencia" autocomplete="off" required="required">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="doi" class="col-sm-2 control-label">Link da publicação (ou DOI) <a style="color: #ff0000">*</a></label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" maxlength="800" name="doi" id="doi" autocomplete="off" required="required">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="bibtex" class="col-sm-2 control-label">Link do bibtex</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" maxlength="800" name="bibtex" id="bibtex" autocomplete="off">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Cadastrar publicação</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>

  <?php include("../rodape.php");?>

</div>
</body>

<?php
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
?>
</html>

<?php 
} ?>
