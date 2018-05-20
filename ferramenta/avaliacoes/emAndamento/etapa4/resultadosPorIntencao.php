<?php 
$resultadosIntencao = $controle->obterResultadosIntencao($idAvalicao);
?>
<div class="box box-default">
    <div class="box-header with-border">
        <h3 class="box-title">Classificação por Intenção</h3>
    </div>

    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="table">
                    <table class="table table-hover no-margin text-center">
                        <thead>
                            <tr>
                              <th>Intenção</th>
                              <th>Quantidade</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Visceral</td>
                              <td><?php echo $resultadosIntencao[0][0];?></td>
                              <td><?php echo round((100*$resultadosIntencao[0][0])/$resultadosIntencao[3][0],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Comportamental</td>
                              <td><?php echo $resultadosIntencao[1][0];?></td>
                              <td><?php echo round((100*$resultadosIntencao[1][0])/$resultadosIntencao[3][0],2) . "%"; ?></td>
                            </tr>
                            <tr>
                              <td>Reflexiva</td>
                              <td><?php echo $resultadosIntencao[2][0];?></td>
                              <td><?php echo round((100*$resultadosIntencao[2][0])/$resultadosIntencao[3][0],2) . "%"; ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <canvas id="chartIntencao" width="600" height="350"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
    var intencaoCanvas = document.getElementById("chartIntencao");
    Chart.defaults.global.defaultFontSize = 16;

    var intencaoData = {
        labels: [
            "Visceral",
            "Comportamental",
            "Reflexiva"
        ],
        datasets: [
            {
                data: [<?php echo round((100*$resultadosIntencao[0][0])/$resultadosIntencao[3][0],2); ?>,
                    <?php echo round((100*$resultadosIntencao[1][0])/$resultadosIntencao[3][0],2); ?>,
                    <?php echo round((100*$resultadosIntencao[2][0])/$resultadosIntencao[3][0],2); ?>],
                backgroundColor: [
                    "#1e90ff",
                    "#ffa502",
                    "#a4b0be"
                ]
            }]
    };

    var intencaoChart = new Chart(intencaoCanvas, {
      type: 'doughnut',
      data: intencaoData
    });
</script>
