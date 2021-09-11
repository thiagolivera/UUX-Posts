<?php
/**
 * Created by PhpStorm.
 * User: netog
 * Date: 11/09/2018
 * Time: 08:36
 */

include_once 'C:\xampp\htdocs\projetos\estagio\ferramenta\Banco.php';

class FachadaClassificacao extends Banco
{

    private $postagens;
    /**
     * FachadaClassificacao constructor.
     */
    public function __construct()
    {
    }

    public function classificacaoBooleana($avaliacao, $dados){
        $palavras = $this->buscarFiltro(json_decode($dados,true));
        $array = null;
        $sql = "select * from postagens where BINARY idAvaliacao = ".$avaliacao." and ( postagem LIKE ";
        foreach ($palavras as $value){
            $sql = $sql."'%".trim($value)."%'"." OR postagem LIKE ";
        }
        $sql = substr($sql, 0,strlen($sql)-18).")";
        $valores = parent::Executar($sql);
        while($row = @mysqli_fetch_assoc($valores)){
            $array[] = $row;
        }
        $this->postagens=$array;
        self::salvar($array);
        return json_encode($array,true);
    }

    private function buscarFiltro($filtro){
        $termos = array();
        if (isset($filtro['Verbos'])) $termos = array_merge($termos, array("twitter" , "ter" , "dar" , "ficar" , "poder" , "fazer" , "dever" , "seguir" , "usar" , "querer" , "achar" , "saber" , "ver" , "entrar" , "existir" , "mudar" , "editar" , "deixar" , "falar" , "apagar" , "amar" , "olhar" , "gostar" , "dizer" , "vir" , "passar" , "começar" , "parecer" , "perder" , "indicar" , "responder" , "curtir" , "carregar"));
        if (isset($filtro['Substantivos'])) $termos = array_merge($termos, array("twitter" , "facebook" , "tweet" , "face" , "orkut" , "erro" , "problema" , "sugestão" , "pessoa" , "botão" , "celular" , "app" , "gente" , "pagina" , "comentário" , "opção" , "caractere" , "conta" , "rede" , "aplicativo" , "following" , "follower" , "obrigado" , "tempo" , "vida" , "galera" , "seguidor"));
        if (isset($filtro['Adjetivos'])) $termos = array_merge($termos, array("twitter" , "bom" , "ruim" , "fácil" , "novo" , "direto" , "difícil" , "rápido" , "louco" , "maldito" , "triste" , "lento" , "confuso" , "perdido" , "lindo" , "legal" , "chato" , "feliz" , "querido"));
        if (isset($filtro['Adverbios'])) $termos = array_merge($termos, array("twitter" , "não" , "mais" , "bem" , "porque" , "como" , "quando" , "nem" , "assim" , "mal" , "hoje" , "então" , "demais" , "algo" , "longe" , "onde"));
        if (isset($filtro['Comparacao'])) $termos = array_merge($termos, array("twitter" , "facebook" , "mais" , "face" , "orkut" , "bem" , "ir" , "bom" , "ter" , "usar" , "achar" , "ver" , "dia" , "ruim"));
        if (isset($filtro['Elogio'])) $termos = array_merge($termos, array("twitter" , "facebook" , "bem" , "bom" , "mais" , "ter" , "face" , "ficar" , "dar" , "celular" , "legal" , "adorar" , "gente"));
        if (isset($filtro['Duvida'])) $termos = array_merge($termos, array("twitter" , "fazer" , "ruim" , "erro" , "dar" , "problema" , "tweet" , "saber" , "página" , "como" , "comentário" , "mais" , "aqui"));
        if (isset($filtro['Critica'])) $termos = array_merge($termos, array("twitter" , "mais" , "tweet" , "ficar" , "entrar" , "aqui" , "querer" , "porque" , "ir" , "gostar" , "tão" , "mal" , "chato"));
        if (isset($filtro['Sugestao'])) $termos = array_merge($termos, array("twitter" , "ter" , "dever" , "tweet" , "sugestão" , "poder" , "mais" , "botão" , "seguir" , "dar" , "editar" , "ficar" , "querer" , "porque"));
        if (isset($filtro['Afeto'])) $termos = array_merge($termos, array("twitter" , "gostar" , "rede" , "sistema" , "legal" , "adorar" , "amar" , "facebook" , "poder" , "comunicar" , "facilitar" , "criativo" , "eficiente" , "moderno" , "interessante" , "postar" , "existir" , "praticar" , "aproveitar" , "usufruir"));
        if (isset($filtro['Aprendizado'])) $termos = array_merge($termos, array("twitter" , "saber" , "fazer" , "ver" , "ter" , "conseguir" , "poder" , "encontrar" , "aparecer" , "próximo" , "visualizar" , "clicar" , "achar" , "dizer" , "entender" , "entrar" , "informar" , "ajudar" , "novo" , "pagina" , "perder" , "campo" , "anterior" , "caminho" , "difícil" , "email" , "fácil" , "menu" , "mexer" , "querer" , "aprender"));
        if (isset($filtro['Confianca'])) $termos = array_merge($termos, array("twitter" , "sistema" , "parecer" , "fazer" , "gostar" , "praticar" , "interatividade" , "usar" , "poder" , "interessante" , "esperar" , "achar" , "acreditar" , "agradar" , "ajudar" , "apoio" , "resolver" , "melhorar" , "melhoria" , "começar"));
        if (isset($filtro['Eficacia'])) $termos = array_merge($termos, array("twitter" , "sistema" , "ter" , "fazer" , "problema" , "saber" , "conseguir" , "aparecer" , "poder" , "dar" , "ver" , "erro" , "dizer" , "ficar" , "querer" , "tentar" , "dever" , "ajuste" , "gostar" , "colocar" , "realizar" , "continuar" , "mensagem" , "achar" , "mudar" , "esperar" , "abrir" , "pagina" , "entrar" , "opção" , "permitir" , "faltar" , "excluir" , "acessar" , "mandar" , "jeito"));
        if (isset($filtro['Eficiencia'])) $termos = array_merge($termos, array("twitter" , "ruim" , "ficar" , "lento" , "ver" , "dar" , "sistema" , "esperar" , "querer" , "carregar" , "erro" , "face" , "legal" , "fazer" , "problema" , "usar" , "achar" , "passar" , "aparecer" , "disciplina" , "pau" , "app" , "espaço" , "ler" , "tentar" , "abrir"));
        if (isset($filtro['Estetica'])) $termos = array_merge($termos, array("twitter" , "gostar" , "parecer" , "ficar" , "bonito" , "plataforma" , "design" , "atualizar" , "android" , "limpo" , "perfeito" , "acostumar" , "pagina" , "melhoria" , "adorar" , "adaptar" , "add" , "campo" , "curtir" , "escrever" , "esquerdo" , "estilo" , "mexer" , "simples" , "visual" , "windows" , "entrar" , "interface" , "diferente"));
        if (isset($filtro['Frustracao'])) $termos = array_merge($termos, array("twitter" , "ter" , "sistema" , "problema" , "fazer" , "ruim" , "saber" , "ficar" , "dar" , "poder" , "erro" , "ver" , "conseguir" , "querer" , "dizer" , "bug" , "aparecer" , "tempo" , "achar" , "mau" , "dever" , "entender" , "mudança" , "mudar" , "passar" , "usar" , "entrar" , "funcionar" , "odiar" , "começar" , "tentar" , "abrir" , "acessar" , "colocar" , "complicar" , "falar" , "precisar"));
        if (isset($filtro['Motivacao'])) $termos = array_merge($termos, array("twitter" , "poder" , "adorar" , "desabafar" , "achar" , "criar" , "falar" , "ver" , "plataforma" , "social" , "saber" , "super" , "fazer" , "interatividade" , "usar" , "deixar" , "existir" , "amar" , "sistema" , "interessante" , "ajudar" , "igual" , "facebook" , "ficar" , "interativo" , "ótimo" , "legal"));
        if (isset($filtro['Satisfacao'])) $termos = array_merge($termos, array("twitter" , "sistema" , "gostar" , "legal" , "achar" , "adorar" , "ter" , "face" , "facebook" , "demorar" , "parecer" , "poder" , "social" , "existir" , "ficar" , "entrar" , "interatividade" , "próximo" , "criar" , "amar" , "desabafar" , "fácil" , "ver" , "interessante" , "bonito" , "ferramenta" , "novo" , "fazer" , "querer" , "falar" , "deus" , "usar" , "deixar" , "perfeito"));
        if (isset($filtro['Seguranca'])) $termos = array_merge($termos, array("twitter" , "saber" , "sistema" , "começar" , "mau" , "fazer" , "dar" , "aparecer" , "errar" , "apertar" , "poder" , "ruim" , "erro" , "digitar" , "constar" , "faltar" , "lista" , "odiar" , "ver" , "ficar" , "querer" , "mexer" , "perceber" , "problema" , "clicar" , "medo" , "enter" , "raiva" , "teclar" , "espaço" , "criar" , "remover" , "complicar"));
        if (isset($filtro['Suporte'])) $termos = array_merge($termos, array("twitter" , "fazer" , "sistema" , "saber" , "preencher" , "ver" , "esperar" , "problema" , "solicitar" , "clicar" , "clique" , "consultar" , "providenciar" , "pedir" , "aparecer" , "dar" , "errar" , "poder" , "erro" , "pergunta" , "vir" , "acreditar" , "continuar" , "dever" , "resolver" , "funcionar" , "tentar" , "conseguir" , "cadastrar" , "complexo" , "procurar" , "selecionar"));
        if (isset($filtro['Utilidade'])) $termos = array_merge($termos, array("twitter" , "poder" , "saber" , "usar" , "ver" , "excluir" , "dar" , "ficar" , "ruim" , "problema" , "dever" , "mozilla" , "querer" , "caractere" , "demorar" , "sistema" , "tirar" , "objetivo" , "limite" , "escrever" , "entrar" , "precisar" , "abrir" , "linha" , "face" , "deixar" , "utilizar" , "editar" , "palavra" , "gostar" , "achar" , "novo" , "fazer" , "ótimo" , "ter" , "parecer" , "próximo"));
        if (!empty($filtro['filtros'])){
            $palavras = explode(",",$filtro['filtros']);
            $termos = array_merge($termos, $palavras);
        }
        return $termos;
    }

    private function salvar($array){
        $sql = "select idPostagensClassificadas from postagensClassificadas LIMIT 1 ";
        $resultado = parent::Executar($sql);
        if(isset($resultado)){
            parent::Executar("delete from postagensClassificadas where idPostagensClassificadas>0");
        }
        $sql = "insert into postagensClassificadas (idPostagensClassificadas) values ";
        foreach ($array as $posta){
            $sql .= " (".$posta["idPostagem"]."),";
        }
        $sql = substr($sql, 0,strlen($sql)-1);
        parent::Executar($sql);
    }

    /**
     * @return mixed
     */
    public function getPostagens()
    {
        return $this->postagens;
    }
}