<?php 
$resultadosUX = $controle->obterResultadosUX($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por Critérios de Qualidade de Uso (Experiência do usuário)</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table">
                    <table class="table table-hover no-margin text-center">
                        <thead>
                            <tr>
                              <th>Faceta de UX</th>
                              <th>Quantidade</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Afeto</td>
                              <td><?php echo $resultadosUX[0];?></td>
                              <td><?php echo round((100*$resultadosUX[0])/$resultadosUX[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Estética</td>
                              <td><?php echo $resultadosUX[1];?></td>
                              <td><?php echo round((100*$resultadosUX[1])/$resultadosUX[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Frustração</td>
                              <td><?php echo $resultadosUX[2];?></td>
                              <td><?php echo round((100*$resultadosUX[2])/$resultadosUX[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Satisfação</td>
                              <td><?php echo $resultadosUX[3];?></td>
                              <td><?php echo round((100*$resultadosUX[3])/$resultadosUX[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Motivação</td>
                              <td><?php echo $resultadosUX[4];?></td>
                              <td><?php echo round((100*$resultadosUX[4])/$resultadosUX[6],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Suporte</td>
                              <td><?php echo $resultadosUX[5];?></td>
                              <td><?php echo round((100*$resultadosUX[5])/$resultadosUX[6],2) . "%"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="chartUx" width="600" height="350"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var uxCanvas = document.getElementById("chartUx");
    Chart.defaults.global.defaultFontSize = 16;
    Chart.defaults.global.legend.display = false;
    
    var uxData = {
        labels: [
            "Afeto",
            "Estética",
            "Frustração",
            "Satisfação",
            "Motivação",
            "Suporte"
        ],
        datasets: [
            {
                data: [<?php echo round((100*$resultadosUX[0])/$resultadosUX[6],2);?>,
                    <?php echo round((100*$resultadosUX[1])/$resultadosUX[6],2);?>,
                    <?php echo round((100*$resultadosUX[2])/$resultadosUX[6],2);?>,
                    <?php echo round((100*$resultadosUX[3])/$resultadosUX[6],2);?>,
                    <?php echo round((100*$resultadosUX[4])/$resultadosUX[6],2);?>,
                    <?php echo round((100*$resultadosUX[5])/$resultadosUX[6],2);?>],
                backgroundColor: [
                    "#A3CB38",
                    "#1289A7",
                    "#EE5A24",
                    "#5f27cd",
                    "#12CBC4",
                    "#9980FA"
                ]
            }]
    };

    var uxChart = new Chart(uxCanvas, {
      type: 'horizontalBar',
      data: uxData,
      options: {
            scales: {
                xAxes: [{
                    ticks: {
                        min: 0,
                        max: 100
                    }
                }],
                yAxes: [{
                    stacked: true
                }]
            }
        }
    });
</script>
