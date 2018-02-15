<div id="classificacaoPorFuncionalidade">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR FUNCIONALIDADE  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="col-sm-6">Postagem</th>
                    <th class="col-sm-6">Funcionalidade</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                        que abro e começo a ouvir uma música aparece um aviso de que o app está
                        apresentando falhas continuamente. Não consigo utilizar mais pelo 
                        celular sem me irritar."</p></td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td id="tipo"><textarea class="form-control" id="funcionalidades" placeholder="Qual/quais funcionalidade(s) do sistema foi/foram citada(s) na postagem?"></textarea></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div class="col-sm-4" style="padding-bottom: 10px;">
            <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
        </div>

        <div class="col-sm-4" style="padding-bottom: 10px;">
            <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
        </div>

        <div class="col-sm-4" style="padding-bottom: 10px;">
            <button class="btn btn-info center-block" onclick="abrirClassTipo()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorTipo" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR TIPO  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Crítica</th>
                    <th>Elogio</th>
                    <th>Dúvida</th>
                    <th>Comparação</th>
                    <th>Sugestão</th>
                    <th>Ajuda</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td id="tipo"><input id="critica1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td id="tipo"><input id="critica" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="elogio" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="duvida" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comparacao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="sugestao" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="ajuda" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassFunc()" style="margin-right: 10px;">Voltar</button>
        </div>
        
        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-info center-block" onclick="abrirClassIntencao()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorIntencao" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR INTENÇÃO  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Visceral</th>
                    <th>Comportamental</th>
                    <th>Reflexiva</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td id="tipo"><input id="visceral1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td id="tipo"><input id="visceral2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td id="tipo"><input id="visceral3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td id="tipo"><input id="visceral4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td id="tipo"><input id="visceral5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="comportamental5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="reflexiva5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassTipo()" style="margin-right: 10px;">Voltar</button>
        </div>
        
        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-info center-block" onclick="abrirClassAnaliseSentimentos()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorAnaliseSentimentos" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR ANÁLISE DE SENTIMENTOS  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Positiva</th>
                    <th>Neutra</th>
                    <th>Negativa</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td id="tipo"><input id="positiva1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td id="tipo"><input id="positiva2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td id="tipo"><input id="positiva3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td id="tipo"><input id="positiva4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td id="tipo"><input id="positiva5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="neutra5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="negativa5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassIntencao()" style="margin-right: 10px;">Voltar</button>
        </div>
        
        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-info center-block" onclick="abrirClassUsabilidade()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorFacetasUsabilidade" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR CRITÉRIOS DE QUALIDADE DE USO (USABILIDADE)  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Eficácia</th>
                    <th>Eficiência</th>
                    <th>Satisfação</th>
                    <th>Segurança</th>
                    <th>Utilidade</th>
                    <th>Memorabilidade</th>
                    <th>Aprendizado</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td id="tipo"><input id="eficacia1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td id="tipo"><input id="eficacia2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td id="tipo"><input id="eficacia3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td id="tipo"><input id="eficacia4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td id="tipo"><input id="eficacia5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="eficiencia5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="seguranca5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="utilidade5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="memorabilidade5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="aprendizado5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassAnaliseSentimentos()" style="margin-right: 10px;">Voltar</button>
        </div>
        
        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-info center-block" onclick="abrirClassUX()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorFacetasUX" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR CRITÉRIOS DE QUALIDADE DE USO (EXPERIÊNCIA DO USUÁRIO)  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th>Postagem</th>
                    <th>Afeto</th>
                    <th>Estética</th>
                    <th>Frustração</th>
                    <th>Satisfação</th>
                    <th>Motivação</th>
                    <th>Suporte</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                    que abro e começo a ouvir uma música aparece um aviso de que o app está
                    apresentando falhas continuamente. Não consigo utilizar mais pelo 
                    celular sem me irritar."</p></td>
                    <td id="tipo"><input id="afeto1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao1" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte1" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td id="tipo"><input id="afeto2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao2" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte2" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td id="tipo"><input id="afeto3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao3" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte3" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td id="tipo"><input id="afeto4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao4" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte4" type="checkbox" class="minimal"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td id="tipo"><input id="afeto5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="estetica5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="frustracao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="satisfacao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="motivacao5" type="checkbox" class="minimal"></td>
                    <td id="tipo"><input id="suporte5" type="checkbox" class="minimal"></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassUsabilidade()" style="margin-right: 10px;">Voltar</button>
        </div>
        
        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-info center-block" onclick="abrirClassArtefato()">Salvar e próximo</button>
        </div>
    </div>
