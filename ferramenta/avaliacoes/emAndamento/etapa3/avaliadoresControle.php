<?php
include_once '../../../Banco.php';

class AvaliadoresControle extends Banco{
    
    public function __construct() {
        
    }
    
    public function excluirCategoriaFuncionalidade($idAvaliacao){
        $sql = "UPDATE `avaliacaoCategorias` SET `funcionalidade`='0' WHERE `idavaliacao` = ".$idAvaliacao.";";
        parent::Executar($sql);
    }
    
    public function excluirCategoriaTipo($idAvaliacao){
        $sql = "UPDATE `avaliacaoCategorias` SET `tipo`='0' WHERE `idavaliacao`=".$idAvaliacao.";";
        parent::Executar($sql);
    }
    public function excluirCategoriaIntencao($idAvaliacao){
        $sql = "UPDATE `avaliacaoCategorias` SET `intencao`='0' WHERE `idavaliacao`=".$idAvaliacao.";";
        parent::Executar($sql);
    }
    public function excluirCategoriaAnaliseSentimentos($idAvaliacao){
        $sql = "UPDATE `avaliacaoCategorias` SET `analiseSentimentos`='0' WHERE `idavaliacao`=".$idAvaliacao.";";
        parent::Executar($sql);
    }
    public function excluirCategoriaUsabilidade($idAvaliacao){
        $sql = "UPDATE `avaliacaoCategorias` SET `usabilidade`='0' WHERE `idavaliacao`=".$idAvaliacao.";";
        parent::Executar($sql);
    }
    public function excluirCategoriaUX($idAvaliacao){
        $sql = "UPDATE `avaliacaoCategorias` SET `ux`='0' WHERE `idavaliacao`=".$idAvaliacao.";";
        parent::Executar($sql);
    }
    public function excluirCategoriaArtefato($idAvaliacao){
        $sql = "UPDATE `avaliacaoCategorias` SET `artefato`='0' WHERE `idavaliacao`=".$idAvaliacao.";";
        parent::Executar($sql);
    }

    public function inserirCategoriasClassificacao($idAvaliacao, Categorias $categorias){
        if(count(self::obterCategoriasAvaliacao($idAvaliacao)) != 0){
            $sql = "UPDATE `avaliacaoCategorias` SET `funcionalidade`='".$categorias->funcionalidade."',`tipo`='".$categorias->tipo."',`intencao`='".$categorias->intencao."',`analiseSentimentos`='".$categorias->sentimentos."',`usabilidade`='".$categorias->usabilidade."',`ux`='".$categorias->ux."',`artefato`='".$categorias->artefato."' WHERE `idavaliacao`=".$idAvaliacao.";";
        } else{
            $sql = "INSERT INTO `avaliacaoCategorias`(`idavaliacao`, `funcionalidade`, `tipo`, `intencao`, `analiseSentimentos`, `usabilidade`, `ux`, `artefato`) VALUES "
                . "(".$idAvaliacao.",'".$categorias->funcionalidade."','".$categorias->tipo."','".$categorias->intencao."','".$categorias->sentimentos."','".$categorias->usabilidade."','".$categorias->ux."','".$categorias->artefato."');";
        }
        
        parent::Executar($sql);
        return TRUE;
    }

    public function obterCategoriasAvaliacao($idAvaliacao){
        $sql = "SELECT * FROM avaliacaoCategorias WHERE idavaliacao = " . $idAvaliacao . ";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }


    public function alterarStatus($idAvaliacao){
        $sql = "UPDATE `avaliacao` SET `status` = 'Etapa 3 - Classificação de PRUS' WHERE `idavaliacao` = ".$idAvaliacao.";";
        parent::Executar($sql);
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
    
    public function obterNumeroPostagens($idAvaliacao){
        $sql = "SELECT count(*) FROM `postagens` WHERE `idAvaliacao` = ".$idAvaliacao.";";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array[0]["count(*)"];
        
    }
    
    public function obterNumeroPostagensClassificadas($idAvaliacao){
        $sql = "SELECT login.nome, COUNT(classificacao.idClassificador) as numPosts FROM classificacao, login WHERE classificacao.idAvaliacao = ".$idAvaliacao." and login.codlogin = classificacao.idClassificador and classificacao.isValidado=0 GROUP by login.nome;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterNumeroPostagensValidadas($idAvaliacao){
        $sql = "SELECT login.nome, COUNT(classificacao.idClassificador) as numPosts FROM classificacao, login WHERE classificacao.idAvaliacao = ".$idAvaliacao." and login.codlogin = classificacao.idClassificador and classificacao.isValidado=1 GROUP by login.nome;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterClassificadoresSemClassificacao($idAvaliacao){
        $sql = "SELECT login.nome FROM classificacao, avaliacaoPapeis, login WHERE login.codlogin not in (SELECT classificacao.idClassificador from classificacao where classificacao.idAvaliacao = ".$idAvaliacao.") AND avaliacaoPapeis.idPessoa = login.codlogin AND avaliacaoPapeis.idAvaliacao = ".$idAvaliacao." AND avaliacaoPapeis.papel = 'Classificador' AND classificacao.idAvaliacao = ".$idAvaliacao." AND classificacao.isValidado = 0 GROUP by login.nome;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterValidadoresSemClassificacao($idAvaliacao){
        $sql = "SELECT login.nome FROM classificacao, avaliacaoPapeis, login WHERE login.codlogin not in (SELECT classificacao.idClassificador from classificacao where classificacao.idAvaliacao = ".$idAvaliacao.") AND avaliacaoPapeis.idPessoa = login.codlogin AND avaliacaoPapeis.idAvaliacao = ".$idAvaliacao." AND avaliacaoPapeis.papel = 'Validador' AND classificacao.idAvaliacao = ".$idAvaliacao." AND classificacao.isValidado = 0 GROUP by login.nome;";
        $rtn = parent::Executar($sql);
        
        $array = array();
        
        while($row = @mysqli_fetch_assoc($rtn)){
            $array[] = $row;
        }
        return $array;
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
    
    public function verificarAvaliadoresInformados($idAvaliacao){
        //verifica quantos validadores foram incluidos
        $sql = "SELECT COUNT(*) FROM `avaliacaoPapeis` WHERE idAvaliacao = " . $idAvaliacao . " and papel = 'Classificador'";
        $rtn = parent::Executar($sql);
        if(intval(mysqli_fetch_row($rtn)[0]) < 2){
            return FALSE;
        }
        //verifica quantos validadores foram incluidos
        $sql = "SELECT COUNT(*) FROM `avaliacaoPapeis` WHERE idAvaliacao = " . $idAvaliacao . " and papel='Validador'";
        $rtn = parent::Executar($sql);
        if(intval(mysqli_fetch_row($rtn)[0]) < 1){
            return FALSE;
        }
        
        return TRUE;
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

class Categorias{
    var $funcionalidade;
    var $tipo;
    var $intencao;
    var $sentimentos;
    var $usabilidade;
    var $ux;
    var $artefato;
    
    public function __construct() {
        
    }
}