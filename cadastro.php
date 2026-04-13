<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new PDO("sqlite:banco.db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = isset($_POST['senha']) ? password_hash($_POST['senha'], PASSWORD_DEFAULT) : '';

    if ($username && $email && $senha) {

        $stmt = $db->prepare("INSERT INTO usuarios (username, email, senha) VALUES (?, ?, ?)");
        $stmt->execute([$username, $email, $senha]);

        echo "<p style='color:green; text-align:center;'>Conta criada!</p>";
    } else {
        echo "<p style='color:red; text-align:center;'>Preencha todos os campos</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Cadastro</title>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<style>
body {
    background: #111;
    color: white;
}

.box {
    max-width: 400px;
    margin: 100px auto;
    background: #1c1c1c;
    padding: 30px;
    border-radius: 10px;
}

h2 {
    text-align: center;
}

.btn-marvel {
    background: red;
    color: white;
}
</style>
</head>

<body>

<div class="box">

<h2>Cadastro</h2>

<form method="POST">

    <input type="text" name="username" class="form-control mb-3" placeholder="Usuário">

    <input type="email" name="email" class="form-control mb-3" placeholder="Email">

    <input type="password" name="senha" class="form-control mb-3" placeholder="Senha">

    <button class="btn btn-marvel btn-block">Cadastrar</button>

</form>

</div>

</body>
</html>