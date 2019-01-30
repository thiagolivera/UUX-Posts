<?php

include_once 'Banco.php';

$processaDados = new processaDadosUsuarioTwitter();

class processaDadosUsuarioTwitter extends Banco{
    
    private $idade;
    private $genero;
    private $nacionalidade;
    private $tempoUso;
    private $popularidade;
    private $dispositivo;
    
    public function __construct() {
        $this->nacionalidade = $this->obterNacionalidade();
        foreach ($teste as $this->nacionalidade){
            var_dump($teste);
        }
    }
    
    
    public function obterTempoUso(){
        $sql = "SELECT twitter_usuario.usuario_desde, twitter_postagens.created_at from twitter_usuario, twitter_postagens;";
        $resultado = parent::Executar($sql);
        while($row = @mysqli_fetch_assoc($resultado)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterNacionalidade(){
        $sql = "SELECT localizacao from twitter_usuario;";
        $resultado = parent::Executar($sql);
        while($row = @mysqli_fetch_assoc($resultado)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterDispositivo(){
        $sql = "SELECT twitter_postagens.dispositivo from twitter_postagens;";
        $resultado = parent::Executar($sql);
        while($row = @mysqli_fetch_assoc($resultado)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterPopularidade(){
        $sql = "SELECT num_retweets, num_favorites from twitter_postagens;";
        $resultado = parent::Executar($sql);
        while($row = @mysqli_fetch_assoc($resultado)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterImagensUrl(){
        $sql = "SELECT imagemPerfil from twitter_usuario;";
        $resultado = parent::Executar($sql);
        while($row = @mysqli_fetch_assoc($resultado)){
            $array[] = $row;
        }
        return $array;
    }
    
    public function obterDadosDemograficos(){
        $array = this.obterImagensUrl();
        echo var_dump($array);
        $resultado = array();
        $host = 'https://api-cn.faceplusplus.com';
        $apiKey = 'TBfYpjck03eZZAzC0XPWMJtooCO3K4Io';
        $apiSecret = 'ueTzSjruIvXp8wp98BS69QLaoApYOE16';

        $client = new FppClient($apiKey, $apiSecret, $host);
        $i=0;
        while($array){
            $data = array(
            'image_url' => $array[i],
            'return_attributes' => 'age, gender'
            );

            $resp = $client->detectFace($data);
            $resultado[i] = var_dump($resp);
            $i++;
        }
        return $array;
    }
    
    public function setTempoUso(){
        $array = this.obterTempoUso();
        $i = 0;
        $tempoUso = array();
        while($array){
            $usuarioDesde = new DateTime($array[i]);
            print_r($usuarioDesde);
            $dataPostagem = new DateTime($array[i+1]);
            print_r($dataPostagem);
            
            $tempoUso = $usuarioDesde->diff($dataPostagem);
            $tempoUso = $tempoUso->days;
        }
        return $tempoUso;
    }
    
    public function setNacionalidade(){
        $array = this.obterNacionalidade();
        return $array;
    }
    
    public function setDispositivo(){
        $array = this.obterDispositivo();
        return $array;
    }
    
    public function setPopularidade(){
        $array = this.obterPopularidade();
        $i = 0;
        $j = 0;
        $popularidade = array();
        while($array){
            $retweets = $array[i];
            $curtidas = $array[i+1];
            
            $popularidade[i] = (($retweets * 0.5) + ($curtidas * 0.5));
            $tempoUso = $tempoUso->days;
            
            $i = $i+2;
            $j++;
        }
        return $popularidade;
    }
}

