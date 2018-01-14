<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Postagens com dúvidas</title>
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
  <?php include("./cabecalho.php");?>
  <?php include("./slidebar.php");?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        UUX-Posts
        <small>Versão 2.0</small>
      </h1>
      <ol class="breadcrumb">
          <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
          <li>Postagens</li> <li class="active">Postagens com dúvidas</li>
      </ol>
    </section>

    <section class="content">
        <div class="col-md-6">
              <!-- Box Comment -->
              <div class="box box-widget">
                <div class="box-header with-border">
                  <div class="user-block">
                      <img class="img-circle" src="./dist/img/avatar04.png" alt="User Image">
                    <span class="username"><a href="#">Jeferson Juliani</a></span>
                    <span class="description">Publicado em 14 jan 2018</span>
                  </div>
                  <!-- /.user-block -->
                  <div class="box-tools">
                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Marcar como resolvido">
                      <i class="fa fa-circle-o"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                  <!-- /.box-tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- post text -->
                  <p>Estou com dúvida nessa postagem, pois o usuário diz que o aplicativo é ótimo, mas nem tanto. Como classifico isso?</p>

                  <!-- Attachment -->
                  <div class="attachment-block clearfix">
                    <div class="attachment">
                      <h4 class="attachment-heading"><a>Spotify - ReclameAqui</a></h4>

                      <div class="attachment-text">
                          <b>Postagem:</b> Adorei esse aplicativo é ótimo, mas estou tendo muito problema com ele.<br>
                          <b>Class. por tipo:</b> Crítica <br>
                          <b>Class. por análise de sentimentos:</b> negativa <br>
                          <b>Class. por facetas de usabilidade:</b> <br>
                          <b>Class. por facetas de UX:</b> <br>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="box-footer box-comments">
                  <div class="box-comment">
                    <img class="img-circle img-sm" src="./dist/img/user7-128x128.jpg" alt="Imagem do usuário">

                    <div class="comment-text">
                          <span class="username">
                            Lavínia Matoso
                          </span><!-- /.username -->
                      Vixe... não faço ideia. Que tal quebrar a postagem em mais sentenças?
                    </div>
                  </div>
                </div>
                <!-- /.box-footer -->
                <div class="box-footer">
                  <form action="#" method="post">
                      <img class="img-responsive img-circle img-sm" src="./dist/img/avatar5.png" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                      <input type="text" class="form-control input-sm" placeholder="Pressione enter para postar um comentário">
                    </div>
                  </form>
                </div>
                <!-- /.box-footer -->
              </div>
              <!-- /.box -->
            </div>
        </section>
  </div>

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Versão</b> 2.0.0
    </div>
    <strong>UUX-Posts - Uma ferramenta para extração e classificação de PRUs de Sistemas Sociais</strong>
  </footer>

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
</html>
