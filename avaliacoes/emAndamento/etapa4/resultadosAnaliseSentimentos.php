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
                              <th>Número de Citações</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Positiva</td>
                              <td>86</td>
                              <td>60%</td>
                            </tr>
                            <tr>
                              <td>Neutra</td>
                              <td>6</td>
                              <td>10%</td>
                            </tr>
                            <tr>
                              <td>Negativa</td>
                              <td>19</td>
                              <td>30%</td>
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
                data: [60, 10, 30],
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
