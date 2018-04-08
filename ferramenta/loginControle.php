<?php

include 'Banco.php';

class Usuarios extends Banco{
    
    public function __construct() {
        
    }
    
    public function registrarUsuario($nome, $email, $profissao, $senha){
        $sql = "INSERT INTO login(codlogin, nome, profissao, login, senha, bloqueado, admin) VALUES (DEFAULT,'". $nome ."','". $profissao ."','". $email ."',MD5('". $senha ."'),DEFAULT,DEFAULT)";
        parent::Executar($sql);
        $_SESSION['login'] = $email;
        $_SESSION['loginNome'] = $nome;
        $_SESSION['isAdmin'] = 0;
        header("location:boasvindas.php");
    }
}