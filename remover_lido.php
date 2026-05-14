<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$banco = new SQLite3('banco.db');

$idQuadrinho = $_GET['id'];
$idUsuario = $_SESSION['user']['id'];

$query = $banco->prepare("
DELETE FROM lidos
WHERE id_quadrinho = :q
AND id_usuario = :u
");

$query->bindValue(':q', $idQuadrinho);
$query->bindValue(':u', $idUsuario);

$query->execute();

header("Location: lidos.php");
exit;
?>