</div>

<div id="classificacaoPorArtefato" style="display: none">
    <div class="table">
        <table class="table table-hover no-margin text-center">
            <thead>
                <tr>
                    <th colspan="7">CLASSIFICAÇÃO POR ARTEFATO  <a class="btn btn-sm btn-default"><i class="fa fa-question" aria-hidden="true"></i></a></th>
                </tr>
            </thead>
            <thead>
                <tr>
                    <th class="col-sm-6">Postagem</th>
                    <th class="col-sm-6">Artefato</th>
                </tr>
            </thead>
            <tbody>
                <tr id="post1">
                    <td><p style="text-align: center; font-style: italic">"O que está acontecendo com o app? Toda vez
                        que abro e começo a ouvir uma música aparece um aviso de que o app está
                        apresentando falhas continuamente. Não consigo utilizar mais pelo 
                        celular sem me irritar."</p></td>
                    <td id="post1-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Cansado desse aplicativo já... baixo minhas
                            músicas off line no cartão de memória.. toda vez que o aplicativo e atualizado ele muda pra
                            memória interna e perco todas as músicas que baixei tento que mudar pro externo e baixar tudo
                            novamente"</p></td>
                    <td id="post2-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"O deezer está concorrendo diretamente com vocês,
                            inclusive sai de graça em alguns planos em certas operadoras. Então embora seja bom, é sempre
                            interessante ficar atento a concorrência."</p></td>
                    <td id="post3-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Gostei muito! So não entendi até agora q paguei o
                            boleto ontem pra ser premium e ate agora não teve liberação, continuo em conta simples."</p></td>
                    <td id="post4-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
                  
                <tr>
                    <td><p style="text-align: center; font-style: italic">"Eu assinei o família Premium e ele diz que não
                            consegue comprovar que a minha própria esposa não mora comigo no mesmo endereço. Ta na hora de
                            cancelar então né. Não há sequer um fórum de ajuda ao cliente."</p></td>
                    <td id="post5-artefato"><input type="text" class="form-control" id="nome" placeholder="Ex.: iPhone X"></td>
                </tr>
            </tbody>
        </table>
    </div>
    
    <div class="row" style="padding-top: 20px">
        <div class="col-sm-3" id="btnVoltarClassTipo" style="float: left; padding-bottom: 10px;">
            <button class="btn btn-info" onclick="abrirClassUX()" style="margin-right: 10px;">Voltar</button>
        </div>
        
        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-primary center-block"><i class="fa fa-star"></i> Marcar como favorita</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-warning center-block"><i class="fa fa-question"></i> Pedir ajuda para classificar</button>
        </div>

        <div class="col-sm-3" style="padding-bottom: 10px;">
            <button class="btn btn-info center-block" onclick="proximo()">Salvar e próximo</button>
        </div>
    </div>
</div>

<script>
    function abrirClassFunc(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'block';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassTipo(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'block';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassIntencao(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'block';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassAnaliseSentimentos(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'block';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassUsabilidade(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'block';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassUX(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'block';
        document.getElementById('classificacaoPorArtefato').style.display = 'none';
    }
    
    function abrirClassArtefato(){
        document.getElementById('classificacaoPorFuncionalidade').style.display = 'none';
        document.getElementById('classificacaoPorTipo').style.display = 'none';
        document.getElementById('classificacaoPorIntencao').style.display = 'none';
        document.getElementById('classificacaoPorAnaliseSentimentos').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUsabilidade').style.display = 'none';
        document.getElementById('classificacaoPorFacetasUX').style.display = 'none';
        document.getElementById('classificacaoPorArtefato').style.display = 'block';
    }
</script>


<style>
    #tipo{
        vertical-align: middle;
    }
</style>