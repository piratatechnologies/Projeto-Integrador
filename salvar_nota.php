<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

$banco = new SQLite3('banco.db');

$idUsuario = $_SESSION['user']['id'];

$idQuadrinho = $_POST['id_quadrinho'];

$nota = $_POST['nota'];

$verifica = $banco->prepare("
SELECT id
FROM notas
WHERE id_usuario = :u
AND id_quadrinho = :q
");

$verifica->bindValue(':u', $idUsuario);
$verifica->bindValue(':q', $idQuadrinho);

$resultado = $verifica->execute()->fetchArray();

if ($resultado) {

    $update = $banco->prepare("
    UPDATE notas
    SET nota = :n
    WHERE id_usuario = :u
    AND id_quadrinho = :q
    ");

    $update->bindValue(':n', $nota);
    $update->bindValue(':u', $idUsuario);
    $update->bindValue(':q', $idQuadrinho);

    $update->execute();

} else {

    $insert = $banco->prepare("
    INSERT INTO notas
    (id_usuario, id_quadrinho, nota)

    VALUES
    (:u, :q, :n)
    ");

    $insert->bindValue(':u', $idUsuario);
    $insert->bindValue(':q', $idQuadrinho);
    $insert->bindValue(':n', $nota);

    $insert->execute();
}

header("Location: detalhe.php?id=" . $idQuadrinho);