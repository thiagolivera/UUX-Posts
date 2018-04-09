<link rel="manifest" href="manifest.json">
<script> 
if ('serviceWorker' in navigator) {
	navigator.serviceWorker.register('sw.js')
}
</script>

<?php
include './verificarSessao.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/skin-blue.min.css">

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
              <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          </ol>
        </section>
        
        <section class="content">
            <div class="row">
                <div class="col-lg-3 col-xs-6" id="btn-perfil">
                    <div class="small-box bg-aqua">
                        <div class="inner">
                            <h3 style="font-size: 30px">Perfil</h3>
                            <p>Editar perfil</p>
                        </div>
                        
                        <div class="icon">
                            <i class="fa fa-edit" style="padding-top: 15px"></i>
                        </div>
                        
                        <a href="editarPerfil.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-xs-6" id="btn-nv">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 style="font-size: 30px">Avaliações</h3>
                            <p>Nova avaliação</p>
                         </div>

                        <div class="icon">
                            <i class="fa fa-plus" style="padding-top: 15px"></i>
                        </div>

                        <a href="avaliacoes/novaAvaliacao/introetapa1.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-xs-6" id="btn-avAndamento">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 style="font-size: 30px">Avaliações</h3>
                            <p>Avaliações em andamento</p>
                         </div>

                        <div class="icon">
                            <i class="fa fa-spinner" style="padding-top: 15px"></i>
                        </div>

                        <a href="avaliacoes/avaliacoesAndamento.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-xs-6" id="btn-avConcluido">
                    <div class="small-box bg-green">
                        <div class="inner">
                            <h3 style="font-size: 30px">Avaliações</h3>
                            <p>Avaliações concluídas</p>
                         </div>

                        <div class="icon">
                            <i class="fa fa-check" style="padding-top: 15px"></i>
                        </div>

                        <a href="avaliacoes/avaliacoesConcluidas.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-xs-6" id="btn-favoritas">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3 style="font-size: 30px">Postagens</h3>
                            <p>Postagens favoritas</p>
                         </div>

                        <div class="icon">
                            <i class="fa fa-star" style="padding-top: 15px"></i>
                        </div>

                        <a href="avaliacoes/postagensFavoritas.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-xs-6" id="btn-duvidas">
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3 style="font-size: 30px">Postagens</h3>
                            <p>Postagens com dúvidas</p>
                         </div>

                        <div class="icon">
                            <i class="fa fa-question" style="padding-top: 15px"></i>
                        </div>

                        <a href="avaliacoes/postagensComDuvida.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <?php
                if($_SESSION['isAdmin'] == 1){
                    ?>
                <div class="col-lg-3 col-xs-6" id="btn-cadastrar">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3 style="font-size: 30px">Usuários</h3>
                            <p>Cadastrar usuário</p>
                         </div>

                        <div class="icon">
                            <i class="fa fa-user-plus" style="padding-top: 15px"></i>
                        </div>

                        <a href="administracao/cadastrarUsuario.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <div class="col-lg-3 col-xs-6" id="btn-gerenciar">
                    <div class="small-box bg-red">
                        <div class="inner">
                            <h3 style="font-size: 30px">Usuários</h3>
                            <p>Gerenciar usuários</p>
                         </div>

                        <div class="icon">
                            <i class="fa fa-users" style="padding-top: 15px"></i>
                        </div>

                        <a href="administracao/gerenciarUsuarios.php" class="small-box-footer">
                            Abrir <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                
                <?php
                }
                
                ?>
            </div>
        </section>
  </div>

  <?php include_once("rodape.php") ?>

</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>

<style>
    .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-xs-1, .col-xs-10, .col-xs-11, .col-xs-12, .col-xs-2, .col-xs-3, .col-xs-4, .col-xs-5, .col-xs-6, .col-xs-7, .col-xs-8, .col-xs-9 {
    position: relative;
    min-height: 1px;
    padding-right: 10px;
}
</style>

<script>
$('#btn-perfil').click(function(){
  window.location = "editarPerfil.php";
});
$('#btn-nv').click(function(){
  window.location = "avaliacoes/novaAvaliacao/introetapa1.php";
});
$('#btn-avAndamento').click(function(){
  window.location = "avaliacoes/avaliacoesAndamento.php";
});
$('#btn-avConcluido').click(function(){
  window.location = "avaliacoes/avaliacoesConcluidas.php";
});
$('#btn-favoritas').click(function(){
  window.location = "avaliacoes/postagensFavoritas.php";
});
$('#btn-duvidas').click(function(){
  window.location = "avaliacoes/postagensComDuvida.php";
});
$('#btn-cadastrar').click(function(){
  window.location = "administracao/cadastrarUsuario.php";
});
$('#btn-gerenciar').click(function(){
  window.location = "administracao/gerenciarUsuarios.php";
});
</script>
</html>
