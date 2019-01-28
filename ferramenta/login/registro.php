<?php
session_start();
if (isset($_SESSION["login"])) {
    header("location:index.php");
}
include './loginControle.php';
$controle = new Usuarios();

$nome = '';
$profissao = '';
$email = '';

if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['profissao']) && isset($_POST['senha']) && isset($_POST['password'])) {
    if ((strlen($_POST['senha']) >= 8) && (strlen($_POST['password']) >= 8)) {
        if (strcmp($_POST['senha'], $_POST['password']) == 0) {
            if ($controle->isEmailCadastrado(strtolower($_POST['email'])) == FALSE) {
                $controle->registrarUsuario($_POST['nome'], strtolower($_POST['email']), $_POST['profissao'], $_POST['senha']);
            } else {
                $nome = $_POST['nome'];
                $profissao = $_POST['profissao'];
                $email = $_POST['email'];
                ?>
                <script type='text/javascript'>
                    alert('Ops, este e-mail já possui um cadastro na UUX-Posts. Verifique e tente novamente');
                </script>
                <?php
            }
        } else {
            $nome = $_POST['nome'];
            $profissao = $_POST['profissao'];
            $email = $_POST['email'];
            ?>
            <script type='text/javascript'>
                alert('Ops, as senhas não conferem. Verifique e tente novamente');
            </script>
            <?php
        }
    } else {
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
        <title>UUX-Posts | Registro</title>
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
        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <!-- iCheck -->
        <link rel="stylesheet" href="../plugins/iCheck/square/blue.css">

        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../plugins/iCheck/icheck.min.js"></script>

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

        <link rel="shortcut icon" href="../images/uux-icon.ico" type="image/x-icon">
        <link rel="icon" href="../images/uux-icon.ico" type="image/x-icon">
    </head>
    <body class="hold-transition login">
        <div class="login">
            <div class="container">
                <div class="col-md-6 col-md-offset-3">
                    <div class="inner-form">
                        <form role="form" action="registro.php" method="post">
                            <div class="row">
                                <div class="icon text-center col-md-12" style="padding-bottom: 20px">
                                    <a href="../index.html"><img id="logo" src="../images/uux-posts.svg" style="width: 100%;"></a>
                                </div>
                                <h3 class="text-center">Faça seu cadastro</h3>

                                <div class="col-md-12">
                                    <br>
                                    <label>Nome</label>
                                    <div class="form-group">
                                        <input type="text" maxlength="120" required="required" value="<?php echo $nome; ?>" name="nome" id="nome" class="form-control" placeholder="Ex.: Fulano da Silva">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Profissão</label>
                                    <div class="form-group">
                                        <input type="text" maxlength="120" required="required" value="<?php echo $profissao; ?>" name="profissao" id="profissao" class="form-control" placeholder="Ex.: Estudante">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>E-mail</label>
                                    <div class="form-group">
                                        <input type="email" maxlength="120" required="required" value="<?php echo $email; ?>" name="email" id="email" class="form-control" placeholder="Ex.: seuemail@uxabilidade.com">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Senha</label>
                                    <div class="form-group">
                                        <input type="password" minlength="8" required="required" name="senha" id="senha" class="form-control" placeholder="Mínimo 8 caracteres">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <label>Confirme a senha</label>
                                    <div class="form-group">
                                        <input type="password" minlength="8" required="required" name="password" id="password" class="form-control" placeholder="Mínimo 8 caracteres">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-default">
                                        <span>CADASTRAR</span>
                                    </button>
                                </div>

                                <div class="col-md-12">
                                    <div class="forgot">
                                        <a href="index.php"><p>Já possui cadastro? Entre</p></a>
                                    </div>

                                    <div class="forgot">
                                        <a href="esqueceuSenha.php"><p>Esqueceu sua senha?</p></a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>   
            </div>   
        </div>
        <style>
            @import url('https://fonts.googleapis.com/css?family=Josefin+Sans');
            .login{
                font-family: 'Josefin Sans', sans-serif;
                background: url("../images/arts-build-close-up-273230.jpg");
                background-size: cover;
                background-repeat: no-repeat;
            }

            h1{
                font-weight:600;
                font-family: 'Josefin Sans', sans-serif;
                text-transform:capitalize;
                text-align:center;
                color:#FFF;
            }

            .inner-form{
                background:#FFF;
                padding:40px;
                box-shadow: 0 2px 4px 0 rgba(0,0,0,0.4);
                margin-top:30px;
                margin-bottom: 20px;

            }

            label{
                font-weight:400;
                font-size:15px;
            }

            .form-control {
                background-color: #f5f5f5;
                box-shadow: none;
                color: #565656;
                font-size:16px;
                padding:20px 10px;
                margin-bottom:30px;
                border: 1px solid #f1f1f1;
            }

            .btn{ 
                background: #3c8dbc;
                color: #FFF;
                border-radius: 6px;
                margin: 0 auto;
                height: 48px;
                line-height: 38px;
                display: table;
                font-size: 15px;
                width: 100%;
            }

            .btn:hover{
                background:#FFF;
                border:2px solid #24acb3;
            }

            .forgot{
                text-align:center;
                margin-top:30px;
                font-size:16px;
            }

            .nav-tabs{
                border: none;
                margin: 0 auto;
                display: table;
            }

            .fa{
                color:#FFF;
                background: #24acb3;
                padding: 40px;
                border-radius: 50%;
            }

            .fa:hover{
                color:#24acb3;
                background: #FFF;
                border:2px solid #24acb3;
                margin-top:-4px;
            }

            @media (min-width: 600px){
                .inner-form{
                    width: 80%;
                    margin-left: 45px;
                }
            }
        </style>
    </body>
</html>
