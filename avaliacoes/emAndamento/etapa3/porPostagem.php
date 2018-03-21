<?php
include '../verificarSessao.class';
?>
<div id="classificacaoPorPostagem">
    <div class="box box-body center-block" style="width: 95%; font-size: 16px">
        <div style="float: left;">
            <p>Postagem 1205</p>
        </div>
        <div style="float: right;">
            <p><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i><i class="fa fa-star-o"></i></p>
        </div>
        <br><br>
        <p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
            que abro e começo a ouvir uma música aparece um aviso de que o app está
            apresentando falhas continuamente. Não consigo utilizar mais pelo 
            celular sem me irritar."</p>
        <div style="float: right;">
            <p>06 fev 2018</p>
        </div>
    </div>

    <div>
        <form class="form-horizontal" id="classificacao">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="nome" class="col-sm-2 control-label">Classificação por funcionalidade</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="nome" class="col-sm-6 control-label">Classificação por tipo <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                    <div class="col-sm-6">
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Crítica
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Elogio
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Dúvida
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Comparação
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Sugestão
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Ajuda
                        </label>
                        <br>
                    </div>
                </div>
                <div class="form-group col-sm-4">
                    <label for="nome" class="col-sm-6 control-label">Classificação por intenção <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                    <div class="col-sm-6">
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Visceral
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Comportamental
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Reflexiva
                        </label>
                        <br>
                    </div>
                </div>

                <div class="form-group col-sm-4">
                    <label for="nome" class="col-sm-6 control-label">Classificação por análise de sentimentos <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                    <div class="col-sm-6">
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Positiva
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Negativa
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Neutra
                        </label>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-4">
                    <label for="nome" class="col-sm-6 control-label">Classificação por facetas de Usabilidade <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                    <div class="col-sm-6">
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Eficácia
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Eficiência
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Satisfação
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Segurança
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Utilidade
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Memorabilidade
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Aprendizado
                        </label>
                        <br>
                    </div>
                </div>

                <div class="form-group col-sm-4">
                    <label for="nome" class="col-sm-6 control-label">Classificação por facetas de Experiência do Usuário <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></label>
                    <div class="col-sm-6">
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Afeto
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Estética
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Frustração
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Satisfação
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Motivação
                        </label>
                        <br>
                        <label style="font-weight: 500;">
                            <input type="checkbox" class="minimal"> Suporte
                        </label>
                        <br>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-sm-12">
                    <label for="nome" class="col-sm-2 control-label">Classificação por artefato</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div class="row" style="padding-top: 20px">
    <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="voltar()" style="margin-right: 10px;">Voltar</button>
    </div>
    
    <div class="col-sm-3" style="padding-bottom: 10px;">
        <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
    </div>
    
    <div class="col-sm-3" style="padding-bottom: 10px;">
        <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
    </div>

    <div class="col-sm-3" style="padding-bottom: 10px; float: right;">
        <button class="btn btn-info center-block" onclick="proximo()">Salvar e próximo</button>
    </div>
</div>

<script>
    function voltar(){
        window.location.href = "introEtapa3.php";
    }
</script>