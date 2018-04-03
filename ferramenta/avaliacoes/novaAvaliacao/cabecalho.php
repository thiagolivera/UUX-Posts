<header class="main-header">
    
    <link rel="icon" type="imagem/png" href="../../images/uux-icon.ico" />
    <link rel = "shortcut icon" type = "imagem/x-icon" href = "../../images/uux-icon.ico"/>

    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>UUX</b><br>-Posts</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>UUX</b>-Posts</span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="../../editarPerfil.php">
                <img src="../../dist/img/avatar5.png" class="user-image" alt="Imagem do usuário">
              <span class=""><?php echo $_SESSION['loginNome']; ?></span>
            </a>
          </li>
          <li><a href="../../logout.php" class="btn btn-md">Sair</a></li>
        </ul>
      </div>

    </nav>
  </header>