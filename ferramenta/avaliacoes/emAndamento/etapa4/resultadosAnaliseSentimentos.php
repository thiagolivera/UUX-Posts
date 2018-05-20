<?php 
$resultadosSentimentos = $controle->obterResultadosSentimentos($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por Análise de Sentimentos</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table">
                    <table class="table table-hover no-margin text-center">
                        <thead>
                            <tr>
                              <th>Polaridade</th>
                              <th>Quantidade</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Positiva</td>
                              <td><?php echo $resultadosSentimentos[0][0];?></td>
                              <td><?php echo round((100*$resultadosSentimentos[0][0])/$resultadosSentimentos[3][0],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Neutra</td>
                              <td><?php echo $resultadosSentimentos[1][0];?></td>
                              <td><?php echo round((100*$resultadosSentimentos[1][0])/$resultadosSentimentos[3][0],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Negativa</td>
                              <td><?php echo $resultadosSentimentos[2][0];?></td>
                              <td><?php echo round((100*$resultadosSentimentos[2][0])/$resultadosSentimentos[3][0],2) . "%"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="chartSentimentos" width="600" height="350"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var sentimentosCanvas = document.getElementById("chartSentimentos");
    Chart.defaults.global.defaultFontSize = 16;

    var sentimentosData = {
        labels: [
            "Positiva",
            "Neutra",
            "Negativa"
        ],
        datasets: [
            {
                data: [<?php echo round((100*$resultadosSentimentos[0][0])/$resultadosSentimentos[3][0],2); ?>,
                    <?php echo round((100*$resultadosSentimentos[1][0])/$resultadosSentimentos[3][0],2); ?>,
                    <?php echo round((100*$resultadosSentimentos[2][0])/$resultadosSentimentos[3][0],2); ?>],
                backgroundColor: [
                    "#05c46b",
                    "#BEC5CC",
                    "#ff3838"
                ]
            }]
    };

    var sentimentosChart = new Chart(sentimentosCanvas, {
      type: 'doughnut',
      data: sentimentosData
    });
</script>
