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
                              <th>Número de Citações</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Afeto</td>
                              <td>0</td>
                              <td>0%</td>
                            </tr>
                            <tr>
                              <td>Estética</td>
                              <td>2</td>
                              <td>1.06%</td>
                            </tr>
                            <tr>
                              <td>Frustração</td>
                              <td>58</td>
                              <td>31.01%</td>
                            </tr>
                            <tr>
                              <td>Satisfação</td>
                              <td>5</td>
                              <td>2.67%</td>
                            </tr>
                            <tr>
                              <td>Motivação</td>
                              <td>0</td>
                              <td>0%</td>
                            </tr>
                            <tr>
                              <td>Suporte</td>
                              <td>35</td>
                              <td>18.71%</td>
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
                data: [50, 50, 50, 50, 50, 50],
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
