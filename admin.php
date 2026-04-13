<?php
session_start();
include('../conexao.php');

if ($_POST) {
    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];

    $stmt = $pdo->prepare("SELECT * FROM usuarios WHERE usuario = ? AND senha = ?");
    $stmt->execute([$usuario, $senha]);

    if ($stmt->fetch()) {
        $_SESSION['admin'] = $usuario;
        header("Location: dashboard.php");
    } else {
        echo "Login inválido";
    }
}
?>

<form method="POST">
    <input type="text" name="usuario" placeholder="Usuário">
    <input type="password" name="senha" placeholder="Senha">
    <button>Entrar</button>
</form>