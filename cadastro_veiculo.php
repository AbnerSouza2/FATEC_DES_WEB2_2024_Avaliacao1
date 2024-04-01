<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php");
    exit();
}

// Função para salvar registros em arquivo
function salvarRegistro($dados, $arquivo) {
    $handle = fopen($arquivo, "a");
    fwrite($handle, $dados . PHP_EOL);
    fclose($handle);
}

// Cadastro de veículo
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $ra = $_POST["ra"];
    $placa = $_POST["placa"];
    
    if ($_POST["tipo"] == "carro") {
        salvarRegistro("$nome|$ra|$placa", "carros.txt");
    } elseif ($_POST["tipo"] == "moto") {
        salvarRegistro("$nome , $ra|$placa", "motos.txt");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
</head>
<body>
    <h2>Cadastro de Veículos</h2>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="ra">RA:</label>
        <input type="text" id="ra" name="ra" required><br><br>
        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" required><br><br>
        <label for="tipo">Tipo de Veículo:</label>
        <select id="tipo" name="tipo">
            <option value="carro">Carro</option>
            <option value="moto">Moto</option>
        </select><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="carros.txt">Visualizar carros</a><br>
    <a href="motos.txt">Visualizar motos</a><br><br>
    <a href="index.php?logout=true">Logout</a>
</body>
</html>