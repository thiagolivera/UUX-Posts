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
 
	public function busca_pagina($query, $pagina, $idAvaliacao){
            $query_formatada = $this->getQuery($query);
            $this->busca = $query_formatada;
            $this->max_id = "";

            $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
            $erro = 0;

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
                            //$this->extrairPorProcesso2($r, $idAvaliacao, $conexao);
                            array_push($postagens, $r);
                            $this->tamanho_atual++; 
                            $this->max_id = $r->id_str;
                    }
            }
            mysqli_close($conexao);
            return $postagens;
	}


        private function extrairPorProcesso($r, $idAvaliacao, $conexao){
            //salva a postagem e a data
            $sql = "INSERT INTO postagens(idAvaliacao, idPostagem, postagem, data) "
                    . "VALUES (".$idAvaliacao.","
                    . "DEFAULT,'".mysqli_real_escape_string($conexao, utf8_encode($r->text))."',"
                    . "'".mysqli_real_escape_string($conexao, utf8_encode($r->created_at))."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
                echo mysqli_error($conexao);
            }

            //obtem o id da postagem
            $sql = "SELECT idPostagem FROM postagens WHERE idAvaliacao = ".$idAvaliacao." ORDER BY idPostagem DESC LIMIT 1;";
            $idPostagem = mysqli_fetch_array(mysqli_query($conexao, $sql))[0];
            echo mysqli_error($conexao);

            //guarda o usuário e infos dele
            $sql = "INSERT INTO twitter_usuario(`idusuario`, `idtwitter_usuario`, `nome`, `user_name`, `localizacao`, `seguindo`, `seguidores`, `usuario_desde`, `num_posts_favorites`, `idioma`)"
                    . " VALUES ("
                    . "DEFAULT,"
                    . "". $r->user->id .","
                    . "'". mysqli_real_escape_string($conexao, utf8_encode($r->user->name)) ."',"
                    . "'". mysqli_real_escape_string($conexao, utf8_encode($r->user->screen_name)) ."',"
                    . "'". mysqli_real_escape_string($conexao, utf8_encode($r->user->location)) ."',"
                    . "". $r->user->friends_count .","
                    . "". $r->user->followers_count .","
                    . "'". $r->user->created_at ."',"
                    . "". $r->user->favourites_count .","
                    . "'". mysqli_real_escape_string($conexao, utf8_encode($r->user->lang)) ."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
                echo mysqli_error($conexao);
            }

            //obtem o id do usuario
            $sql = "SELECT idusuario FROM twitter_usuario ORDER BY idusuario DESC LIMIT 1;";
            $idUsuario = mysqli_fetch_array(mysqli_query($conexao, $sql))[0];
            echo mysqli_error($conexao);

            $entities = (array) $r->entities;

            //salva infos da postagem
            $sql = "INSERT INTO twitter_postagens(`idpostagem`, `idUsuario`, `num_hastags`, `num_user_mentions`, `num_retweets`, `num_favorites`, `dispositivo`) "
                    . "VALUES ("
                    . "".$idPostagem.","
                    . "".$idUsuario.","
                    . "".count($entities['hashtags']).","
                    . "".count($entities['user_mentions']).","
                    . "".$r->retweet_count.","
                    . "".$r->favorite_count.","
                    . "'".$r->source."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
                echo mysqli_error($conexao);
            }
        }
        
        private function extrairPorProcesso2($r, $idAvaliacao, $conexao){
            //salva a postagem e a data
            $sql = "INSERT INTO postagens(idAvaliacao, idPostagem, postagem, data) "
                    . "VALUES (".$idAvaliacao.","
                    . "DEFAULT,'".$r->text."',"
                    . "'".$r->created_at."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
                echo mysqli_error($conexao);
            }

            //guarda o usuário e infos dele
            $sql = "INSERT INTO twitter_usuario(`idusuario`, `idtwitter_usuario`, `nome`, `user_name`, `localizacao`, `seguindo`, `seguidores`, `usuario_desde`, `num_posts_favorites`, `idioma`)"
                    . " VALUES ("
                    . "DEFAULT,"
                    . "". $r->user->id .","
                    . "'". $r->user->name ."',"
                    . "'". $r->user->screen_name ."',"
                    . "'". $r->user->location ."',"
                    . "". $r->user->friends_count .","
                    . "". $r->user->followers_count .","
                    . "'". $r->user->created_at ."',"
                    . "". $r->user->favourites_count .","
                    . "'". $r->user->lang ."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
                echo mysqli_error($conexao);
            }

            $entities = (array) $r->entities;

            //salva infos da postagem
            $sql = "INSERT INTO twitter_postagens(`idpostagem`, `idUsuario`, `num_hastags`, `num_user_mentions`, `num_retweets`, `num_favorites`, `dispositivo`) "
                    . "VALUES ("
                    . "".$r->id_str.","
                    . "".$r->user->id.","
                    . "".count($entities['hashtags']).","
                    . "".count($entities['user_mentions']).","
                    . "".$r->retweet_count.","
                    . "".$r->favorite_count.","
                    . "'".$r->source."');";
            if (!mysqli_query($conexao, $sql)){
                $erro++; //se der erro incrementa no contador para cancelar a transação
                echo mysqli_error($conexao);
            }
        }


        private function getQuery($old_query){
		$result = str_replace("+", "%20", $old_query);
		return $result;
	}


	public function getTabela($pagina){
		$res = $this->db->query("SELECT tweet FROM tabela_tweets_novo WHERE page_id = ".$pagina);
		$primeira_cor = true;
		$html = "<div class='container'><div class='row'><div class='col-lg-12 col-md-12'><div class='panel panel-default'><div class='panel-body'><table class='table table-hover'>";
		$html .= "<tr style='background-color:#dfdeea;border-left: 1px solid #912be2;'><td><strong>Postagens obtidas</strong></td></tr>";
		foreach ($res as $tweet) {
			$cor = ($primeira_cor)? "#dfe5ec":"#FFFFFF";
			$primeira_cor = !$primeira_cor;
			$html .= "<tr style='background-color:".$cor.";'><td>".$tweet['tweet']."</td></tr>";
		}
		$html .= "</table></div></div></div></div></div>";
		return $html;

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
	
	public function exporta()
	{
		header ("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
		header ("Content-Disposition: attachment; filename=UUXPost.csv" );
		header ("Content-Description: PHP Generated Data" );
		
		$csv = $this->db->query("SELECT tweet FROM tabela_tweets_novo");
		echo "<table>";
		
		foreach ($csv as $tweet) {
			echo "<tr><td>".$tweet['tweet']."</td></tr>";
		}
		
		
		echo "</table>";
		die;
	}
	
	
}
?>