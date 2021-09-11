<?php

include_once 'Banco.php';

class ClassificacaoBD extends Banco {
    
    public function __construct(){
       
    }

    public function classificacaoBooleana($idAvaliacao, $filtro){
        $palavras = self::buscarFiltro($filtro); //obtem os padrões de classificação

        $array = [];
        
        $sql = "SELECT * FROM  (SELECT * FROM `postagens_public` WHERE `idAvaliacao` = ".$idAvaliacao.") as postagem WHERE `postagem` LIKE ";
        
        foreach ($palavras as $value){
            $sql .= "'%".trim($value)."%' OR `postagem` LIKE ";
        }
        $sql = substr($sql, 0,strlen($sql)-20);
        
        $valores = parent::Executar($sql); //obtem as postagens do banco
        while($row = @mysqli_fetch_assoc($valores)){
            $array[] = $row;
        }
        return $array;
    }

    private function buscarFiltro($filtro){
        $termos = array();
        foreach ($filtro as $filtro){
            if(strcmp($filtro, "Verbos") == 0){
                $termos = array_merge($termos, array("twitter" , "ter" , "dar" , "ficar" , "poder" , "fazer" , "dever" , "seguir" , "usar" , "querer" , "achar" , "saber" , "ver" , "entrar" , "existir" , "mudar" , "editar" , "deixar" , "falar" , "apagar" , "amar" , "olhar" , "gostar" , "dizer" , "vir" , "passar" , "começar" , "parecer" , "perder" , "indicar" , "responder" , "curtir" , "carregar"));
            } 
            else if(strcmp($filtro, "Substantivos") == 0){
                $termos = array_merge($termos, array("twitter" , "facebook" , "tweet" , "face" , "orkut" , "erro" , "problema" , "sugestão" , "pessoa" , "botão" , "celular" , "app" , "gente" , "pagina" , "comentário" , "opção" , "caractere" , "conta" , "rede" , "aplicativo" , "following" , "follower" , "obrigado" , "tempo" , "vida" , "galera" , "seguidor"));
            }
            else if(strcmp($filtro, "Adjetivos") == 0){
                $termos = array_merge($termos, array("twitter" , "bom" , "ruim" , "fácil" , "novo" , "direto" , "difícil" , "rápido" , "louco" , "maldito" , "triste" , "lento" , "confuso" , "perdido" , "lindo" , "legal" , "chato" , "feliz" , "querido"));
            }
            else if(strcmp($filtro, "Advérbios") == 0){
                $termos = array_merge($termos, array("twitter" , "não" , "mais" , "bem" , "porque" , "como" , "quando" , "nem" , "assim" , "mal" , "hoje" , "então" , "demais" , "algo" , "longe" , "onde"));
            }
            else if(strcmp($filtro, "Comparacao") == 0){
                $termos = array_merge($termos, array("twitter" , "facebook" , "mais" , "face" , "orkut" , "bem" , "ir" , "bom" , "ter" , "usar" , "achar" , "ver" , "dia" , "ruim"));
            }
            else if(strcmp($filtro, "Elogio") == 0){
                $termos = array_merge($termos, array("twitter" , "facebook" , "bem" , "bom" , "mais" , "ter" , "face" , "ficar" , "dar" , "celular" , "legal" , "adorar" , "gente"));
            }
            else if(strcmp($filtro, "Dúvida") == 0){
                $termos = array_merge($termos, array("twitter" , "fazer" , "ruim" , "erro" , "dar" , "problema" , "tweet" , "saber" , "página" , "como" , "comentário" , "mais" , "aqui"));
            }
            else if(strcmp($filtro, "Crítica") == 0){
                $termos = array_merge($termos, array("twitter" , "mais" , "tweet" , "ficar" , "entrar" , "aqui" , "querer" , "porque" , "ir" , "gostar" , "tão" , "mal" , "chato"));
            }
            else if(strcmp($filtro, "Sugestão") == 0){
                $termos = array_merge($termos, array("twitter" , "ter" , "dever" , "tweet" , "sugestão" , "poder" , "mais" , "botão" , "seguir" , "dar" , "editar" , "ficar" , "querer" , "porque"));
            }
            else if(strcmp($filtro, "Afeto") == 0){
                $termos = array_merge($termos, array("twitter" , "gostar" , "rede" , "sistema" , "legal" , "adorar" , "amar" , "facebook" , "poder" , "comunicar" , "facilitar" , "criativo" , "eficiente" , "moderno" , "interessante" , "postar" , "existir" , "praticar" , "aproveitar" , "usufruir"));
            }
            else if(strcmp($filtro, "Aprendizado") == 0){
                $termos = array_merge($termos, array("twitter" , "saber" , "fazer" , "ver" , "ter" , "conseguir" , "poder" , "encontrar" , "aparecer" , "próximo" , "visualizar" , "clicar" , "achar" , "dizer" , "entender" , "entrar" , "informar" , "ajudar" , "novo" , "pagina" , "perder" , "campo" , "anterior" , "caminho" , "difícil" , "email" , "fácil" , "menu" , "mexer" , "querer" , "aprender"));
            }
            else if(strcmp($filtro, "Confiança") == 0){
                $termos = array_merge($termos, array("twitter" , "sistema" , "parecer" , "fazer" , "gostar" , "praticar" , "interatividade" , "usar" , "poder" , "interessante" , "esperar" , "achar" , "acreditar" , "agradar" , "ajudar" , "apoio" , "resolver" , "melhorar" , "melhoria" , "começar"));
            }
            else if(strcmp($filtro, "Eficácia") == 0){
                $termos = array_merge($termos, array("twitter" , "sistema" , "ter" , "fazer" , "problema" , "saber" , "conseguir" , "aparecer" , "poder" , "dar" , "ver" , "erro" , "dizer" , "ficar" , "querer" , "tentar" , "dever" , "ajuste" , "gostar" , "colocar" , "realizar" , "continuar" , "mensagem" , "achar" , "mudar" , "esperar" , "abrir" , "pagina" , "entrar" , "opção" , "permitir" , "faltar" , "excluir" , "acessar" , "mandar" , "jeito"));
            }
            else if(strcmp($filtro, "Eficiência") == 0){
                $termos = array_merge($termos, array("twitter" , "ruim" , "ficar" , "lento" , "ver" , "dar" , "sistema" , "esperar" , "querer" , "carregar" , "erro" , "face" , "legal" , "fazer" , "problema" , "usar" , "achar" , "passar" , "aparecer" , "disciplina" , "pau" , "app" , "espaço" , "ler" , "tentar" , "abrir"));
            }
            else if(strcmp($filtro, "Estética") == 0){
                $termos = array_merge($termos, array("twitter" , "gostar" , "parecer" , "ficar" , "bonito" , "plataforma" , "design" , "atualizar" , "android" , "limpo" , "perfeito" , "acostumar" , "pagina" , "melhoria" , "adorar" , "adaptar" , "add" , "campo" , "curtir" , "escrever" , "esquerdo" , "estilo" , "mexer" , "simples" , "visual" , "windows" , "entrar" , "interface" , "diferente"));
            }
            else if(strcmp($filtro, "Frustração") == 0){
                $termos = array_merge($termos, array("twitter" , "ter" , "sistema" , "problema" , "fazer" , "ruim" , "saber" , "ficar" , "dar" , "poder" , "erro" , "ver" , "conseguir" , "querer" , "dizer" , "bug" , "aparecer" , "tempo" , "achar" , "mau" , "dever" , "entender" , "mudança" , "mudar" , "passar" , "usar" , "entrar" , "funcionar" , "odiar" , "começar" , "tentar" , "abrir" , "acessar" , "colocar" , "complicar" , "falar" , "precisar"));
            }
            else if(strcmp($filtro, "Motivação") == 0){
                $termos = array_merge($termos, array("twitter" , "poder" , "adorar" , "desabafar" , "achar" , "criar" , "falar" , "ver" , "plataforma" , "social" , "saber" , "super" , "fazer" , "interatividade" , "usar" , "deixar" , "existir" , "amar" , "sistema" , "interessante" , "ajudar" , "igual" , "facebook" , "ficar" , "interativo" , "ótimo" , "legal"));
            }
            else if(strcmp($filtro, "Satisfação") == 0){
                $termos = array_merge($termos, array("twitter" , "sistema" , "gostar" , "legal" , "achar" , "adorar" , "ter" , "face" , "facebook" , "demorar" , "parecer" , "poder" , "social" , "existir" , "ficar" , "entrar" , "interatividade" , "próximo" , "criar" , "amar" , "desabafar" , "fácil" , "ver" , "interessante" , "bonito" , "ferramenta" , "novo" , "fazer" , "querer" , "falar" , "deus" , "usar" , "deixar" , "perfeito"));
            }
            else if(strcmp($filtro, "Segurança") == 0){
                $termos = array_merge($termos, array("twitter" , "saber" , "sistema" , "começar" , "mau" , "fazer" , "dar" , "aparecer" , "errar" , "apertar" , "poder" , "ruim" , "erro" , "digitar" , "constar" , "faltar" , "lista" , "odiar" , "ver" , "ficar" , "querer" , "mexer" , "perceber" , "problema" , "clicar" , "medo" , "enter" , "raiva" , "teclar" , "espaço" , "criar" , "remover" , "complicar"));
            }
            else if(strcmp($filtro, "Suporte") == 0){
                $termos = array_merge($termos, array("twitter" , "fazer" , "sistema" , "saber" , "preencher" , "ver" , "esperar" , "problema" , "solicitar" , "clicar" , "clique" , "consultar" , "providenciar" , "pedir" , "aparecer" , "dar" , "errar" , "poder" , "erro" , "pergunta" , "vir" , "acreditar" , "continuar" , "dever" , "resolver" , "funcionar" , "tentar" , "conseguir" , "cadastrar" , "complexo" , "procurar" , "selecionar"));
            }
            else if(strcmp($filtro, "Utilidade") == 0){
                $termos = array_merge($termos, array("twitter" , "poder" , "saber" , "usar" , "ver" , "excluir" , "dar" , "ficar" , "ruim" , "problema" , "dever" , "mozilla" , "querer" , "caractere" , "demorar" , "sistema" , "tirar" , "objetivo" , "limite" , "escrever" , "entrar" , "precisar" , "abrir" , "linha" , "face" , "deixar" , "utilizar" , "editar" , "palavra" , "gostar" , "achar" , "novo" , "fazer" , "ótimo" , "ter" , "parecer" , "próximo"));
            }
            else{ //se nao for nenhum dos padrões, é pq é personalizado, então...
                $palavras = explode(",",$filtro);
                $termos = array_merge($termos, $palavras);
            }   
        }
        return $termos;
    }
}