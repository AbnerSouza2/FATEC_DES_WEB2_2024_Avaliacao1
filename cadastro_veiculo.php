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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de veiculos</title>
    
</head>
<body>


    <div class="container-cadastro">
    <div class="box-cadastro"> <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Logo_fatec_araras.png" alt=""> <h2 claas="textlogin-cadastro">Cadastro de Veículos</h2><br>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome"  placeholder="Nome Completo"required><br><br>
        <label for="ra"> RA: </label>
        <input type="text" id="ra" name="ra" placeholder="RA Aluno" required><br><br>
        <label for="placa">Placa:</label>
        <input type="text" id="placa" name="placa" placeholder="Tipo de veiculo" required><br><br>
        <label for="tipo">Tipo de Veículo:</label>
        <select id="tipo" name="tipo">
            <option value="carro">Carro</option>
            <option value="moto">Moto</option>
        </select><br><br>
        <input type="submit" value="Cadastrar">
    </form><br>
    <a href="vizualizar_carro.php">Visualizar carros</a><br>
    <a href="vizualizar_moto.php">Visualizar motos</a><br>
    <a href="index.php?logout=true">Logout</a>
    <br>
    </div>
</div>
</body>
</html>