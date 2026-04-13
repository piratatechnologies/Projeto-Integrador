<?php
session_start();
$db = new PDO("sqlite:banco.db");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $stmt = $db->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($senha, $user['senha'])) {

        $_SESSION['user'] = $user;

       
        header("Location: index.php");
        exit();

    } else {
        $erro = "Login inválido";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login</title>

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
    margin-bottom: 20px;
}

.btn-marvel {
    background: red;
    color: white;
}
</style>

</head>

<body>

<div class="box">

<h2>Login</h2>

<?php if(isset($erro)) echo "<p style='color:red'>$erro</p>"; ?>

<form method="POST">

    <input name="email" class="form-control mb-3" placeholder="Email">

    <input type="password" name="senha" class="form-control mb-3" placeholder="Senha">

    <button class="btn btn-marvel btn-block">Entrar</button>

</form>

</div>

</body>
</html>