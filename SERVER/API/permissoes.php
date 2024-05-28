<?php
include 'config.php';
include 'comandos.php';


$connPDO = new mysqli($connect,$databaseUser,$dbpassword,$db);

#INICIA SESSÃO ANTERIOR
session_start();

echo $_SESSION["IDusr"];

#DEFINE PRINCIPAIS VARIAVEIS
$idusr = $_SESSION["IDusr"];
$codigoAcess = $_SESSION["codigo_user"];

#conecta com o banco de dados
$sqlCode = "select * from `perm_db` where IDusr ='".$idusr."'";
$mysql =  $connPDO->query($sqlCode);

#retorna a pesquisa
if($mysql->num_rows > 0){

    #busca os dados apresentados
    $idusrperm = $mysql->fetch_assoc();

    #verificação do usuário

    $permissions = $idusrperm["permissions"];
    $active = $idusrperm["active"];

    #verificação da permissão.
    echo $idusrperm["IDusr"];
    echo $active;



    #permissoes de usuário
    #PERMISSOES:
    #LEITURA E ATUALIZAÇÃO DOS PROPRIOS DADOS.


    if($permissions == "member" && active == "yes"){
        $sqlCodemember =  "SELECT * FROM `reserva_db` where codigo_user = '".$codigoAcess."'";
        $mysqlmember = $connPDO->query($sqlCodemember);

        $resultmember = $mysqlmember->fetch_assoc();
        
        if(!isset($_SESSION)){
            session_start();

        }

        $_SESSION["permissions"] = $permissions;

        header("LOCATION: painel.php");

        
    } 

    



    #permissões de admin database
    #PERMISSOES:
    #LEITURA, UPDATE, CREATE, DELETE DADOS
    if($permissions == "db.admin" && $active == "yes"){
        $sqlCodedb =  "SELECT * FROM `reserva_db`;";
        $mysqldb = $connPDO->query($sqlCodedb);

        $resultdb = $mysqldb->fetch_assoc();

        
        if(!isset($_SESSION)){
            session_start();

        }

        $_SESSION["permissions"] = $permissions;

        header("LOCATION: painel.php");

    } 





    #permissoes manager fly
    #LEITURA, UPDATE DE OUTROS DADOS.

    if($permissions == "fly.manager" && $active == "yes"){

        $sqlcodemanager = "SELECT * FROM `reserva_db`;";
        $mysqlmanager - $connPDO->query($sqlcodemanager);

        $resultmanager = $mysqlmanager->fetch_assoc();



        if(!isset($_SESSION)){
            session_start();

        }

        $_SESSION["permissions"] = $permissions;

        header("LOCATION: painel.php");



    } 
    
    #permissoes admin global
    #PERMISSOES:
    #PODE FAZER TUDO
    #É OBRIGATORIO DEIXAR QLQR USUÁRIO DESSE DESATIVADO.
    if ($permissions = "admin.admin.admin" && $active == "yes"){

        
        if(!isset($_SESSION)){
            session_start();

        }

        $_SESSION["permissions"] = $permissions;

        header("LOCATION: painel.php");

    } 

}


?>