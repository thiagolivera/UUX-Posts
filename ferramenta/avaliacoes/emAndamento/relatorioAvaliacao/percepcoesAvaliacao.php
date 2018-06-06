<?php 
$percepcoes = $relatorioControle->obterPercepcoes($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Percepções de avaliação</h3>
    </div>

    <div class="box-body">
        <div class="row" style="padding-left: 20px; padding-right: 20px; text-align: justify">
            <label for="comment">1) Você teve dificuldade em classificar as postagens? Se sim, qual sua principal dificuldade?</label>
            <ul>
                <?php
                for($i=0; $i < count($percepcoes); $i++){
                    ?> <li>Avaliador <?php echo $i + 1; ?>: <?php
                    if (strcmp($percepcoes[$i]["q1"],"") == 0){
                        echo "(não informado)";
                    } else{
                        echo $percepcoes[$i]["q1"];
                    }
                    ?> </li>
                <?php
                }
                ?>
            </ul>
            <label for="comment">2) Teve alguma postagem que lhe chamou atenção? Por quê?</label>
            <ul>
                <?php
                for($i=0; $i < count($percepcoes); $i++){
                    ?> <li>Avaliador <?php echo $i + 1; ?>: <?php
                    if (strcmp($percepcoes[$i]["q2"],"") == 0){
                        echo "(não informado)";
                    } else{
                        echo $percepcoes[$i]["q2"];
                    }
                    ?> </li> <?php
                }
                ?>
            </ul>
            <label for="comment">3) O que você percebeu durante esta análise?</label>
            <ul>
                <?php
                for($i=0; $i < count($percepcoes); $i++){
                    ?> <li>Avaliador <?php echo $i + 1; ?>: <?php
                    if (strcmp($percepcoes[$i]["q3"],"") == 0){
                        echo "(não informado)";
                    } else{
                        echo $percepcoes[$i]["q3"];
                    }
                    ?> </li> <?php
                }
                
                ?>
            </ul>
            <label for="comment">4) Qual o sentimento você percebeu com maior frequência nas postagens?</label>
            <ul>
                <?php
                for($i=0; $i < count($percepcoes); $i++){
                    ?> <li>Avaliador <?php echo $i + 1; ?>: <?php
                    if (strcmp($percepcoes[$i]["q4"],"") == 0){
                        echo "(não informado)";
                    } else{
                        echo $percepcoes[$i]["q4"];
                    }
                    ?> </li> <?php
                }
                
                ?>
            </ul>
            <label for="comment">5) Quais as principais reclamações (problemas encontrados no sistema) e os principais elogios (benefícios do sistema) percebido nas postagens?</label>
            <ul>
                <?php
                for($i=0; $i < count($percepcoes); $i++){
                    ?> <li>Avaliador <?php echo $i + 1; ?>: <?php
                    if (strcmp($percepcoes[$i]["q5"],"") == 0){
                        echo "(não informado)";
                    } else{
                        echo $percepcoes[$i]["q5"];
                    }
                    ?> </li> <?php
                }
                
                ?>
            </ul>
            <label for="comment">6) Relate quaisquer outras observações percebidas:</label>
            <ul>
                <?php
                for($i=0; $i < count($percepcoes); $i++){
                    ?> <li>Avaliador <?php echo $i + 1; ?>: <?php
                    if (strcmp($percepcoes[$i]["q6"],"") == 0){
                        echo "(não informado)";
                    } else{
                        echo $percepcoes[$i]["q6"];
                    }
                    ?> </li> <?php
                }
                ?>
            </ul>
        </div>
    </div>
</div>
