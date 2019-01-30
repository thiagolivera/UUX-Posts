	<?php 
require_once __DIR__ . '/TwitterOAuth/TwitterOAuth.php';
require_once __DIR__ . '/TwitterOAuth/Exception/TwitterException.php';


use TwitterOAuth\TwitterOAuth;

date_default_timezone_set('UTC');

class BuscaTwitter{
    private $tw; //API
    private $toa;
    private $tweets; //lista de tweets
    private $qtde;
    private $numero;

    private $tamanho_atual;
    private $is_limitado;
    private $limite;
    private $max_id;
    private $response; //resposta da API

    private $busca; //string de busca

    private $config = array(
        'consumer_key' => 'cTR4bQ2EgwO0e3P6hADNJoi74',
        'consumer_secret' => 'jQQaC8RRBNGjeDx5q7TbAXypYPkhgBQZhfkprsfG1lTbr8K6Pt',

        'oauth_token' => '823670584940888064-5Y7Ue3YSj0otWnI69HstiZZnTBBZOn2',
        'oauth_token_secret' => 'S0IjuZmijasoUjK4TkHB5RQxTXpHPXwZlOsogfk8xNUpV',

        'output_format' => 'object'
    );

    public function __construct($limite = 0){
            $this->tw = new TwitterOAuth($this->config);
            $this->tweets = array();
            $this->qtde = 100;
            $this->tamanho_atual = 0;

            if($limite > 0){
                    $this->is_limitado = true;
                    $this->limite = $limite;

                    if($this->qtde > $limite){
                            $this->qtde = $limite;
                    }
            }else{
                    $this->is_limitado = false;
            }
    }

    //esse método procura postagens do twitter, e retorna um array com as postagens e todas as informações relacionadas a elas;
    public function busca_pagina($query, $pagina){
        $query_formatada = $this->getQuery($query);
        $this->busca = $query_formatada;
        $this->max_id = "";
        $postagens = array();

        foreach (range(1, $pagina) as $i) {
                $this->numero = $i;
                $params = array(
                    'q' => $query_formatada,
                    'count' => $this->qtde,
                    'lang' => 'pt',
                    'result_type' => 'recent',
                    'max_id' => $this->max_id,
                    'include_entities' => 'true'
                );
                $this->response = $this->tw->get('search/tweets', $params);
                foreach ($this->response->statuses as $r) {
                        array_push($postagens, $r);
                        $this->tamanho_atual++; 
                        $this->max_id = $r->id_str;
                }
        }
        return $postagens;
    }
    
    private function getQuery($old_query){
            $result = str_replace("+", "%20", $old_query);
            return $result;
    }
}
?>