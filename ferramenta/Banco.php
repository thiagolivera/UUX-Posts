    <?php

class Banco{
    private $con, $qry, $sql, $db;
    private $host = 'sql138.main-hosting.eu';
    private $user = 'u884100256_uuxpo';
    private $password = 'QOyPVo5YCWrE';
    private $database = 'u884100256_uux';
    
    public function getHost(){
        return $this->host;
    }
    public function getUser(){
        return $this->user;
    }
    public function getPass(){
        return $this->password;
    }
    public function getBanco(){
        return $this->database;
    }

    private function Conectar(){
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database) or die ("Erro ao conectar." . mysqli_error());
    }

    //para operações simples
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
    
    //Para operações complexas, ou seja, que precisam de vários SQLs para salvar os dados
    public function ExecutarSqls($sqls){        
        $conexao = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        mysqli_autocommit($conexao, FALSE);
        $erro = 0;
        
        for($i = 0; $i < count($sqls); $i++){
            if (!mysqli_query($conexao, $sqls[$i])){
                $erro++;
            }
        }
        
        if ($erro == 0){
            mysqli_commit($conexao);
        } else {
            mysqli_rollback($conexao);   
        }
        
        mysqli_close($conexao);
    }
    
    private function Desconectar(){
        return mysqli_close($this->con);
    }
}