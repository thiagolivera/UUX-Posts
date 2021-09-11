<?php
include './verificarSessao.php';
include './perfilControle.php';
$perfil = new Perfil();
$perfilAtual = $perfil->obterPerfil($_SESSION['login']);

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['profissao'])) {
   $perfil->alterarPerfil($_POST['nome'], $_POST['email'], $_POST['profissao'], $_SESSION['login']);
}

if (isset($_POST['senhaAtual']) && isset($_POST['novaSenha']) && isset($_POST['novaSenha2'])) {
    if((strlen($_POST['senhaAtual']) >= 8) && (strlen($_POST['novaSenha']) >= 8) && (strlen($_POST['novaSenha2']) >= 8)){
        if(strcmp($_POST['novaSenha'], $_POST['novaSenha2']) == 0){
            $perfil->alterarSenha($_POST['senhaAtual'], $_POST['novaSenha'], $_SESSION['login']);
        } else{
            ?>
            <script type='text/javascript'>
                alert('Ops, as senhas não conferem. Verifique e tente novamente');
            </script>
            <?php
        }
    } else{
        ?>
        <script type='text/javascript'>
            alert('Você deve digitar uma senha com 8 ou mais caracteres. Tente novamente.');
        </script>
        <?php
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>UUX-Posts | Editar perfil</title>
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
  
  <link rel="shortcut icon" href="images/uux-icon.ico" type="image/x-icon">
  <link rel="icon" href="images/uux-icon.ico" type="image/x-icon">
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
        <li class="active">Editar perfil</li>
      </ol>
    </section>

    <section class="content">
        <div class="alert alert-success alert-dismissible" id="alertaSucesso" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Dados alterados com sucesso!</h4>
            As alterações foram salvas em nossa base de dados com sucesso.
        </div>
        
        <div class="alert alert-error alert-dismissible" id="alertaErro" style="display: none">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Houve um problema ao salvar os dados!</h4>
            Verificamos em nosso sistema e a senha atual digitada não confere. Verifique e tente novamente.
        </div>
        
        <div class="col-md-6">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Editar perfil</h3>
            </div>
              <form class="form-horizontal" action="editarPerfil.php" method="post">
              <div class="box-body">
                <div class="form-group">
                  <label for="nome" class="col-sm-2 control-label">Nome</label>

                  <div class="col-sm-10">
                      <input type="text" class="form-control" required="" name="nome" id="nome" placeholder="Nome" value="<?php echo $perfilAtual[1];?>">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">E-mail</label>

                  <div class="col-sm-10">
                      <input type="email" class="form-control" required="" name="email" id="email" placeholder="Email" value="<?php echo $perfilAtual[3];?>">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="profissao" class="col-sm-2 control-label">Profissão</label>

                  <div class="col-sm-10">
                      <input type="text" required="" class="form-control" name="profissao" id="profissao" placeholder="Profissão" value="<?php echo $perfilAtual[2];?>">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Salvar alterações</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
      <div class="col-md-6">
          <div class="box box-body">
            <div class="box-header with-border">
              <h3 class="box-title">Alterar senha</h3>
            </div>
              <form class="form-horizontal" method="post" action="editarPerfil.php">
              <div class="box-body">
                <div class="form-group">
                  <label for="senhaAtual" class="col-sm-2 control-label">Senha atual</label>

                  <div class="col-sm-10">
                      <input type="password" class="form-control" name="senhaAtual" id="senhaAtual" placeholder="Senha atual">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="novaSenha" class="col-sm-2 control-label">Nova senha</label>

                  <div class="col-sm-10">
                      <input type="password" class="form-control" name="novaSenha" id="novaSenha" placeholder="Mínimo de 8 caracteres">
                  </div>
                </div>
                  
                <div class="form-group">
                  <label for="confirmaSenha" class="col-sm-2 control-label">Confirme a nova senha</label>

                  <div class="col-sm-10">
                      <input type="password" class="form-control" name="novaSenha2" id="confirmaSenha" placeholder="Mínimo de 8 caracteres">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Alterar senha</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
      </div>
        <a style="color: #ecf0f5">'</a>
    </section>
  </div>

  <?php include("./rodape.php");?>

</div>

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>

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
?>
</body>
</html>
