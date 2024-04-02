<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de login e senha estão corretos
    if ($_POST["login"] == "portaria" && $_POST["senha"] == "FatecAraras") {
        $_SESSION["logged_in"] = true;
        header("Location: cadastro_veiculo.php");
        exit();
    } else {
        $error = "Login ou senha incorretos.";
    }
}

// Faz o logout
if (isset($_GET["logout"])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <div class="box"> <img src="https://upload.wikimedia.org/wikipedia/commons/b/b2/Logo_fatec_araras.png" alt=""><h2 class="textlogin">Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" placeholder="Insira seu login"required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" placeholder="Insira sua senha"required><br><br>
        <input class="botaoentrar" type="submit" value="Entrar">
    </form>
    </div>
    </div>
</body>
</html>