<?php 
$resultadosClassPRUs = $controle->obterResultadosClassPRUs($idAvalicao);
?>

<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por PRU e Não-PRU</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table">
                    <table class="table table-hover no-margin text-center">
                        <thead>
                            <tr>
                              <th>Classificação</th>
                              <th>Quantidade</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>PRU</td>
                              <td><?php echo $resultadosClassPRUs[0][0];?></td>
                              <td><?php echo round((100*$resultadosClassPRUs[0][0])/($resultadosClassPRUs[0][0] + $resultadosClassPRUs[1][0]),2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Não-PRU</td>
                              <td><?php echo $resultadosClassPRUs[1][0];?></td>
                              <td><?php echo round((100*$resultadosClassPRUs[1][0])/($resultadosClassPRUs[0][0] + $resultadosClassPRUs[1][0]),2) . "%"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="chartPRUs" width="600" height="350"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var prusCanvas = document.getElementById("chartPRUs");
    Chart.defaults.global.defaultFontSize = 16;

    var prusData = {
        labels: [
            "PRU",
            "Não-PRU"
        ],
        datasets: [
            {
                data: [<?php echo $resultadosClassPRUs[0][0]; ?>,
                    <?php echo $resultadosClassPRUs[1][0]; ?>],
                backgroundColor: [
                    "#1e90ff",
                    "#ffa502"
                ]
            }]
    };

    var prusChart = new Chart(prusCanvas, {
      type: 'doughnut',
      data: prusData
    });
</script>
