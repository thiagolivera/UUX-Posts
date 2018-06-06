<?php

$avaliacaoInfo = $relatorioControle->obterInfoAvaliacao($idAvalicao);
$funcionalidades = $relatorioControle->obterFuncionalidades($idAvalicao);
$numPostagens = $relatorioControle->obterNumeroPostagens($idAvalicao);
        
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Informações gerais da avaliação</h3>
    </div>

    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <b>Sistema avaliado:</b> <?php echo $avaliacaoInfo["nomeSistema"]; ?> <br>
            <b>Plataforma do sistema:</b> <?php echo $avaliacaoInfo["plataforma"]; ?> <br>
            <b>Fonte das postagens:</b> <?php echo $avaliacaoInfo["fontePostagens"]; ?> <br>
            <b>Forma de extração:</b> <?php echo $avaliacaoInfo["formaExtracao"]; ?> <br>
            <b>Período de Extração:</b> <?php echo $avaliacaoInfo["periodoExtracao"]; ?> <br>
            <b>Número de postagens extraídas:</b> <?php echo $numPostagens; ?> <br>
            <b>Funcionalidades:</b> <?php
            for($i=0; $i < count($funcionalidades); $i++){
                if(strcmp($funcionalidades[$i]["funcionalidade"], "") == 0){
                    echo "(não informado)";
                } else{
                    echo $funcionalidades[$i]["funcionalidade"] . "; ";
                }
            }
            ?> <br>
            <b>Objetivos da avaliação:</b> <?php echo $avaliacaoInfo["objetivos"]; ?> <br>
            <b>Categorias de classificação utilizadas:</b> <br>
            <ul>
                <?php
                
                if($categoriasAvaliacao["funcionalidade"]){
                    ?> <li>Classificação por funcionalidade</li> <?php
                }
                if($categoriasAvaliacao["tipo"]){
                    ?> <li>Classificação por tipo</li> <?php
                }
                if($categoriasAvaliacao["intencao"]){
                    ?> <li>Classificação por intenção</li> <?php
                }
                if($categoriasAvaliacao["analiseSentimentos"]){
                    ?> <li>Classificação por análise de sentimentos</li> <?php
                }
                if($categoriasAvaliacao["usabilidade"]){
                    ?> <li>Classificação por critérios de qualidade de uso (Usabilidade)</li> <?php
                }
                if($categoriasAvaliacao["ux"]){
                    ?> <li>Classificação por critérios de qualidade de uso (Experiência do Usuário)</li> <?php
                }
                if($categoriasAvaliacao["artefato"]){
                    ?> <li>Classificação por artefato</li> <?php
                }
                
                ?>
            </ul>
        </div>
    </div>
</div>
