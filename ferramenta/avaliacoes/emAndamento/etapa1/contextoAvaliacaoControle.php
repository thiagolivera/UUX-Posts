<?php
include '../../../Banco.php';

class ContextoAvaliacaoControle extends Banco{
    public function __construct() {
        
    }
    
    public function obterContexto($idAvaliacao){
        $sql = "SELECT * FROM avaliacaoContexto WHERE idAvaliacao = " . $idAvaliacao . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }

    public function definirContexto(ContextoAvaliacao $contexto, $idAvaliacao){
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        $erro = 0;
        
        //1) tenta salvar os dados no banco
        $sql = "INSERT INTO `avaliacaoContexto`(`idAvaliacao`, `ambienteFisico`, `ambienteSocial`, `ambienteCultural`, `faixaEtaria`, `sexo`, `formacaoAcademica`, `tempoUso`, `experienciaTecnologica`) VALUES"
                . " (".$idAvaliacao.", '".$contexto->ambFisico."', '".$contexto->ambSocial."','".$contexto->ambCultural."','".$contexto->faixaEtaria."','".$contexto->sexo."','".$contexto->formacao."','".$contexto->tempoUso."','".$contexto->experiencia."');";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location:../../emAndamento/etapa2/introEtapa2.php");
        } else {
            self::editarContexto($contexto, $idAvaliacao, $conexao);
            
        }
    }
    
    public static function editarContexto(ContextoAvaliacao $contexto, $idAvaliacao, $conexao){
        $erro = 0;
        
        //1) tenta salvar os dados no banco
        $sql = "UPDATE avaliacaoContexto SET ambienteFisico = '".$contexto->ambFisico."', ambienteSocial = '".$contexto->ambSocial."', ambienteCultural = '".$contexto->ambCultural."',"
                . "faixaEtaria = '".$contexto->faixaEtaria."', sexo = '".$contexto->sexo."', formacaoAcademica = '".$contexto->formacao."', tempoUso = '".$contexto->tempoUso."',"
                . " experienciaTecnologica = '".$contexto->experiencia."' where idAvaliacao = ".$idAvaliacao.";";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location:../../emAndamento/etapa2/introEtapa2.php");
        } else {
            echo 'erro';
            mysqli_close($conexao);
            
        }
    }
    
    public function isGerente($idAvaliacao, $idPessoa){
        $sql = "SELECT * FROM avaliacao WHERE idavaliacao = '" . $idAvaliacao . "' and idGerente = '" . $idPessoa . "';";
        $rtn = parent::Executar($sql);
        if($rtn == '0'){
            return false;
        } else{
            return true;
        }
    }
    
    public function obterAvaliacao($id){
        $sql = "SELECT nomeSistema, plataforma FROM avaliacaoInfo WHERE idAvaliacao = " . $id . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
}

class ContextoAvaliacao {
    var $ambFisico;
    var $ambSocial;
    var $ambCultural;
    var $faixaEtaria;
    var $sexo;
    var $formacao;
    var $tempoUso;
    var $experiencia;
    
    public function __construct() {
        
    }
}
