<?php
session_start();

// Verifica se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se os campos de login e senha estão corretos
    if ($_POST["login"] == "portaria" && $_POST["senha"] == "FatecAraras") {
        $_SESSION["logged_in"] = true;
        header("Location: dashboard.php");
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
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) { echo "<p>$error</p>"; } ?>
    <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="login">Login:</label>
        <input type="text" id="login" name="login" required><br><br>
        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>