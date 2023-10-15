<?php
include "Includes/Config.php";

$loginInvalido ="";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $usuario = $_POST["Usuario"];
    $senha = $_POST["Senha"];

    $sql = "SELECT `id`, `nome`, `nivel` FROM `usuarios` WHERE `usuario` = '$usuario' OR `email` = '$usuario' AND `senha` = '$senha' AND `ativo` = 1 LIMIT 1";

    $query = $conn->query($sql);;

    if(mysqli_num_rows($query) !== 1){
        $loginInvalido = "Usuário ou senha estão incorretos!";

    }else{
        $resultado = mysqli_fetch_assoc($query);

        if(!isset($_SESSION)) session_start();

        $_SESSION['UsuarioID'] = $resultado['id'];
        $_SESSION['UsuarioNome'] = $resultado['nome'];
        $_SESSION['UsuarioNivel'] = $resultado['nivel'];

        header("Location: Pages/Home.php");
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" type="text/css" href="Styles/StylesLogin.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
    <title>Login</title>
</head>
<body>
    <main class="login-screen">
        <div class="login-container">
            <label class="title">LOGIN</label>
            <form class="login" method="POST">
                <div class="login-inputs">
                    <div class="col-email">
                        <label class="text-label">Email ou Usuário:</label>
                        <input type="text" class="inputs" name="Usuario" placeholder="Email ou Usuário" required/>
                    </div>
                    <div class="col-senha">
                        <label class="text-label">Senha:</label>
                        <input type="password" class="inputs" name="Senha" placeholder="Senha" required/>
                    </div>    
                    <button type="submit" class="btn-inputs">LOG IN</button>
                </div> 
            </form>
            <text class="msg-Erro"><?php echo $loginInvalido ?></text>
        </div>
    </main>
</body>
</html>