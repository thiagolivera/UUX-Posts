<?php

include '../../../Banco.php';

class SalvaTwitter extends Banco{
    public function __construct($r, $idAvaliacao) {
        
        //Como atualmente não há um pré-processamento da postagens antes de salvá-la no banco,
        // algumas postagens podem ficar sem os dados salvos no banco, pois há caracteres como 
        // a aspas simples (') que podem atrapalhar na string SQL do salvamento.
        
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        foreach ($r as $r){
            
            $postagem = $r->text;
            $postagem = str_replace("\n", "", $postagem);
            $postagem = str_replace("\r", "", $postagem);
            $postagem = str_replace("'", "", $postagem);
            
            $sql = "INSERT INTO postagens(idAvaliacao, idPostagem, postagem, data) "
                . "VALUES (".$idAvaliacao.","
                . "DEFAULT,'".$postagem."',"
                . "'".$r->created_at."');";
            mysqli_query($conexao, $sql);
            
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
            mysqli_query($conexao, $sql);
            
            $entities = (array) $r->entities;
            $sql = "INSERT INTO twitter_postagens(`idpostagem`, `idUsuario`, `num_hastags`, `num_user_mentions`, `num_retweets`, `num_favorites`, `dispositivo`) "
                    . "VALUES ("
                    . "".$r->id_str.","
                    . "".$r->user->id.","
                    . "".count($entities['hashtags']).","
                    . "".count($entities['user_mentions']).","
                    . "".$r->retweet_count.","
                    . "".$r->favorite_count.","
                    . "'".$r->source."');";
            mysqli_query($conexao, $sql);
        }
        
        $sql = "SELECT status FROM avaliacao WHERE `idavaliacao` = ".$idAvaliacao." LIMIT 1;";
        $result = mysqli_query($conexao, $sql);
        $status = mysqli_fetch_array($result)[0];
        if(strcmp($status, "Etapa 2 - Extração de PRUS") == '0'){
            //muda status da avaliação no dados no banco
            $sql = "UPDATE `avaliacao` SET `status` = 'Definição da classificação' WHERE `idavaliacao` = ".$idAvaliacao.";";
            mysqli_query($conexao, $sql);
        }
        mysqli_close($conexao);
        
        header("location:../etapa3/introEtapa3.php");
    }
}