<?php 
    $postagem = $controle->obterUmaPostagemNaoClassificada($idAvalicao);
    $categoriasClassificacao = $controle->obterCategoriasAvaliacao($idAvalicao);
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
            <?php 
                if(strcmp($categoriasClassificacao[0]["funcionalidade"], '1') == '0'){
                    ?>
                    <div class="row">
                        <div class="form-group col-sm-12">
                            <label for="funcionalidades" class="col-sm-2 control-label">Classificação por funcionalidade</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="funcionalidades" name="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                
        ?>  <div class="row"> <?php
                if(strcmp($categoriasClassificacao[0]["tipo"], '1') == '0'){
                    ?>
                    <div class="form-group col-sm-4">
                        <label class="col-sm-6 control-label">Classificação por tipo <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                        <div class="col-sm-6">
                            <input type="hidden" name="tipo">
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="critica" class="abc" onclick="deRequireCb('abc')" required> Crítica
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="elogio" class="abc" onclick="deRequireCb('abc')" required> Elogio
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="duvida" class="abc" onclick="deRequireCb('abc')" required> Dúvida
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="comparacao" class="abc" onclick="deRequireCb('abc')" required> Comparação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="sugestao" class="abc" onclick="deRequireCb('abc')" required> Sugestão
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="ajuda" class="abc" onclick="deRequireCb('abc')" required> Ajuda
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
                                <input type="radio" name="intencao" value="Visceral" required class="minimal"> Visceral
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="intencao" value="Comportamental" class="minimal"> Comportamental
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="intencao" value="Reflexiva" class="minimal"> Reflexiva
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
                                <input type="radio" name="sentimentos" value="Positiva" required class="minimal"> Positiva
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="sentimentos" value="Negativa" class="minimal"> Negativa
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="radio" name="sentimentos" value="Neutra" class="minimal"> Neutra
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
                                <input type="checkbox" name="eficacia" class="abcU" onclick="deRequireCb('abcU')" required> Eficácia
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="eficiencia" class="abcU" onclick="deRequireCb('abcU')" required> Eficiência
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="satisfacao" class="abcU" onclick="deRequireCb('abcU')" required> Satisfação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="seguranca" class="abcU" onclick="deRequireCb('abcU')" required> Segurança
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="utilidade" class="abcU" onclick="deRequireCb('abcU')" required> Utilidade
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="memorabilidade" class="abcU" onclick="deRequireCb('abcU')" required> Memorabilidade
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input type="checkbox" name="aprendizado" class="abcU" onclick="deRequireCb('abcU')" required> Aprendizado
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
                                <input class="abcUX" type="checkbox" name="afeto" onclick="deRequireCb('abcUX')" required> Afeto
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcUX" type="checkbox" name="estetica" onclick="deRequireCb('abcUX')" required> Estética
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcUX" type="checkbox" name="frustracao" onclick="deRequireCb('abcUX')" required> Frustração
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcUX" type="checkbox" name="satisfacao" onclick="deRequireCb('abcUX')" required> Satisfação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcUX" type="checkbox" name="motivacao" onclick="deRequireCb('abcUX')" required> Motivação
                            </label>
                            <br>
                            <label style="font-weight: 500;">
                                <input class="abcUX" type="checkbox" name="suporte" onclick="deRequireCb('abcUX')" required> Suporte
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
                <div class="row">
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


<div class="row" style="padding-top: 20px">
    <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="voltar()" style="margin-right: 10px;">Voltar</button>
    </div>
    
    <div class="col-sm-3" style="padding-bottom: 10px;">
        <button class="btn btn-primary center-block disabled"><i class="fa fa-star"></i> Marcar como favorita</button>
    </div>
    
    <div class="col-sm-3" style="padding-bottom: 10px;">
        <button class="btn btn-warning center-block disabled"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
    </div>

    <div class="col-sm-3" style="padding-bottom: 10px; float: right;">
        <button class="btn btn-info center-block" type="submit">Salvar e próximo</button>
    </div>
    </form>
</div>

<script>
    function voltar(){
        window.location.href = "introEtapa3.php";
    }
    
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
</script>