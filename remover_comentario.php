<?php

session_start();

if (!isset($_SESSION['user'])) {
    die("Faça login.");
}

$db = new SQLite3('banco.db');

$id = intval($_GET['id']);

$usuario_id = $_SESSION['user']['id'];


$stmt = $db->prepare("
SELECT *
FROM comentarios
WHERE id = :id
");

$stmt->bindValue(':id', $id);

$resultado = $stmt->execute();

$comentario = $resultado->fetchArray();


if (!$comentario) {
    die("Comentário não encontrado.");
}


if ($comentario['id_usuario'] != $usuario_id) {
    die("Você não pode apagar este comentário.");
}


$delete = $db->prepare("
DELETE FROM comentarios
WHERE id = :id
");

$delete->bindValue(':id', $id);

$delete->execute();


header("Location: " . $_SERVER['HTTP_REFERER']);
exit;

?>