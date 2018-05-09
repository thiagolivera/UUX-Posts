<?php

class Classificacao{
    var $idClassificador;
    var $idPostagem;
    var $idAvaliacao;
    var $classPRU;
    var $classFuncionalidade;
    var $classIntencao;
    var $classAnaliseSentimentos;
    var $classArtefato;
}

class ClassificaoTipo{
    var $critica;
    var $elogio;
    var $duvida;
    var $comparacao;
    var $sugestao;
    var $ajuda;
}

class ClassificaoUsabilidade{
    var $eficacia;
    var $eficiencia;
    var $satisfacao;
    var $seguranca;
    var $utilidade;
    var $memorabilidade;
    var $aprendizado;
}

class ClassificacaoUX{
    var $afeto;
    var $estetica;
    var $frustracao;
    var $satisfacao;
    var $motivacao;
    var $suporte;
}