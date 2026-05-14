<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}

$banco = new SQLite3('banco.db');

$idUsuario = $_SESSION['user']['id'];

$query = $banco->prepare("
SELECT q.*, n.nota
FROM lidos l

INNER JOIN quadrinhos q
ON q.id = l.id_quadrinho

LEFT JOIN notas n
ON n.id_quadrinho = q.id
AND n.id_usuario = :u

WHERE l.id_usuario = :u

ORDER BY q.id DESC
");

$query->bindValue(':u', $idUsuario);

$resultado = $query->execute();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>Quadrinhos Lidos</title>

<link rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

<style>

body{
    background:#0f0f0f;
    color:white;
    font-family:Arial;
}

.titulo{
    text-align:center;
    margin-top:40px;
    margin-bottom:40px;
    font-size:40px;
    font-weight:bold;
}

.grid-quadrinhos{
    display:grid;
    grid-template-columns:repeat(auto-fill, minmax(180px,1fr));
    gap:25px;
}

.card-quadrinho{
    transition:0.3s;
    text-align:center;
}

.card-quadrinho:hover{
    transform:scale(1.04);
}

.card-quadrinho img{
    width:100%;
    height:270px;
    object-fit:cover;
    border-radius:8px;
    box-shadow:0 0 10px rgba(255,255,255,0.1);
}

.nome-quadrinho{
    margin-top:12px;
    font-size:17px;
    font-weight:bold;
    color:white;
}

.nota{
    color:#ccc;
    margin-top:5px;
    font-size:15px;
}

.link-card{
    text-decoration:none !important;
}

.botoes{
    margin-top:10px;
}

</style>

</head>

<body>

<div class="container">

<h1 class="titulo">
Quadrinhos lidos por
<?= $_SESSION['user']['username'] ?>
</h1>

<div class="grid-quadrinhos">

<?php while($q = $resultado->fetchArray()): ?>

<?php

$pasta = '';

switch ($q['universo']) {

    case 'Homem-Aranha':
        $pasta = 'spider/';
        break;

    case 'Vingadores':
        $pasta = 'sagavingadores/';
        break;

    case 'X-Men':
        $pasta = 'sagaxmen/';
        break;

    default:
        $pasta = 'outros/';
        break;
}

?>

<div class="card-quadrinho">

<a class="link-card"
href="detalhe.php?id=<?= $q['id'] ?>">

<img src="<?= $pasta . $q['imagem'] ?>">

<div class="nome-quadrinho">
<?= $q['titulo'] ?>
</div>

<div class="nota">

<?php if ($q['nota']): ?>

⭐ <?= $q['nota'] ?>/5

<?php else: ?>

Sem nota

<?php endif; ?>

</div>

</a>

<div class="botoes">

<a href="remover_lido.php?id=<?= $q['id'] ?>"
class="btn btn-danger btn-sm">
Remover
</a>

</div>

</div>

<?php endwhile; ?>

</div>

</div>

</body>
</html>