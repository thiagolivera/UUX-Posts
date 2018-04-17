<?php
include '../../Banco.php';

class AvaliacaoControle extends Banco{
    public function __construct() {
        
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
        $sql = "INSERT INTO `avaliacaoInfo`(`idAvaliacao`, `nomeSistema`, `plataforma`, `fontePostagens`, `objetivos`) VALUES "
                . "(". $idAvaliacao .",'". $avaliacao->sistema ."','". $avaliacao->plataforma ."','". $avaliacao->fonte ."','". $avaliacao->objetivos ."');";
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
        
        //5) cadastrar categorias de classificação informadas        
        $sql = "INSERT INTO `avaliacaoCategorias`(`idavaliacao`, `funcionalidade`, `tipo`, `intencao`, `analiseSentimentos`, `usabilidade`, `ux`, `artefato`) VALUES"
                . " (". $idAvaliacao .",".$avaliacao->funcionalidade.",".$avaliacao->tipo.",".$avaliacao->intencao.",".$avaliacao->sentimentos.",".$avaliacao->usabilidade.",".$avaliacao->ux.",".$avaliacao->artefato.");";
        if (!mysqli_query($conexao, $sql)){
            $erro++; //se der erro incrementa no contador para cancelar a transação
        }
        
        //Verifica se houve erro para cancelar a transação
        if ($erro == 0){
            mysqli_commit($conexao);
            $_SESSION['idAvaliacaoCriada'] = $idAvaliacao;
            header("location:../emAndamento/etapa1/contextoAvaliacao.php");
            mysqli_close($conexao);
        } else {
            mysqli_rollback($conexao);
            mysqli_close($conexao);
        }
    }
}

class Avaliacao {
    var $sistema;
    var $plataforma;
    var $fonte;
    var $funcionalidades;
    var $objetivos;
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
