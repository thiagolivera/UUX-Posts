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
    
    public function obterListaUsuarios(){
        $sql = "SELECT * FROM login;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function desativarUsuario($id){
        $sql = "UPDATE login SET bloqueado = true WHERE login.codlogin = " . $id . ";";
        parent::Executar($sql);
        ?> 
            <script>
                alert("Usuário desativado com sucesso");
                window.location.href = "gerenciarUsuarios.php";
            </script>
        <?php
    }
}