<?php 
$resultadosArtefato = $controle->obterResultadosArtefato($idAvalicao);
$numPRUS = $controle->obterNumeroPRUs($idAvalicao)[0];
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por Artefato</h3>
    </div>

    <div class="box-body">
        <div class="table">
            <table class="table table-hover no-margin text-center">
                <thead>
                    <tr>
                      <th>Artefato</th>
                      <th>Quantidade</th>
                      <th>Porcentagem (%)</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    for($i=0; $i < count($resultadosArtefato); $i++){
                    ?>
                        <tr>
                          <td><?php
                          if(strcmp($resultadosArtefato[$i][0], "") == 0){
                              echo "Não informado";
                          } else{
                              echo $resultadosArtefato[$i][0];
                          }
                           ?></td>
                          <td><?php echo $resultadosArtefato[$i][1]; ?></td>
                          <td><?php echo round((100*$resultadosArtefato[$i][1])/$numPRUS,2) . "%"; ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
