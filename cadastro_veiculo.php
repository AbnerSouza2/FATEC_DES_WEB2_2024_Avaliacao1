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
    <link rel="stylesheet" href="style.css">
    <title>Cadastro de veiculos</title>
    
</head>

<body>
<script>
    function exibirMensagem() {
        alert("Cadastro de veículo realizado com sucesso!");
    }
</script>


    <div class="container-cadastro">
    <div class="box-cadastro"> <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Logo_fatec_araras.png" alt=""> <h2 claas="textlogin-cadastro">Cadastro de Veículos</h2><br>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>"onsubmit="exibirMensagem()">
        <label class="labelleft" for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome"  placeholder="Insira o nome Completo"required><br><br>
        <label class="labelleft" for="ra"> RA: </label>
        <input type="text" id="ra" name="ra" placeholder="Insira o RA do aluno" required><br><br>
        <label class="labelleft" for="placa">Placa do veículo:</label>
        <input type="text" id="placa" name="placa" placeholder="Insira a placa do veiculo" required><br><br>
        <label for="tipo">Tipo de Veículo:</label>
        <select id="tipo" name="tipo">
            <option value="carro">Carro</option>
            <option value="moto">Moto</option>
        </select><br><br>
        <input class="botaocadastrar" type="submit" value="Cadastrar">
    </form><br>
    <a href="vizualizar_carro.php">Visualizar carros</a><br><br>
    <a href="vizualizar_moto.php">Visualizar motos</a><br><br>
    <a href="index.php?logout=true">Logout</a>
    <br>
    </div>
</div>
</body>
</html>