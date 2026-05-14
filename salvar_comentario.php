<?php
session_start();

date_default_timezone_set('America/Sao_Paulo');

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$banco = new SQLite3('banco.db');

$idUsuario = $_SESSION['user']['id'];

$idQuadrinho = $_POST['id_quadrinho'];
$comentario = trim($_POST['comentario']);


if ($comentario == '') {

    header("Location: detalhe.php?id=".$idQuadrinho);
    exit;
}


$stmt = $banco->prepare("
INSERT INTO comentarios
(id_quadrinho, id_usuario, comentario)

VALUES

(:q, :u, :c)
");

$stmt->bindValue(':q', $idQuadrinho);
$stmt->bindValue(':u', $idUsuario);
$stmt->bindValue(':c', $comentario);

$stmt->execute();

header("Location: detalhe.php?id=".$idQuadrinho);
exit;
?>