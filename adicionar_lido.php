<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$banco = new SQLite3('banco.db');

$idUsuario = $_SESSION['user']['id'];
$idQuadrinho = $_GET['id'];

$verifica = $banco->prepare("
SELECT * FROM lidos
WHERE id_usuario = :u
AND id_quadrinho = :q
");

$verifica->bindValue(':u', $idUsuario);
$verifica->bindValue(':q', $idQuadrinho);

$res = $verifica->execute()->fetchArray();

if (!$res) {

    $stmt = $banco->prepare("
    INSERT INTO lidos(id_usuario,id_quadrinho)
    VALUES(:u,:q)
    ");

    $stmt->bindValue(':u', $idUsuario);
    $stmt->bindValue(':q', $idQuadrinho);

    $stmt->execute();
}

header("Location: detalhe.php?id=".$idQuadrinho);