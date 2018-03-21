<?php

class db{
    private $connection_string = "host=localhost dbname=uuxposts port=5432 user=postgres password=admin";
    
    public function conecta_pg(){
        $conexao = pg_connect($this->connection_string);
        if(pg_connection_status($connection)){
            
        }
    }
}


if(!($conexao = pg_connect($connection_string))) {
   print "Não foi possível estabelecer uma conexão com o banco de dados.";
} else {
   pg_close ($conexao);
   print "Conexão OK!"; 
}
?>