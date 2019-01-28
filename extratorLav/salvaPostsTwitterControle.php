<?php

include 'Banco.php';

class SalvaTwitter extends Banco{
    public function __construct($r, $idAvaliacao) {
        
        //Como atualmente não há um pré-processamento da postagens antes de salvá-la no banco,
        // algumas postagens podem ficar sem os dados salvos no banco, pois há caracteres como 
        // a aspas simples (') que podem atrapalhar na string SQL do salvamento.
        
        $conexao = mysqli_connect($this->getHost(), $this->getUser(), $this->getPass(), $this->getBanco());
        foreach ($r as $r){
            //var_dump($r);
            echo '<br><br><br>';
            
            $postagem = $r->text;
            $postagem = str_replace("\n", "", $postagem);
            $postagem = str_replace("\r", "", $postagem);
            $postagem = str_replace("'", "", $postagem);
            
            $sql = "INSERT INTO postagens_public(idAvaliacao, idPostagem, postagem, idPostTwitter) "
                . "VALUES (".$idAvaliacao.","
                . "DEFAULT,'".$postagem."',"
                . "'". $r->user->id_str."');";
            mysqli_query($conexao, $sql);
            
            echo "<br><br>" . $sql;
            
            $nomeUser = $r->user->name;
            $nomeUser = str_replace("'", "", $nomeUser);
            $nomeUser = str_replace('"', '', $nomeUser);
            
            $screenUser = $r->user->screen_name;
            $screenUser = str_replace("'", "", $screenUser);
            $screenUser = str_replace('"', '', $screenUser);
            
            $locationUser = $r->user->location;
            $locationUser = str_replace("'", "", $locationUser);
            $locationUser = str_replace('"', '', $locationUser);
            
            //Caso queira pegar dados do usuário e postagens usar os SQLs abaixo
            $sql = "INSERT INTO twitter_usuario(`idusuario`, `idtwitter_usuario`, `nome`, `user_name`,`imagemPerfil`, `localizacao`, `seguindo`, `seguidores`, `usuario_desde`, `num_posts_favorites`, `idioma`, `idPostTwitter`)"
                    . " VALUES ("
                    . "DEFAULT,"
                    . "'". $r->user->id_str."',"
                    . "'". $nomeUser ."',"
                    . "'". $screenUser ."',"
                    . "'". $r->user->profile_image_url_https ."',"
                    . "'". $r->user->location ."',"
                    . "". $r->user->friends_count .","
                    . "". $r->user->followers_count .","
                    . "'". $r->user->created_at ."',"
                    . "". $r->user->favourites_count .","
                    . "'". $r->user->lang ."', '".$r->id_str."');";
            mysqli_query($conexao, $sql);
            
            echo "<br><br>" . $sql;
            
            $entities = (array) $r->entities;
            
            $sql = "INSERT INTO twitter_postagens(`idpostagem`, `idUsuario`,`created_at`, `num_hastags`, `num_user_mentions`, `num_retweets`, `num_favorites`, `dispositivo`) "
                    . "VALUES ("
                    . "'".$r->id_str."',"
                    . "'".$r->user->id_str."',"
                    . "'".$r->created_at."',"
                    . "".count($entities['hashtags']).","
                    . "".count($entities['user_mentions']).","
                    . "".$r->retweet_count.","
                    . "".$r->favorite_count.","
                    . "'".$r->source."');";
            
            mysqli_query($conexao, $sql);
            
            echo "<br><br>" . $sql;
        }
    }
}