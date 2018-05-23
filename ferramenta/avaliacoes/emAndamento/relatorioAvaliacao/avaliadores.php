<?php

$classificadores = $relatorioControle->obterClassificadores($idAvalicao);
$validadores = $relatorioControle->obterValidadores($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificadores e Validadores da avaliação</h3>
    </div>

    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <b>Classificadores:</b>
            <ol>
                <?php 
                for($i=0 ; $i < count($classificadores); $i++){
                    ?> <li> <?php echo $classificadores[$i]["nome"] ?> </li> <?php
                }
                ?>
            </ol>
            <b>Validadores:</b>
            <ol>
                <?php 
                for($i=0 ; $i < count($validadores); $i++){
                    ?> <li> <?php echo $validadores[$i]["nome"] ?> </li> <?php
                }
                ?>
            </ol>
        </div>
    </div>
</div>
