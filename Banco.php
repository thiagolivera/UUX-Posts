<?php

class Banco{
    private $con, $qry, $sql, $db;
    private $host = 'sql138.main-hosting.eu';
    private $user = 'u884100256_uuxpo';
    private $password = 'QOyPVo5YCWrE';
    private $database = 'u884100256_uux';
    
    public function setHost($ip){
        $this->host = $ip;
    }
    public function setUser($usr){
        $this->user = $usr;
    }
    public function setPass($pwd){
        $this->password = $pwd;
    }
    public function setBanco($db){
        $this->database = $db;
    }

    private function Conectar(){
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database) or die ("Erro ao conectar." . mysqli_error());
    }

    public function Executar($sql){
        $this->sql = (string) $sql;
        
        self::Conectar();
        $this->qry = mysqli_query($this->con, $this->sql) or die ("Erro ao executar query na base de dados: " . mysqli_error($this->con));
        
        if(mysqli_affected_rows($this->con) > 0){
            return $this->qry;
        } else{
            return 0;
        }
        
        self::Desconectar();
    }
    
    private function Desconectar(){
        return mysqli_close($this->con);
    }
}