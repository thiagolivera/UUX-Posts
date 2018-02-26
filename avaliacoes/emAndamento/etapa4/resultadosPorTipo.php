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
                              <th>Número de Citações</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Crítica</td>
                              <td>86</td>
                              <td>76.1%</td>
                            </tr>
                            <tr>
                              <td>Elogio</td>
                              <td>6</td>
                              <td>5.3%</td>
                            </tr>
                            <tr>
                              <td>Dúvida</td>
                              <td>19</td>
                              <td>16.8%</td>
                            </tr>
                            <tr>
                              <td>Comparação</td>
                              <td>0</td>
                              <td>0%</td>
                            </tr>
                            <tr>
                              <td>Sugestão</td>
                              <td>2</td>
                              <td>1.8%</td>
                            </tr>
                            <tr>
                              <td>Ajuda</td>
                              <td>0</td>
                              <td>0%</td>
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
                data: [76.1, 53, 16.8,20 , 18, 10],
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
