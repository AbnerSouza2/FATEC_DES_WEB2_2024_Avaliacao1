<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php");
    exit();
}

// Lê e exibe os registros de motos
$motos = file("motos.txt", FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Motos</title>
</head>
<body>
    <h2>Motos Cadastradas</h2>
    <ul>
        <?php foreach ($motos as $moto) {
            echo "<li>$moto</li>";
        } ?>
    </ul>
    <br>
    <a href="dashboard.php">Voltar</a><br>
    <a href="index.php?logout=true">Logout</a>
</body>
</html>