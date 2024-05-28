<?php 

include 'config.php';

//error_reporting(0);
$connPDO = new mysqli($connect,$databaseUser,$dbpassword,$db);
#COLETANDO INFORMAÇÕES DOS USUÁRIOS
$username = $_POST["username"];
$passwd = $_POST["password"];

#VERIFICANDO DADOS
if(isset($username) || isset($passwd)){
    if(strlen($username) == 0){
        echo "verifique usuario e senha";
    } else if(strlen($passwd) == 0){
        echo "verifique usuario e senha";
    } else {
        #LIMPEZA DE DADOS E CONFIGURAÇÃO DOS NOVOS DADOS PARA VERIFICAÇÃO NO BANCO DE DADOS.

        #ENVIANDO COMANDO PARA BANCO DE DADOS
        $sql_code = "SELECT * FROM `user_flight` WHERE name_user = '$username' AND passwd_user = '$passwd'; ";
        $sql_query = $connPDO->query($sql_code);

        #VERIFICAÇÃO SE OS DADOS SÃO VERDADEIROS
        //$qtd = $sql_query->num_rows;
        #ENVIANDO CODIGO DE SESSÃO PARA O NAVEGADOR
        if($sql_query->num_rows == 1){
            $username = $sql_query->fetch_assoc();

            if(!isset($_SESSION)){
                session_start();
            }
            $_SESSION["codigo_user"] = $username["codigo_user"];
            $_SESSION["IDusr"] = $username["IDusr"];

            header("LOCATION: permissoes.php");
        }
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name=9"viewport" content="width=device-width, initial-scale=1.0">
    <title>Minhas Reservas</title>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <header class="ContainerHeader">

        <aside class="navbar">
            <img id="logo"
                src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADIAAAAyCAYAAAAeP4ixAAAACXBIWXMAAAsTAAALEwEAmpwYAAADzUlEQVR4nO2Xa4hVVRTHf6PjI9+JGGjQZIoiFuYgVkglCY2PtDT1g5imVKiRjqUftECj0jIHkVAhEvHxIRViFCsURPEVCmr5QSksNTPLFxM4UzPTjCz4H1hsrnPPufcqXjg/uNx7zt17rbX3Xq8NKSkpKSkpKSkpCegBzAZ2AGeAWqABuAx8D7wNdCdPOgDtuDs8I+PN6OYsnxvA60kVlAGrgEtO0J/ANmBanrvTGpgEHHWybSG7genAQKAU6AIMAmYAh93YWXEVVQD1bqL9bgx2xxTvAyqBPjHldgbmAb86OdeB5UDvLHNLgNWa81fchSxyitZod9oCA4A58tl/g4X9BHwMDJVSz8PAp8BNN/5nyeoY06YXgd80d0+SmNjjlB4Cnsiwu68Cm4BrwaL+ANYDU4AtwenuB8YBrRIkgc1u/pGkbm27+pqOMXKlKi0gk88/B3yunQ6DtF4LGpJAf0dgsQLcZNwCFkhXTjwIrAX+d7s95Q6K5wQLMSM+i+H/HsuO7wBXnJzvgEcpEOb7x53wvUB/oBfwiYI2V/+PFvAWcCFwoxFkiYEnFYRJaCUDo6D9Tx/v/+MT+D9abGWQ5n8EXiILlr9rNKEJ+AroRDzMwLHAscD/twLlJKMrsAT428k6AUyMuxG/a9JZoM79HtzCnAeAN9U6eP9fATxCcnq6IG5WsRudIW23yC+aPBLoB5zUsy1qbjD2IWBZsGvnFIxxTzETH0rWSeD5XIV8ICHf6rm9slJk6E7gBeDLoOgd1rHnnP5cTESJ4al8BPVQTm5STxMx2cVO9LG2ZHsOCkuV5TIxT7IPUACiE7Bd91iu3qBKvjKH3G1N3rtKoaYjpA1wXrrHUAD6qcDVKfDypUxVvSZLhzpV/51OGtgt8Y2ELiU3StTI7XRVv9n9Ls8w/pT+s9anYAx3LbEFfFzM3d4PWpFa1aNynXJDBpkVGntRLlZQfpDwN7KM66/qe1BJwqfi91w3+rhznZB9+s8av4Iz0RW3SnWwTwOjgPlqn88FmewfYKNSdFiBp2mMzfMMdXoydc95Y377dYy78hUZP1l92p2o0njLXJ5tem8Xr7tGifqvjcrtlnp3AV8AM3WhitsERu5jpxXRV/WoTp3CfU+J65+s6Eas17t1FAllMtiKYURPZbRG1a6i4BUtpNq9+0jvLEaKhmUy2r6j5vBaIZrDe021jJ6g50o9WwIoKs7L8McU7Ff1bBemoqG7jK5Ra1Lt7jAFaw7vBc/K8EvuPn9TNaSoeDnoBGxBwyhCuukkrCNeqAtWSkpKSgoRtwGa1E20IEeVTQAAAABJRU5ErkJggg==">
            <a href="Index.html"> Home</a>
            <a href="Reservas.html"> Minha Conta</a>
            <a href="Todos os voos.html">Todos os Vôos</a>
            <a href="Sobre.html">Sobre</a>
        </aside>
    </header>
</head>

<body>
    <main>
        <div class="login-container">
            <h2>Consulte sua reserva:</h2>
            <p> Entre em sua conta para verificar sua reserva</p>
            <form action="login.php" method="POST">
                <div class="form-group">
                    <label for="username">Login:</label>
                    <input type="text" id="username" name="username" placeholder="Digite aqui o seu login">
                </div>
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="Digite aqui sua senha">
                </div>
                <div class="form-group">
                    <button type="submit">Ver Reservas</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>