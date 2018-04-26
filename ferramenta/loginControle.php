<?php

include 'Banco.php';

class Usuarios extends Banco{
    
    public function __construct() {
        
    }
    
    public function registrarUsuario($nome, $email, $profissao, $senha){
        $sql = "INSERT INTO login(codlogin, nome, profissao, login, senha, bloqueado, admin) VALUES (DEFAULT,'". $nome ."','". $profissao ."','". $email ."',MD5('". $senha ."'),DEFAULT,DEFAULT)";
        parent::Executar($sql);
        
        $sql = "SELECT * FROM login WHERE login = '" . $email . "';";
        $rtn = parent::Executar($sql);
        $usuario = mysqli_fetch_row($rtn);
        
        $_SESSION['login'] = $usuario[0];
        $_SESSION['loginNome'] = $usuario[1];
        $_SESSION['isAdmin'] = $usuario[6];
        header("location:boasvindas.php");
        
    }
}