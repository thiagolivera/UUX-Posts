<?php
session_start();
$exportar = new ExportarCSV();

if(isset($_GET["exportarSessao"])){
    $r = $_SESSION['postagens'];
    $exportar->postsSessao($r);
}

if(isset($_POST["postagensBD"])){
    $posts = $_SESSION["postagensExtraidas"];
    $exportar->postsBD($posts);
}

    class ExportarCSV{
        
        public function __construct() {
            
        }
        
        function postsBD($posts){
            $arrayPosts = array();
            
            foreach ($posts as $posts){
                $postagem = $posts["postagem"]; //texto
                $postagem = str_replace("\n", "", $postagem);
                $postagem = str_replace("\r", "", $postagem);
                $postagem = str_replace("'", "", $postagem);

                $postagem = utf8_decode($postagem);
                $postagem = '"' . $postagem . '"';

                $postagem = array($postagem);

                array_push($arrayPosts, $postagem);
            }
            
            self::gerarCSV($arrayPosts);
        }
                
        function postsSessao($r){
            $arrayPosts = array();
            
            foreach ($r as $r){
                $postagem = $r->text;
                $postagem = str_replace("\n", "", $postagem);
                $postagem = str_replace("\r", "", $postagem);
                $postagem = str_replace("'", "", $postagem);

                $postagem = utf8_decode($postagem);
                $postagem = '"' . $postagem . '"';

                $postagem = array($postagem);

                array_push($arrayPosts, $postagem);
            }
            
            self::gerarCSV($arrayPosts);
        }
                
        public function gerarCSV($arrayPosts){
            header('Content-Encoding: UTF-8');
            header('Content-type: text/csv; charset=UTF-8');
            header('Content-Disposition: attachment; filename=UUX-Posts.csv');
            header('Content-Transfer-Encoding: binary');
            header('Pragma: no-cache');

            $out = fopen( 'php://output', 'w' );
            fputcsv($out, array('"text"'));

            foreach ($arrayPosts as $arrayPosts){
                fputcsv($out, $arrayPosts);
            }

            fclose($out);
        }
    }
?>