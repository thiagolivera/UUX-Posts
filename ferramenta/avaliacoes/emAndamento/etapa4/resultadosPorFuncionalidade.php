<?php 
$resultadosFuncionalidade = $controle->obterResultadosFuncionalidade($idAvalicao);
$numPRUS = $controle->obterNumeroPRUs($idAvalicao)[0];
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por Funcionalidade</h3>
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
                          if(strcmp($resultadosFuncionalidade[$i][0], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosFuncionalidade[$i][0];
                          }
                           ?></td>
                          <td><?php echo $resultadosFuncionalidade[$i][1]; ?></td>
                          <td><?php echo round((100*$resultadosFuncionalidade[$i][1])/$numPRUS,2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
