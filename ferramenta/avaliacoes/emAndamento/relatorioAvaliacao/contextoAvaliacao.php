<?php 
$contexto = $relatorioControle->obterContexto($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Contexto de uso do sistema</h3>
    </div>

    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <b>Ambiente Físico:</b>
            <?php
            if (strcmp($contexto["ambienteFisico"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["ambienteFisico"];
            }
            ?>
            <br>
            <b>Ambiente Social:</b>
            <?php
            if (strcmp($contexto["ambienteSocial"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["ambienteSocial"];
            }
            ?>
            <br>
            <b>Ambiente Cultural:</b>
            <?php
            if (strcmp($contexto["ambienteCultural"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["ambienteCultural"];
            }
            ?>
            <br>
        </div>
    </div>
</div>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Informações sobre os usuários do sistema</h3>
    </div>

    <div class="box-body">
        <div class="row" style="padding-left: 20px">
            <b>Faixa etária:</b>
            <?php
            if (strcmp($contexto["faixaEtaria"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["faixaEtaria"];
            }
            ?>
            <br>
            <b>Sexo:</b> 
            <?php
            if (strcmp($contexto["sexo"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["sexo"];
            }
            ?>
            <br>
            <b>Formação acadêmica:</b>
            <?php
            if (strcmp($contexto["formacaoAcademica"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["formacaoAcademica"];
            }
            ?>
            <br>
            <b>Tempo de uso do sistema:</b>
            <?php
            if (strcmp($contexto["tempoUso"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["tempoUso"];
            }
            ?>
            <br>
            <b>Experiência com tecnologia:</b>
            <?php
            if (strcmp($contexto["experienciaTecnologica"],"") == 0){
                echo "(não informado)";
            } else{
                echo $contexto["experienciaTecnologica"];
            }
            ?>
            <br>
        </div>
    </div>
</div>
