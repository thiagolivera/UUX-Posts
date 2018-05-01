<?php
include '../../../Banco.php';

class AvaliadoresControle extends Banco{
    
    public function __construct() {
        
    }
    
    public function obterAvaliacao($id){
        $sql = "SELECT * FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
    
    public function isGerente($idAvaliacao, $idPessoa){
        $sql = "SELECT papel FROM avaliacaoPapeis WHERE idavaliacao = '" . $idAvaliacao . "' and idPessoa = '" . $idPessoa . "' and papel = 'Gerente';";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            return false;
        } else{
            return true;
        }
    }
    
    public function obterClassificadores($idAvaliacao){
        $sql = "SELECT login.codLogin, login.nome, login.profissao, avaliacaoPapeis.papel, "
                . "avaliacaoPapeis.faixaInicio, avaliacaoPapeis.faixaFim FROM login,avaliacaoPapeis "
                . "WHERE login.codlogin = avaliacaoPapeis.idPessoa and avaliacaoPapeis.idavaliacao = '" . $idAvaliacao . "' and avaliacaoPapeis.papel = 'Classificador';";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterValidadores($idAvaliacao){
        $sql = "SELECT login.codLogin, login.nome, login.profissao, avaliacaoPapeis.papel, "
                . "avaliacaoPapeis.faixaInicio, avaliacaoPapeis.faixaFim FROM login,avaliacaoPapeis "
                . "WHERE login.codlogin = avaliacaoPapeis.idPessoa and avaliacaoPapeis.idavaliacao = '" . $idAvaliacao . "' and avaliacaoPapeis.papel = 'Validador';";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function verificarSeHaPostagens($idAvaliacao){
        $sql = "SELECT * FROM `postagens` WHERE `idAvaliacao` = ".$idAvaliacao." limit 1;";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            return false;
        } else{
            return true;
        }
    }
    
    public function isEmailValido($email){        
        $sql = "SELECT * FROM `login` WHERE `login` = '".$email."' limit 1;";
        $rtn = parent::Executar($sql);
        
        if($rtn == '0'){
            return 0;
        } else{
            return mysqli_fetch_row($rtn)[0];
        }
    }
    
    public function inserirAvaliador(Avaliador $avaliador){
        $email = self::isEmailValido($avaliador->email);
        if($email){
            $sql = "INSERT INTO `avaliacaoPapeis`(`idAvaliacao`, `idPessoa`, `papel`, `faixaInicio`, `faixaFim`) VALUES (".$avaliador->idAvaliacao.",".$email.",'".$avaliador->papel."',".$avaliador->faixaInicio.",".$avaliador->faixaFim.");";
            parent::Executar($sql);
            return true;
        } else{
            return false;
        }
    }
    
    public function inserirValidador(Avaliador $avaliador){
        $email = self::isEmailValido($avaliador->email);
        if($email){
            $sql = "INSERT INTO `avaliacaoPapeis`(`idAvaliacao`, `idPessoa`, `papel`, `faixaInicio`, `faixaFim`) VALUES (".$avaliador->idAvaliacao.",".$email.",'".$avaliador->papel."',".$avaliador->faixaInicio.",".$avaliador->faixaFim.");";
            parent::Executar($sql);
            return true;
        } else{
            return false;
        }
    }
    
    public function excluirAvaliador(Avaliador $avaliador){
        $sql = "DELETE FROM `avaliacaoPapeis` WHERE `idAvaliacao` = ".$avaliador->idAvaliacao." and `idPessoa` = ".$avaliador->idPessoa." and `papel` = '".$avaliador->papel."';";
        parent::Executar($sql);
    }
}

class Avaliador{
    var $idPessoa;
    var $idAvaliacao;
    var $email;
    var $papel;
    var $faixaInicio;
    var $faixaFim;
}