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
                              <th>Número de Citações</th>
                              <th>Porcentagem (%)</th>
                            </tr>
                        </thead>
                      
                        <tbody>
                            <tr>
                              <td>Eficácia</td>
                              <td>118</td>
                              <td>62.76%</td>
                            </tr>
                            <tr>
                              <td>Eficiência</td>
                              <td>7</td>
                              <td>3.72%</td>
                            </tr>
                            <tr>
                              <td>Satisfação</td>
                              <td>5</td>
                              <td>2.65%</td>
                            </tr>
                            <tr>
                              <td>Segurança</td>
                              <td>2</td>
                              <td>1.06%</td>
                            </tr>
                            <tr>
                              <td>Utilidade</td>
                              <td>41</td>
                              <td>21.80%</td>
                            </tr>
                            <tr>
                              <td>Memorabilidade</td>
                              <td>1</td>
                              <td>0.53%</td>
                            </tr>
                            <tr>
                              <td>Aprendizado</td>
                              <td>5</td>
                              <td>2.65%</td>
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
                data: [62.76, 3.72, 2.65, 1.06, 21.80, 0.53, 2.65],
                backgroundColor: [
                    "#7BF947",
                    "#FBFF7F",
                    "#CC4B47",
                    "#7BF947",
                    "#FBFF7F",
                    "#CC4B47",
                    "#CC4B47"
                ]
            }]
    };

    var usabilidadeChart = new Chart(usabilidadeCanvas, {
      type: 'horizontalBar',
      data: usabilidadeData,
    });
</script>
