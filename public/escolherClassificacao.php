
<div class="box box-solid">
        <div id="escolhaSite">
            <div class="box-body">
                <div class="form-group">
                    <h4 class="box-title" style="padding-bottom: 10px;">Escolha os padrões de extração</h4>

                    <div class="nav-tabs-custom">
                        <ul class="nav nav-pills nav-fill mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="pill" href="#tab_1" role="tab" aria-controls="pills-gramaticais" aria-selected="true">Padrões gramaticais</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#tab_2" role="tab" aria-controls="pills-tiposPRU" aria-selected="false">Tipos de PRU</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#tab_3" role="tab" aria-controls="pills-contact" aria-selected="false">Facetas de UUX</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="pill" href="#tab_4" role="tab" aria-controls="pills-contact" aria-selected="false">Padrões personalizados</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane active" id="tab_1">
                                <form action="./classificacaoPosts.php?resultado" method="post">
                                    <ul class="list-group">
                                        <li class="list-group-item" id="verbos" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="verbos" style="display: none;"/>		
                                              Verbos
                                        </li>

                                        <li class="list-group-item" id="substantivos" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="substantivos" style="display: none;"/>		
                                              Substantivos
                                        </li>

                                        <li class="list-group-item" id="adjetivos" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="adjetivos" style="display: none;"/>		
                                              Adjetivos
                                        </li>

                                        <li class="list-group-item" id="adverbios" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="adverbios" style="display: none;"/>			
                                              Advérbios
                                        </li>
                                    </ul>

                                    <div id="extrairAuto" style="float: right; padding-top: 20px;">
                                        <button type="submit" class="btn btn-info" style="margin-right: 10px;">Classificar postagens</button>
                                    </div>

                                    <div id="voltarExtrair" style="float: left; padding-top: 20px;">
                                        <button type="button" class="btn btn-info" onclick="voltar()" style="margin-left: 10px;">Voltar</button>
                                    </div>
                                </form>
                            </div>
                          <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_2">
                                <form action="./classificacaoPosts.php?resultado" method="post">
                                    <ul class="list-group">
                                        <li class="list-group-item" id="elogio" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="elogio" style="display: none;"/>		
                                              Elogio
                                        </li>

                                        <li class="list-group-item" id="critica" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="critica" style="display: none;"/>		
                                              Crítica
                                        </li>

                                        <li class="list-group-item" id="duvida" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="duvida" style="display: none;"/>		
                                              Dúvida
                                        </li>

                                        <li class="list-group-item" id="comparacao" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="comparacao" style="display: none;"/>			
                                              Comparação
                                        </li>

                                        <li class="list-group-item" id="sugestao" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="sugestao" style="display: none;"/>		
                                              Sugestão
                                        </li>
                                    </ul>
                                    <div id="extrairAuto" style="float: right; padding-top: 20px; display: block">
                                        <button type="submit" class="btn btn-info" style="margin-right: 10px;">Classificar postagens</button>
                                    </div>

                                    <div id="voltarExtrair" style="float: left; padding-top: 20px; display: block">
                                        <button type="button" class="btn btn-info" onclick="voltar()" style="margin-left: 10px;">Voltar</button>
                                    </div>
                                </form>
                            </div>
                          <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3">
                                <form action="./classificacaoPosts.php?resultado" method="post">
                                    <ul class="list-group">
                                        <li class="list-group-item" id="eficacia" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="eficacia" style="display: none;"/>		
                                              Eficácia
                                        </li>

                                        <li class="list-group-item" id="eficiencia" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="eficiencia" style="display: none;"/>		
                                              Eficiência
                                        </li>

                                        <li class="list-group-item" id="seguranca" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="seguranca" style="display: none;"/>		
                                              Segurança
                                        </li>

                                        <li class="list-group-item" id="utilidade" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="utilidade" style="display: none;"/>			
                                              Utilidade
                                        </li>

                                        <li class="list-group-item" id="aprendizado" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="aprendizado" style="display: none;"/>		
                                              Aprendizado
                                        </li>

                                        <li class="list-group-item" id="afeto" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="afeto" style="display: none;"/>		
                                              Afeto
                                        </li>

                                        <li class="list-group-item" id="confianca" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="confianca" style="display: none;"/>		
                                              Confiança
                                        </li>

                                        <li class="list-group-item" id="estetica" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="estetica" style="display: none;"/>		
                                              Estética
                                        </li>

                                        <li class="list-group-item" id="frustracao" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="frustracao" style="display: none;"/>		
                                              Frustração
                                        </li>

                                        <li class="list-group-item" id="motivacao" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="motivacao" style="display: none;"/>		
                                              Motivação
                                        </li>

                                        <li class="list-group-item" id="suporte" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="suporte" style="display: none;"/>		
                                              Suporte
                                        </li>

                                        <li class="list-group-item" id="satisfacao" onclick="selecionaItem(this)">
                                              <input type="checkbox" name="satisfacao" style="display: none;"/>		
                                              Satisfação
                                        </li>
                                    </ul>
                                    <div id="extrairAuto" style="float: right; padding-top: 20px; display: block">
                                        <button type="submit" class="btn btn-info" style="margin-right: 10px;">Classificar postagens</button>
                                    </div>

                                    <div id="voltarExtrair" style="float: left; padding-top: 20px; display: block">
                                        <button type="button" class="btn btn-info" onclick="voltar()" style="margin-left: 10px;">Voltar</button>
                                    </div>
                                </form>
                            </div>
                          <!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_4">
                                <form action="./classificacaoPosts.php?resultado" method="post">   
                                    <div class="form-group row">
                                        <input type="text" class="form-control" id="exampleInputEmail1" required="required" name="padroesPersonalizados" aria-describedby="emailHelp" placeholder="Separe-os por vírgula">
                                        <small id="emailHelp" class="form-text text-muted"><label class="control-label">Exemplo de padrões personalizados: </label> twitter ficar, twitter entrar, twitter aqui, twitter querer, twitter porque, twitter tão, twitter mal, twitter chato</small>
                                    </div>

                                    <div id="extrairAuto" style="float: right; padding-top: 20px; display: block">
                                        <button type="submit" class="btn btn-info" style="margin-right: 10px;">Classificar postagens</button>
                                    </div>

                                    <div id="voltarExtrair" style="float: left; padding-top: 20px; display: block">
                                        <button type="button" class="btn btn-info" onclick="voltar()" style="margin-left: 10px;">Voltar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


