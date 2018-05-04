<?php
include '../../Banco.php';

class AvaliacaoControle extends Banco{
    public function __construct() {
        
    }
    
    public function editarAvaliacao(Avaliacao $avaliacao){
        $erro = 0;
        
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        //1) tenta salvar os dados no banco
        $sql = "UPDATE avaliacaoInfo SET nomeAvaliacao = '".$avaliacao->nome."', nomeSistema = '".$avaliacao->sistema."', plataforma = '".$avaliacao->plataforma."',"
                . "fontePostagens = '".$avaliacao->fonte."', objetivos = '".$avaliacao->objetivos."' where idAvaliacao = ".$avaliacao->id.";";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            mysqli_close($conexao);
            header("location:../emAndamento/etapa1/contextoAvaliacao.php");
        } else {
            mysqli_close($conexao);
            
        }
    }
    
    public function criarAvaliacao(Avaliacao $avaliacao, $gerente){
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('Y-m-d');
        
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        mysqli_autocommit($conexao, FALSE);
        $erro = 0;
        
        //1) cria um id para a avaliação
        $sql = "INSERT INTO `avaliacao`(`idavaliacao`, `idPessoaCriou`, `dataCriacao`, `status`)"
                . " VALUES (DEFAULT,". $gerente .",DATE('". $date ."'),'Etapa 1 - Contexto de avaliação')";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //2) obtem o id da avaliação criada
        $sql = "SELECT idavaliacao FROM avaliacao where idPessoaCriou = ". $gerente ." ORDER BY idavaliacao DESC LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $idAvaliacao = mysqli_fetch_array($result)[0];
        
        //3) associa o gerente à avaliacao
        $sql = "INSERT INTO `avaliacaoPapeis`(`idAvaliacao`, `idPessoa`, `papel`) VALUES "
                . "(". $idAvaliacao .",". $gerente .",'Gerente');";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //3) cadastrar informações da avaliação
        $sql = "INSERT INTO `avaliacaoInfo`(`idAvaliacao`, `nomeAvaliacao`, `nomeSistema`, `plataforma`, `fontePostagens`, `objetivos`) VALUES "
                . "(". $idAvaliacao .",'".$avaliacao->nome."','". $avaliacao->sistema ."','". $avaliacao->plataforma ."','". $avaliacao->fonte ."','". $avaliacao->objetivos ."');";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //4) cadastrar funcionalidades informadas
        $funcionalidades = preg_split("/[,]+/", $avaliacao->funcionalidades);
        for($i = 0; $i < count($funcionalidades); $i++){
            $sql = "INSERT INTO `avaliacaoFuncionalidades`(`idAvaliacao`, `idFuncionalidade`, `funcionalidade`)"
                    . " VALUES (". $idAvaliacao .",DEFAULT,'". $funcionalidades[$i] ."')";
            if (!mysqli_query($conexao, $sql)){
                $erro++;
            }
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            $_SESSION['idAvaliacao'] = $idAvaliacao;
            header("location:../emAndamento/etapa1/contextoAvaliacao.php");
            mysqli_close($conexao);
        } else {
            mysqli_rollback($conexao);
            mysqli_close($conexao);
        }
    }
    
    public function obterInfoAvaliacao($idAvaliacao){
        $sql = "SELECT * FROM avaliacaoInfo WHERE idAvaliacao = " . $idAvaliacao . ";";
        $rtn = self::Executar($sql);
        return mysqli_fetch_row($rtn);
    }
}

class Avaliacao {
    var $id;
    var $nome;
    var $sistema;
    var $plataforma;
    var $fonte;
    var $funcionalidades;
    var $objetivos;
    
    public function __construct() {
        
    }
}
