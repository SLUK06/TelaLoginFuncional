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
    <title>Painel Admin</title>
</head>
<body>
    Painel Administrador
</body>
</html>