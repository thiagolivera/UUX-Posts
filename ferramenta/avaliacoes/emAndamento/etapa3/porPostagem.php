<?php 
    $postagem = $controle->obterUmaPostagemNaoClassificada($idAvalicao, $_SESSION["login"]);
    if(count($postagem) == 0){
        ?>
        <script>
            window.location.href = "fimClassificacao.php";
        </script>
        <?php
    }
?>

<div id="classificacaoPorPostagem">
    <div class="box box-body center-block" style="width: 95%; font-size: 16px">
        <div style="float: left;">
            <p>Postagem <?php echo $postagem[0]["idPostagem"]; ?></p>
        </div>
        <br><br>
        <p style="text-align: center; font-style: italic">"<?php echo $postagem[0]["postagem"]; ?>"</p>
        <div style="float: right;">
            <p><?php echo $postagem[0]["data"]; ?></p>
        </div>
    </div>

    <div>
        <form class="form-horizontal" method="POST" id="classificacao" action="salvarClassificacaoControle.php">
            <input type="hidden" name="idPostagem" value="<?php echo $postagem[0]["idPostagem"]; ?>">
            <input type="hidden" name="idAvaliacao" value="<?php echo $idAvalicao; ?>">
            
            <div class="form-group col-sm-4">
                <label class="col-sm-6 control-label">Classificação por PRU <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                <div class="col-sm-6">
                    <input type="hidden" name="pru">
                    <label style="font-weight: 500;">
                        <input type="radio" name="pru" value="1" onclick="postPRU()" required> PRU
                    </label>
                    <br>
                    <label style="font-weight: 500;">
                        <input type="radio" name="pru" value="0" onclick="postNaoPRU()"> Não-PRU
                    </label>
                    <br>
                </div>
            </div>
            
            <?php 
                if(strcmp($categoriasClassificacao[0]["funcionalidade"], '1') == '0'){
                    ?>
                    <div class="row" id="classFuncionalidade">
                        <div class="form-group col-sm-12">
                            <label for="funcionalidades" class="col-sm-2 control-label">Classificação por funcionalidade</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="funcionalidades" name="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                
        ?>  <div class="row" id="categoriasClass"> <?php
                if(strcmp($categoriasClassificacao[0]["tipo"], '1') == '0'){
                    ?>
                    <div class="form-group col-sm-4">
                        <label class="col-sm-6 control-label">Classificação por tipo <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="tipo">
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="critica" id="critica" class="abc" onclick="deRequireCb('abc')" required> Crítica
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="elogio"id="elogio" class="abc" onclick="deRequireCb('abc')" required> Elogio
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="duvida" id="duvida" class="abc" onclick="deRequireCb('abc')" required> Dúvida
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="comparacao" id="comparacao" class="abc" onclick="deRequireCb('abc')" required> Comparação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="sugestao" id="sugestao" class="abc" onclick="deRequireCb('abc')" required> Sugestão
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="ajuda" id="ajuda" class="abc" onclick="deRequireCb('abc')" required> Ajuda
                            </label>
                            <br>
                        </div>
                    </div>
                    <?php
                } if(strcmp($categoriasClassificacao[0]["intencao"], '1') == '0'){
                    ?>
                    <div class="form-group col-sm-4">
                        <label class="col-sm-6 control-label">Classificação por intenção <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="intencao">
                            <label style="font-weight: 500;">
                                <input type="radio" name="intencao" id="visceral" value="Visceral" required> Visceral
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="intencao" value="Comportamental"> Comportamental
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="intencao" value="Reflexiva"> Reflexiva
                            </label>
                            <br>
                        </div>
                    </div>
                    <?php
                } if(strcmp($categoriasClassificacao[0]["analiseSentimentos"], '1') == '0'){
                    ?>
                    <div class="form-group col-sm-4">
                        <label class="col-sm-6 control-label">Classificação por análise de sentimentos <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="sentimentos">
                            <label style="font-weight: 500;">
                                <input type="radio" name="sentimentos" id="positiva" value="Positiva" required> Positiva
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="sentimentos" value="Negativa"> Negativa
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="sentimentos" value="Neutra"> Neutra
                            </label>
                            <br>
                        </div>
                    </div>
                    <?php
                } if(strcmp($categoriasClassificacao[0]["usabilidade"], '1') == '0'){
                    ?> 
                    <div class="form-group col-sm-4">
                        <label for="nome" class="col-sm-6 control-label">Classificação por facetas de Usabilidade <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="usabilidade">
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="eficacia" class="abcU" id="eficacia" onclick="deRequireCb('abcU')" required> Eficácia
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="eficiencia" class="abcU" id="eficiencia" onclick="deRequireCb('abcU')" required> Eficiência
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="satisfacao" class="abcU" id="satisfacao" onclick="deRequireCb('abcU')" required> Satisfação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="seguranca" class="abcU" id="seguranca" onclick="deRequireCb('abcU')" required> Segurança
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="utilidade" class="abcU" id="utilidade" onclick="deRequireCb('abcU')" required> Utilidade
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="memorabilidade" class="abcU" id="memorabilidade" onclick="deRequireCb('abcU')" required> Memorabilidade
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="aprendizado" class="abcU" id="aprendizado" onclick="deRequireCb('abcU')" required> Aprendizado
                            </label>
                            <br>
                        </div>
                    </div>
                        <?php
                } if(strcmp($categoriasClassificacao[0]["ux"], '1') == '0'){
                    ?>
                    <div class="form-group col-sm-4 checkbox-group required">
                        <label for="nome" class="col-sm-6 control-label">Classificação por facetas de Experiência do Usuário <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="ux">
                            <label style="font-weight: 500;">
                                <input class="abcU" type="checkbox" name="afeto" id="afeto" onclick="deRequireCb('abcU')" required> Afeto
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcU" type="checkbox" name="estetica" id="estetica" onclick="deRequireCb('abcU')" required> Estética
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcU" type="checkbox" name="frustracao" id="frustracao" onclick="deRequireCb('abcU')" required> Frustração
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcU" type="checkbox" name="satisfacao" id="satisfacao-ux" onclick="deRequireCb('abcU')" required> Satisfação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcU" type="checkbox" name="motivacao" id="motivacao" onclick="deRequireCb('abcU')" required> Motivação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcU" type="checkbox" name="suporte" id="suporte" onclick="deRequireCb('abcU')" required> Suporte
                            </label>
                            <br>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            
            <?php if(strcmp($categoriasClassificacao[0]["artefato"], '1') == '0'){
                ?>
                <div class="row" id="classArtefato">
                    <div class="form-group col-sm-12">
                        <label for="artefato" class="col-sm-2 control-label">Classificação por artefato</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="artefato" name="artefato" placeholder="Ex.: iPhone X">
                        </div>
                    </div>
                </div>
                <?php
            } ?>
    </div>
</div>

<div id="espacos" style="display: none"><br><br><br><br></div>
<div class="row" style="padding-top: 20px">
    <div class="col-sm-3" style="padding-bottom: 10px; display: none">
        <button class="btn btn-primary center-block disabled"><i class="fa fa-star"></i> Marcar como favorita</button>
    </div>
    
    <div class="col-sm-3" style="padding-bottom: 10px; display: none">
        <button class="btn btn-warning center-block disabled"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
    </div>

    <div class="col-sm-6" style="padding-bottom: 10px;">
        <button class="btn btn-info" type="submit" style="float: right">Salvar e próximo</button>
    </div>
    </form>
</div>

<script>
    function deRequireCb(elClass) {
        el=document.getElementsByClassName(elClass);

        var atLeastOneChecked=false;//at least one cb is checked
        for (i=0; i<el.length; i++) {
            if (el[i].checked === true) {
                atLeastOneChecked=true;
            }
        }

        if (atLeastOneChecked === true) {
            for (i=0; i<el.length; i++) {
                el[i].required = false;
            }
        } else {
            for (i=0; i<el.length; i++) {
                el[i].required = true;
            }
        }
    }
    
    function postPRU(){
        document.getElementById('categoriasClass').style.display = 'block';
        document.getElementById('classFuncionalidade').style.display = 'block';
        document.getElementById('classArtefato').style.display = 'block';
        document.getElementById('espacos').style.display = 'none';
        
        document.getElementById('critica').required = true;
        document.getElementById('elogio').required = true;
        document.getElementById('duvida').required = true;
        document.getElementById('comparacao').required = true;
        document.getElementById('sugestao').required = true;
        document.getElementById('ajuda').required = true;
        document.getElementById('visceral').required = true;
        document.getElementById('positiva').required = true;
        
        document.getElementById('eficacia').required = true;
        document.getElementById('eficiencia').required = true;
        document.getElementById('satisfacao').required = true;
        document.getElementById('seguranca').required = true;
        document.getElementById('utilidade').required = true;
        document.getElementById('memorabilidade').required = true;
        document.getElementById('aprendizado').required = true;
        document.getElementById('afeto').required = true;
        document.getElementById('estetica').required = true;
        document.getElementById('frustracao').required = true;
        document.getElementById('satisfacao-ux').required = true;
        document.getElementById('motivacao').required = true;
        document.getElementById('suporte').required = true;
    }
    function postNaoPRU(){
        document.getElementById('categoriasClass').style.display = 'none';
        document.getElementById('classFuncionalidade').style.display = 'none';
        document.getElementById('classArtefato').style.display = 'none';
        document.getElementById('espacos').style.display = 'block';
        
        document.getElementById('critica').required = false;
        document.getElementById('elogio').required = false;
        document.getElementById('duvida').required = false;
        document.getElementById('comparacao').required = false;
        document.getElementById('sugestao').required = false;
        document.getElementById('ajuda').required = false;
        document.getElementById('visceral').required = false;
        document.getElementById('positiva').required = false;
        
        document.getElementById('eficacia').required = false;
        document.getElementById('eficiencia').required = false;
        document.getElementById('satisfacao').required = false;
        document.getElementById('seguranca').required = false;
        document.getElementById('utilidade').required = false;
        document.getElementById('memorabilidade').required = false;
        document.getElementById('aprendizado').required = false;
        document.getElementById('afeto').required = false;
        document.getElementById('estetica').required = false;
        document.getElementById('frustracao').required = false;
        document.getElementById('satisfacao-ux').required = false;
        document.getElementById('motivacao').required = false;
        document.getElementById('suporte').required = false;
        
    }
</script>