<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php");
    exit();
}

// Lê e exibe os registros de carros
$carros = file("carros.txt", FILE_IGNORE_NEW_LINES);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar Carros</title>
</head>
<body>
    <h2>Carros Cadastrados</h2>
    <ul>
        <?php foreach ($carros as $carro) {
            echo "<li>$carro</li>";
        } ?>
    </ul>
    <br>
    <a href="cadastro_veiculo.php">Voltar</a><br>
    <a href="index.php?logout=true">Logout</a>
</body>
</html>