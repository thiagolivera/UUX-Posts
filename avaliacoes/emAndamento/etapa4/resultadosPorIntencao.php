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
                              <th>Número de Citações</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Visceral</td>
                              <td>86</td>
                              <td>30%</td>
                            </tr>
                            <tr>
                              <td>Comportamental</td>
                              <td>6</td>
                              <td>30%</td>
                            </tr>
                            <tr>
                              <td>Reflexiva</td>
                              <td>19</td>
                              <td>40%</td>
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
                data: [30, 30, 40],
                backgroundColor: [
                    "#B2B0A1",
                    "#7CF8FF",
                    "#FFE963"
                ]
            }]
    };

    var intencaoChart = new Chart(intencaoCanvas, {
      type: 'doughnut',
      data: intencaoData
    });
</script>
