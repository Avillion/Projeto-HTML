<?php 

class comandos(){
    public static function consulta(){
        include 'config.php';
    
        $tabela = "reserva_db";
        
    
        $connPDO = new mysqli($connect,$databaseUser,$dbpassword,$db);
        $code = "SELECT * FROM $tabela";
        $sqquery = $connPDO->query($code);
        $result = $sqquery->fetch_assoc();
    
    }
    
    
    public static function update(){
        include 'config.php'

        $connPDO = new mysqli($connect,$databaseUser,$dbpassword,$db);
        $code = "UPDATE FROM";
        $sqquery = $connPDO->query($code);
        $result = $sqquery->fetch_assoc();
    
    
    }
}

?>

