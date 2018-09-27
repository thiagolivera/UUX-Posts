	<?php 
require_once __DIR__ . '/TwitterOAuth/TwitterOAuth.php';
require_once __DIR__ . '/TwitterOAuth/Exception/TwitterException.php';
include_once '../../../Banco.php';


use TwitterOAuth\TwitterOAuth;

date_default_timezone_set('UTC');

class BuscaTwitter extends Banco{
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
        'consumer_key' => 'kY192LqXOe1D0svJudN7JYe5x',
        'consumer_secret' => 'sh88SfLzBCO0m2bPQMHQe87lJwPkydHVKqKS0Wq41ybeL5976B',

        'oauth_token' => '443062012-cQxBLG219LCew1rDQC74EqwIEtLCBYyWJ1nBDm07',
        'oauth_token_secret' => 'Oqc026KaR4O0kRMymELWoajC1Pccr0joX2QR1ySNIcY4q',

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

    public function qtdeTweets($pagina){	
            $result = $this->db->query("SELECT tamanho FROM tabela_tamanho WHERE pageid = ".$pagina);
            $num = $result->fetch(PDO::FETCH_OBJ);
            return $num->tamanho;
    }

    public function qtdeUsers(){	
            $result = $this->db->query("SELECT COUNT(DISTINCT usuario) as USER FROM tabela_tweets_novo");
            $num = $result->fetch(PDO::FETCH_OBJ);
            return $num->USER;
    }
}
?>