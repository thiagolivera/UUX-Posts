<?php

include './Banco.php';

class Perfil extends Banco{
    public function __construct() {
        
    }
    
    public function alterarPerfil($nome, $email, $profissao, $id){
        $sql = "UPDATE login SET nome = '" . $nome . "', profissao = '" . $profissao . "', login = '" . $email . "' WHERE login.codlogin = " . $id . ";";
        parent::Executar($sql);
        $_SESSION['loginNome'] = $nome;
        ?> 
            <script>
                window.location.href = "editarPerfil.php?sucesso";
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