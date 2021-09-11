<?php 
$resultadosUsabilidade = $controle->obterResultadosUsabilidade($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por Critérios de Qualidade de Uso (Usabilidade)</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table">
                    <table class="table table-hover no-margin text-center">
                        <thead>
                            <tr>
                              <th>Faceta de Usabilidade</th>
                              <th>Quantidade</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Eficácia</td>
                              <td><?php echo $resultadosUsabilidade[0];?></td>
                              <td><?php echo round((100*$resultadosUsabilidade[0])/$resultadosUsabilidade[7],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Eficiência</td>
                              <td><?php echo $resultadosUsabilidade[1];?></td>
                              <td><?php echo round((100*$resultadosUsabilidade[1])/$resultadosUsabilidade[7],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Satisfação</td>
                              <td><?php echo $resultadosUsabilidade[2];?></td>
                              <td><?php echo round((100*$resultadosUsabilidade[2])/$resultadosUsabilidade[7],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Segurança</td>
                              <td><?php echo $resultadosUsabilidade[3];?></td>
                              <td><?php echo round((100*$resultadosUsabilidade[3])/$resultadosUsabilidade[7],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Utilidade</td>
                              <td><?php echo $resultadosUsabilidade[4];?></td>
                              <td><?php echo round((100*$resultadosUsabilidade[4])/$resultadosUsabilidade[7],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Memorabilidade</td>
                              <td><?php echo $resultadosUsabilidade[5];?></td>
                              <td><?php echo round((100*$resultadosUsabilidade[5])/$resultadosUsabilidade[7],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Aprendizado</td>
                              <td><?php echo $resultadosUsabilidade[6];?></td>
                              <td><?php echo round((100*$resultadosUsabilidade[6])/$resultadosUsabilidade[7],2) . "%"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="chartUsabilidade" width="600" height="350"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var usabilidadeCanvas = document.getElementById("chartUsabilidade");
    Chart.defaults.global.defaultFontSize = 16;
    Chart.defaults.global.legend.display = false;
    
    var usabilidadeData = {
        labels: [
            "Eficácia",
            "Eficiência",
            "Satisfação",
            "Segurança",
            "Utilidade",
            "Memorabilidade",
            "Aprendizado"
        ],
        datasets: [
            {
                data: [<?php echo round((100*$resultadosUsabilidade[0])/$resultadosUsabilidade[7],2);?>,
                    <?php echo round((100*$resultadosUsabilidade[1])/$resultadosUsabilidade[7],2);?>,
                    <?php echo round((100*$resultadosUsabilidade[2])/$resultadosUsabilidade[7],2);?>,
                    <?php echo round((100*$resultadosUsabilidade[3])/$resultadosUsabilidade[7],2);?>,
                    <?php echo round((100*$resultadosUsabilidade[4])/$resultadosUsabilidade[7],2);?>,
                    <?php echo round((100*$resultadosUsabilidade[5])/$resultadosUsabilidade[7],2);?>,
                    <?php echo round((100*$resultadosUsabilidade[6])/$resultadosUsabilidade[7],2);?>],
                backgroundColor: [
                    "#00d2d3",
                    "#54a0ff",
                    "#5f27cd",
                    "#c8d6e5",
                    "#576574",
                    "#f368e0",
                    "#ff9f43"
                ]
            }]
    };

    var usabilidadeChart = new Chart(usabilidadeCanvas, {
        type: 'horizontalBar',
        data: usabilidadeData,
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
