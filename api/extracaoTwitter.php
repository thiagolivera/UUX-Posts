<?php
require_once './extracaoTwitter/buscaTwitter.php';

$stringBusca = ""; //variavel que guarda a string de busca de acordo com os padrões selecionados
$padroes = array(); //array que guarda os padroes utilizados para ser exibido na página

    if(count($_GET) > 0){
        if(isset($_GET["verbos"])){
            array_push($padroes, "Verbos");
            $stringBusca .= ' "twitter ter" OR "twitter dar" OR "twitter ficar" OR "twitter poder" OR "twitter fazer" OR "twitter dever" OR "twitter seguir" OR "twitter usar" OR "twitter querer" OR "twitter achar" OR "twitter saber" OR "twitter ver" OR "twitter entrar" OR "twitter existir" OR "twitter mudar" OR "twitter editar" OR "twitter deixar" OR "twitter falar" OR "twitter apagar" OR "twitter amar"';
        }
        if(isset($_GET["substantivos"])){
            array_push($padroes, "Substantivos");
            $stringBusca .= '"twitter facebook" OR "twitter tweet" OR "twitter face" OR "twitter orkut" OR "twitter erro" OR "twitter problema" OR "twitter sugestão" OR "twitter pessoa" OR "twitter botão" OR "twitter celular" OR "twitter app" OR "twitter gente" OR "twitter pagina" OR "twitter comentário" OR "twitter opção" OR "twitter caractere" OR "twitter conta" OR "twitter rede" OR "twitter aplicativo" OR "twitter following"';
        }
        if(isset($_GET["adjetivos"])){
            array_push($padroes, "Adjetivos");
            $stringBusca .= '"twitter bom" OR "twitter ruim" OR "twitter fácil" OR "twitter novo" OR "twitter direto" OR "twitter difícil" OR "twitter rápido" OR "twitter louco" OR "twitter maldito" OR "twitter triste" OR "twitter lento" OR "twitter confuso" OR "twitter perdido" OR "twitter lindo" OR "twitter legal" OR "twitter chato" OR "twitter feliz" OR "twitter querido" OR "twitter louco"';
        }
        if(isset($_GET["adverbios"])){
            array_push($padroes, "Advérbios");
            $stringBusca .= '"twitter não" OR "twitter mais" OR "twitter bem" OR "twitter porque" OR "twitter como" OR "twitter quando" OR "twitter nem" OR "twitter assim" OR "twitter mal" OR "twitter hoje" OR "twitter então" OR "twitter demais" OR "twitter algo" OR "twitter longe" OR "twitter onde" OR "twitter quando"';
        }

        //Tipos de PRU
        if(isset($_GET["elogio"])){
            array_push($padroes, "Elogio");
            $stringBusca .= '"twitter facebook" OR "twitter bem" OR "twitter bom" OR "twitter mais" OR "twitter ter" OR "twitter face" OR "twitter ficar" OR "twitter dar" OR "twitter celular" OR "twitter legal" OR "twitter adorar" OR "twitter gente"';
        }
        if(isset($_GET["critica"])){
            array_push($padroes, "Crítica");
            $stringBusca .= '"twitter mais" OR "twitter tweet" OR "twitter ficar" OR "twitter entrar" OR "twitter aqui" OR "twitter querer" OR "twitter porque" OR "twitter ir gostar" OR "twitter tão" OR "twitter mal" OR "twitter chato"';
        }
        if(isset($_GET["duvida"])){
            array_push($padroes, "Dúvida");
            $stringBusca .= '"twitter fazer" OR "twitter ruim" OR "twitter erro" OR "twitter dar" OR "twitter problema" OR "twitter tweet" OR "twitter saber" OR "twitter pagina" OR "twitter como" OR "twitter comentário" OR "twitter mais" OR "twitter aqui"';
        }
        if(isset($_GET["comparacao"])){
            array_push($padroes, "Comparação");
            $stringBusca .= '"twitter facebook" OR "twitter mais" OR "twitter face" OR "twitter orkut" OR "twitter bem" OR "twitter ir" OR "twitter bom" OR "twitter ter" OR "twitter usar" OR "twitter achar" OR "twitter ver" OR "twitter dia" OR "twitter ruim"';
        }
        if(isset($_GET["sugestao"])){
            array_push($padroes, "Sugestão");
            $stringBusca .= '"twitter ter" OR "twitter dever" OR "twitter tweet" OR "twitter sugestão" OR "twitter poder" OR "twitter mais" OR "twitter botão" OR "twitter seguir" OR "twitter dar" OR "twitter editar" OR "twitter ficar" OR "twitter querer" OR "twitter porque"';
        }

        //Facetas UUX
        if(isset($_GET["afeto"])){
            array_push($padroes, "Afeto");
            $stringBusca .= '"twitter gostar" OR "twitter rede" OR "twitter sistema" OR "twitter legal" OR "twitter adorar" OR "twitter amar" OR "twitter facebook" OR "twitter poder" OR "twitter comunicar" OR "twitter facilitar" OR "twitter criativo" OR "twitter eficiente" OR "twitter moderno" OR "twitter interessante" OR "twitter postar" OR "twitter existir" OR "twitter praticar" OR "twitter aproveitar" OR "twitter usufruir"';
        }
        if(isset($_GET["aprendizado"])){
            array_push($padroes, "Aprendizado");
            $stringBusca .= '"twitter saber" OR "twitter fazer" OR "twitter ver" OR "twitter ter" OR "twitter conseguir" OR "twitter poder" OR "twitter encontrar" OR "twitter aparecer" OR "twitter próximo" OR "twitter visualizar" OR "twitter clicar" OR "twitter achar" OR "twitter dizer" OR "twitter entender" OR "twitter entrar" OR "twitter informar" OR "twitter ajudar" OR "twitter novo" OR "twitter pagina" OR "twitter perder"';
        }
        if(isset($_GET["confianca"])){
            array_push($padroes, "Confiança");
            $stringBusca .= '"twitter sistema" OR "twitter parecer" OR "twitter fazer" OR "twitter gostar" OR "twitter praticar" OR "twitter interatividade" OR "twitter usar" OR "twitter poder" OR "twitter interessante" OR "twitter esperar" OR "twitter achar" OR "twitter acreditar" OR "twitter agradar" OR "twitter ajudar" OR "twitter apoio" OR "twitter resolver" OR "twitter melhorar" OR "twitter melhoria" OR "twitter começar"';
        }
        if(isset($_GET["eficacia"])){
            array_push($padroes, "Eficácia");
            $stringBusca .= '"twitter sistema" OR "twitter ter" OR "twitter fazer" OR "twitter problema" OR "twitter saber" OR "twitter conseguir" OR "twitter aparecer" OR "twitter poder" OR "twitter dar" OR "twitter ver" OR "twitter erro" OR "twitter dizer" OR "twitter ficar" OR "twitter querer" OR "twitter tentar" OR "twitter dever" OR "twitter ajuste" OR "twitter gostar" OR "twitter colocar" OR "twitter realizar"';
        }
        if(isset($_GET["eficiencia"])){
            array_push($padroes, "Eficiência");
            $stringBusca .= '"twitter ruim" OR "twitter ficar" OR "twitter lento" OR "twitter ver" OR "twitter dar" OR "twitter sistema" OR "twitter esperar" OR "twitter querer" OR "twitter carregar" OR "twitter erro" OR "twitter face" OR "twitter legal" OR "twitter fazer" OR "twitter problema" OR "twitter usar" OR "twitter achar" OR "twitter passar" OR "twitter aparecer" OR "twitter disciplina" OR "twitter pau"';
        }
        if(isset($_GET["estetica"])){
            array_push($padroes, "Estética");
            $stringBusca .= '"twitter gostar" OR "twitter parecer" OR "twitter ficar" OR "twitter bonito" OR "twitter plataforma" OR "twitter design" OR "twitter atualizar" OR "twitter android" OR "twitter limpo" OR "twitter perfeito" OR "twitter acostumar" OR "twitter pagina" OR "twitter melhoria" OR "twitter adorar" OR "twitter adaptar" OR "twitter add" OR "twitter campo" OR "twitter curtir" OR "twitter escrever" OR "twitter esquerdo"';
        }
        if(isset($_GET["frustracao"])){
            array_push($padroes, "Frustração");
            $stringBusca .= '"twitter ter" OR "twitter sistema" OR "twitter problema" OR "twitter fazer" OR "twitter ruim" OR "twitter saber" OR "twitter ficar" OR "twitter dar" OR "twitter poder" OR "twitter erro" OR "twitter ver" OR "twitter conseguir" OR "twitter querer" OR "twitter dizer" OR "twitter bug" OR "twitter aparecer" OR "twitter tempo" OR "twitter achar" OR "twitter mau" OR "twitter dever"';
        }
        if(isset($_GET["motivacao"])){
            array_push($padroes, "Motivação");
            $stringBusca .= '"twitter poder" OR "twitter adorar" OR "twitter desabafar" OR "twitter achar" OR "twitter criar" OR "twitter falar" OR "twitter ver" OR "twitter plataforma" OR "twitter social" OR "twitter saber" OR "twitter super" OR "twitter fazer" OR "twitter interatividade" OR "twitter usar" OR "twitter deixar" OR "twitter existir" OR "twitter amar" OR "twitter sistema" OR "twitter interessante" OR "twitter ajudar"';
        }
        if(isset($_GET["satisfacao"])){
            array_push($padroes, "Satisfação");
            $stringBusca .= '"twitter sistema" OR "twitter gostar" OR "twitter legal" OR "twitter achar" OR "twitter adorar" OR "twitter ter" OR "twitter face" OR "twitter facebook" OR "twitter demorar" OR "twitter parecer" OR "twitter poder" OR "twitter social" OR "twitter existir" OR "twitter ficar" OR "twitter entrar" OR "twitter interatividade" OR "twitter próximo" OR "twitter criar" OR "twitter amar" OR "twitter desabafar"';
        }
        if(isset($_GET["seguranca"])){
            array_push($padroes, "Segurança");
            $stringBusca .= '"twitter saber" OR "twitter sistema" OR "twitter começar" OR "twitter mau" OR "twitter fazer" OR "twitter dar" OR "twitter aparecer" OR "twitter errar" OR "twitter apertar" OR "twitter poder" OR "twitter ruim" OR "twitter erro" OR "twitter digitar" OR "twitter constar" OR "twitter faltar" OR "twitter lista" OR "twitter odiar" OR "twitter ver" OR "twitter ficar" OR "twitter querer"';
        }
        if(isset($_GET["suporte"])){
            array_push($padroes, "Suporte");
            $stringBusca .= '"twitter fazer" OR "twitter sistema" OR "twitter saber" OR "twitter preencher" OR "twitter ver" OR "twitter esperar" OR "twitter problema" OR "twitter solicitar" OR "twitter clicar" OR "twitter clique" OR "twitter consultar" OR "twitter providenciar" OR "twitter pedir" OR "twitter aparecer" OR "twitter dar" OR "twitter errar" OR "twitter poder" OR "twitter erro" OR "twitter pergunta" OR "twitter vir"';
        }
        if(isset($_GET["utilidade"])){
            array_push($padroes, "Utilidade");
            $stringBusca .= '"twitter poder" OR "twitter saber" OR "twitter usar" OR "twitter ver" OR "twitter excluir" OR "twitter dar" OR "twitter ficar" OR "twitter ruim" OR "twitter problema" OR "twitter dever" OR "twitter mozilla" OR "twitter querer" OR "twitter caractere" OR "twitter demorar" OR "twitter sistema" OR "twitter tirar" OR "twitter objetivo" OR "twitter limite" OR "twitter escrever" OR "twitter entrar"';
        }
        if(isset($_GET["personalizado"])){
            $padroes = str_replace(',', '" OR "', $_GET["personalizado"]);

            $stringBusca .= '"' . $padroes . '"';
        }

        if(count($padroes) == 0){
            echo "ERRO - Verifique os parâmetros utilizados.";
        }

        $stringBusca .= ' -"filter:retweets"';

        if($stringBusca != ' -"filter:retweets"'){
            $busca = new BuscaTwitter(100);
            $r = $busca->busca_pagina($stringBusca, 15);

            header('Content-Encoding: UTF-8');
            header('Content-type: text/json; charset=UTF-8');
            header('Content-Disposition: attachment; filename=TwitterPosts.json');
            header('Content-Transfer-Encoding: binary');
            header('Pragma: no-cache');

            $out = fopen( 'php://output', 'w' );
            fwrite($out, json_encode($r));
            fclose($out);
        }

    } else{
        header("location:../");
    }
?>