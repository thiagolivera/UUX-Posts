<?php 
$resultadosFuncionalidade = $relatorioControle->obterFuncCriticadas($idAvalicao);
$numPRUS = $controle->obterNumeroPRUs($idAvalicao)[0];
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Funcionalidades mais criticadas</h3>
    </div>

    <div class="box-body">
        <div class="table">
            <table class="table table-hover no-margin text-center">
                <thead>
                    <tr>
                      <th>Funcionalidade</th>
                      <th>Quantidade</th>
                      <th>Porcentagem (%)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for($i=0; $i < count($resultadosFuncionalidade); $i++){
                    ?>
                        <tr>
                          <td><?php
                          if(strcmp($resultadosFuncionalidade[$i]["classFuncionalidade"], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosFuncionalidade[$i]["classFuncionalidade"];
                          }
                           ?></td>
                          <td><?php echo $resultadosFuncionalidade[$i]["quantidade"]; ?></td>
                          <td><?php echo round((100*$resultadosFuncionalidade[$i]["quantidade"])/count($resultadosFuncionalidade),2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$resultadosFuncionalidadeElogio = $relatorioControle->obterFuncElogio($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Funcionalidades mais elogiadas</h3>
    </div>

    <div class="box-body">
        <div class="table">
            <table class="table table-hover no-margin text-center">
                <thead>
                    <tr>
                      <th>Funcionalidade</th>
                      <th>Quantidade</th>
                      <th>Porcentagem (%)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for($i=0; $i < count($resultadosFuncionalidadeElogio); $i++){
                    ?>
                        <tr>
                          <td><?php
                          if(strcmp($resultadosFuncionalidadeElogio[$i]["classFuncionalidade"], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosFuncionalidadeElogio[$i]["classFuncionalidade"];
                          }
                           ?></td>
                          <td><?php echo $resultadosFuncionalidadeElogio[$i]["quantidade"]; ?></td>
                          <td><?php echo round((100*$resultadosFuncionalidadeElogio[$i]["quantidade"])/count($resultadosFuncionalidadeElogio),2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$resultadosFuncionalidadeDuvida = $relatorioControle->obterFuncDuvida($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Funcionalidades com dúvidas</h3>
    </div>

    <div class="box-body">
        <div class="table">
            <table class="table table-hover no-margin text-center">
                <thead>
                    <tr>
                      <th>Funcionalidade</th>
                      <th>Quantidade</th>
                      <th>Porcentagem (%)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for($i=0; $i < count($resultadosFuncionalidadeDuvida); $i++){
                    ?>
                        <tr>
                          <td><?php
                          if(strcmp($resultadosFuncionalidadeDuvida[$i]["classFuncionalidade"], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosFuncionalidadeDuvida[$i]["classFuncionalidade"];
                          }
                           ?></td>
                          <td><?php echo $resultadosFuncionalidadeDuvida[$i]["quantidade"]; ?></td>
                          <td><?php echo round((100*$resultadosFuncionalidadeDuvida[$i]["quantidade"])/count($resultadosFuncionalidadeDuvida),2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$resultadosFuncionalidadeComparacao = $relatorioControle->obterFuncComparacao($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Funcionalidades comparadas com as outros sistemas</h3>
    </div>

    <div class="box-body">
        <div class="table">
            <table class="table table-hover no-margin text-center">
                <thead>
                    <tr>
                      <th>Funcionalidade</th>
                      <th>Quantidade</th>
                      <th>Porcentagem (%)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for($i=0; $i < count($resultadosFuncionalidadeComparacao); $i++){
                    ?>
                        <tr>
                          <td><?php
                          if(strcmp($resultadosFuncionalidadeComparacao[$i]["classFuncionalidade"], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosFuncionalidadeComparacao[$i]["classFuncionalidade"];
                          }
                           ?></td>
                          <td><?php echo $resultadosFuncionalidadeComparacao[$i]["quantidade"]; ?></td>
                          <td><?php echo round((100*$resultadosFuncionalidadeComparacao[$i]["quantidade"])/count($resultadosFuncionalidadeComparacao),2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$resultadosFuncionalidadeSugestao = $relatorioControle->obterFuncSugestao($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Funcionalidades sugeridas</h3>
    </div>

    <div class="box-body">
        <div class="table">
            <table class="table table-hover no-margin text-center">
                <thead>
                    <tr>
                      <th>Funcionalidade</th>
                      <th>Quantidade</th>
                      <th>Porcentagem (%)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for($i=0; $i < count($resultadosFuncionalidadeSugestao); $i++){
                    ?>
                        <tr>
                          <td><?php
                          if(strcmp($resultadosFuncionalidadeSugestao[$i]["classFuncionalidade"], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosFuncionalidadeSugestao[$i]["classFuncionalidade"];
                          }
                           ?></td>
                          <td><?php echo $resultadosFuncionalidadeSugestao[$i]["quantidade"]; ?></td>
                          <td><?php echo round((100*$resultadosFuncionalidadeSugestao[$i]["quantidade"])/count($resultadosFuncionalidadeSugestao),2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    
                    if(count($resultadosFuncionalidadeSugestao) == 0){
                        ?><tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr><?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php 
$resultadosFuncionalidadeAjuda = $relatorioControle->obterFuncAjuda($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Funcionalidades que os usuários forneceram ajuda</h3>
    </div>

    <div class="box-body">
        <div class="table">
            <table class="table table-hover no-margin text-center">
                <thead>
                    <tr>
                      <th>Funcionalidade</th>
                      <th>Quantidade</th>
                      <th>Porcentagem (%)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for($i=0; $i < count($resultadosFuncionalidadeAjuda); $i++){
                    ?>
                        <tr>
                          <td><?php
                          if(strcmp($resultadosFuncionalidadeAjuda[$i]["classFuncionalidade"], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosFuncionalidadeAjuda[$i]["classFuncionalidade"];
                          }
                           ?></td>
                          <td><?php echo $resultadosFuncionalidadeAjuda[$i]["quantidade"]; ?></td>
                          <td><?php echo round((100*$resultadosFuncionalidadeAjuda[$i]["quantidade"])/count($resultadosFuncionalidadeAjuda),2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    if(count($resultadosFuncionalidadeAjuda) == 0){
                        ?>
                        <tr>
                            <td>-</td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>