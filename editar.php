<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM quadrinhos WHERE id = ?");
$stmt->execute([$id]);
$q = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_POST) {
    $stmt = $pdo->prepare("
        UPDATE quadrinhos SET
        titulo=?, universo=?, fase=?, data_lancamento=?, escritor=?, artista=?, sinopse=?, imagem=?
        WHERE id=?
    ");

    $stmt->execute([
        $_POST['titulo'],
        $_POST['universo'],
        $_POST['fase'],
        $_POST['data'],
        $_POST['escritor'],
        $_POST['artista'],
        $_POST['sinopse'],
        $_POST['imagem'],
        $id
    ]);

    header("Location: listar.php");
}
?>

<h1>Editar Quadrinho</h1>

<form method="POST">

<input name="titulo" value="<?= $q['titulo'] ?>">
<input name="universo" value="<?= $q['universo'] ?>">
<input name="fase" value="<?= $q['fase'] ?>">
<input name="data" value="<?= $q['data_lancamento'] ?>">
<input name="escritor" value="<?= $q['escritor'] ?>">
<input name="artista" value="<?= $q['artista'] ?>">
<textarea name="sinopse"><?= $q['sinopse'] ?></textarea>
<input name="imagem" value="<?= $q['imagem'] ?>">

<button>Atualizar</button>

</form>