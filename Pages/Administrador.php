<?php
if(!isset($_SESSION)) session_start();
include "../Includes/Config.php";

if(!isset($_SESSION['UsuarioID'])){
    session_destroy();

    header("Location: ../index.php");
    exit;
}

if($_SESSION['UsuarioNivel'] == 1){
    header("Location: Home.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" type="text/css" href="../Styles/StylesAdm.css">
    <title>Painel Admin</title>
</head>
<body>
    <main class="Adm-Screen">
        <div class="Conteudo">
            <text class="Texto-Principal">
                Olá <b><?php echo $_SESSION['UsuarioNome'] ?></b></Br>Bem vindo ao painel de administrador! 
            </text>
            <a class="Btn-Voltar" href="Home.php">Voltar</a>
        </div>
    </main>
</body>
</html>