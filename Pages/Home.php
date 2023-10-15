<?php
if(!isset($_SESSION)) session_start();
include "../Includes/Config.php";

$nome = "";

if(!isset($_SESSION['UsuarioID'])){
   session_destroy();

   header('Location: ../index.php'); exit;
}

if(isset($_SESSION['UsuarioNome'])){
    $nome = $_SESSION['UsuarioNome'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="StyleSheet" type="text/css" href="../Styles/StylesHome.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&display=swap" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <main class="Home-Screen">
        <div class="Conteudo">
            <text class="Texto-Principal">
                Olá <b><?php echo $nome ?></b></br>Você está logado como: 
                <?php
                    if(isset($_SESSION['UsuarioNivel'])){ 
                        if($_SESSION['UsuarioNivel'] == 1){
                            echo "<b> Usuário Comum</B>";

                        }elseif($_SESSION['UsuarioNivel'] == 2){
                            echo "<b> Usuário Administrador</B>";
                        }
                    }
                ?>
            </text>
            <a class="Btn-LogOut" href="../Includes/LogOut.php">Sair</a>
        </div>
    </main>
</body>