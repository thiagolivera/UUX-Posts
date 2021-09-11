<?php 
$resultadosTipo = $controle->obterResultadosTipo($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por Tipo</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table">
                    <table class="table table-hover no-margin text-center">
                        <thead>
                            <tr>
                              <th>Tipo de PRU</th>
                              <th>Quantidade</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Crítica</td>
                              <td><?php echo $resultadosTipo[0];?></td>
                              <td><?php echo round((100*$resultadosTipo[0])/$resultadosTipo[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Elogio</td>
                              <td><?php echo $resultadosTipo[1];?></td>
                              <td><?php echo round((100*$resultadosTipo[1])/$resultadosTipo[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Dúvida</td>
                              <td><?php echo $resultadosTipo[2];?></td>
                              <td><?php echo round((100*$resultadosTipo[2])/$resultadosTipo[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Comparação</td>
                              <td><?php echo $resultadosTipo[3];?></td>
                              <td><?php echo round((100*$resultadosTipo[3])/$resultadosTipo[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Sugestão</td>
                              <td><?php echo $resultadosTipo[4];?></td>
                              <td><?php echo round((100*$resultadosTipo[4])/$resultadosTipo[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Ajuda</td>
                              <td><?php echo $resultadosTipo[5];?></td>
                              <td><?php echo round((100*$resultadosTipo[5])/$resultadosTipo[6],2) . "%"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="chartTipo" width="600" height="350"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var tipoCanvas = document.getElementById("chartTipo");
    Chart.defaults.global.defaultFontSize = 16;

    var tipoData = {
        labels: [
            "Crítica",
            "Elogio",
            "Dúvida",
            "Comparação",
            "Sugestão",
            "Ajuda"
        ],
        datasets: [
            {
                data: [<?php echo round((100*$resultadosTipo[0])/$resultadosTipo[6],2);?>,
                    <?php echo round((100*$resultadosTipo[1])/$resultadosTipo[6],2);?>, 
                    <?php echo round((100*$resultadosTipo[2])/$resultadosTipo[6],2);?>,
                    <?php echo round((100*$resultadosTipo[3])/$resultadosTipo[6],2);?>,
                    <?php echo round((100*$resultadosTipo[4])/$resultadosTipo[6],2);?>,
                    <?php echo round((100*$resultadosTipo[5])/$resultadosTipo[6],2);?>],
                backgroundColor: [
                    "#ff3838",
                    "#05c46b",
                    "#cd84f1",
                    "#FFC312",
                    "#12CBC4",
                    "#4b4b4b"
                ]
            }]
    };

    var pieChart = new Chart(tipoCanvas, {
      type: 'doughnut',
      data: tipoData
    });
</script>
