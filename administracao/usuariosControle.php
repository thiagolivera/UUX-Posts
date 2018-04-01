<?php

include '../Banco.php';

class Usuarios extends Banco{
    public function __construct() {
        
    }
    
    public function cadastrarUsuario($nome, $email, $profissao, $tipo){
        if(strcmp($tipo, 'Administrador') == 0){
            $sql = "INSERT INTO login(codlogin, nome, profissao, login, senha, bloqueado, admin) VALUES (DEFAULT,'". $nome ."','". $profissao ."','". $email ."',MD5('uuxposts'),DEFAULT,true)";
        } else{
            $sql = "INSERT INTO login(codlogin, nome, profissao, login, senha, bloqueado, admin) VALUES (DEFAULT,'". $nome ."','". $profissao ."','". $email ."',MD5('uuxposts'),DEFAULT,false)";
        }
        
        parent::Executar($sql);
        ?> 
            <script>
                window.location.href = "cadastrarUsuario.php?sucesso";
            </script>
        <?php
    }
    
    public function obterPerfil($id){
        $sql = "SELECT * FROM login WHERE login.codlogin = " . $id . ";";
        $rtn = parent::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function alterarSenha($senhaAntiga, $novaSenha, $id){
        $sql = "SELECT senha FROM login WHERE login.codlogin = " . $id . " and login.senha = MD5('" . $senhaAntiga . "');";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            ?> 
            <script>
                window.location.href = "editarPerfil.php?erro";
            </script>
                <?php
        } else{
            $sql = "UPDATE login SET senha = MD5('" . $novaSenha . "') WHERE login.codlogin = " . $id . ";";
            parent::Executar($sql);
            ?> 
                <script>
                    window.location.href = "editarPerfil.php?sucesso";
                </script>
            <?php
        }
    }
}