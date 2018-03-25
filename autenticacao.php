<?php

include './Banco.php';

class Autenticacao extends Banco{
    protected $_login, $_senha;
    
    public function __construct($login, $senha) {
        $this->_login = addslashes($login);
        $this->_senha = addslashes($senha);
        self::validarUser();
    }
    
    protected function validarUser(){
        $sql = "SELECT * FROM login WHERE login = '" . $this->_login . "' and senha = MD5('".$this->_senha."');";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            ?> 
            <script>
                window.location.href = "login.php?erroLogin";
            </script>
                <?php
        } else{
            $usuario = mysqli_fetch_row($rtn);
            if($usuario[5] == 0){
                $_SESSION['login'] = $usuario[0];
                $_SESSION['loginNome'] = $usuario[1];
                $_SESSION['isAdmin'] = $usuario[6];
                header("location:index.php");
            }
        }
        return true;
    }
}