<script>
    var div = document.getElementsByClassName("botaoArquivo")[0];
    var input = document.getElementById("fileUpload");

    div.addEventListener("click", function(){
        input.click();
    });
    
    input.addEventListener("change", function(){
        var nome = " <i class=\"fa fa-paperclip\"></i> Escolher arquivo CSV";
        if(input.files.length > 0) nome = input.files[0].name;
        div.innerHTML = nome;
    });
    
    function abrirEnvioPlanilha(){
        document.getElementById('envioPlanilha').style.display = 'block';
        document.getElementById('btnVoltar').style.display = 'block';
        document.getElementById('btnSalvar').style.display = 'block';
        document.getElementById('escolhaForma').style.display = 'none';
        document.getElementById('btnVoltarExt').style.display = 'none';
    }
    
    function voltar(){
        window.location.href = "../extrairPosts.php";
    }
    
    function voltarExt(){
        window.location.href = "introEtapa2.php";
    }
    
    function selecionaItem(item){
        var id_item = item.id;
        checkbox = item.getElementsByTagName("input")[0];
        item = document.getElementById(id_item);
        if(checkbox.checked){
                checkbox.checked = false;
                item.classList.remove("active");
        } else {
                checkbox.checked = true;
                item.classList.add("active");
        }
    }
</script>