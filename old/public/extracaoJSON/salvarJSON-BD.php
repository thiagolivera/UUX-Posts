<?php

class SalvarJSONControle {

    private $dbh = null;

    public function __construct() {
        try {
            $this->dbh = new PDO('mysql:host=200.129.62.41;dbname=u884100256_estag', 'uuxposts', '8961n38hn', array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8', PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_PERSISTENT => true));
        } catch (Exception $e) {
            die("Unable to connect: " . $e->getMessage());
        }
    }

    public function salvarPostagens($idAvaliacao, $arquivo) {
        $dbh = $this->dbh;
        try {
            $postagens = json_decode(file_get_contents($arquivo));
            $dbh->beginTransaction();

            foreach ($postagens as $postagens) {
                $post = (array) $postagens;
                $post['text'] = str_replace("\n", "", $post['text']);
                $post['text'] = str_replace("\r", "", $post['text']);
                $post['text'] = str_replace("\\", "", $post['text']);
                $post['text'] = str_replace("'", "", $post['text']);
                
                echo $post['text'];
                $dbh->exec("INSERT INTO `postagens_public`(`idAvaliacao`, `postagem`) VALUES (" . $idAvaliacao . ",'" . $post['text'] . "');");
            }
            $dbh->commit();
        } catch (Exception $e) {
            $dbh->rollBack();
            echo "Failed: " . $e->getMessage();
        }
    }

}
