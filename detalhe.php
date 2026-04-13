<?php

$banco = new SQLite3('banco.db');

$id = $_GET['id'] ?? 0;


$stmt = $banco->prepare("SELECT * FROM quadrinhos WHERE id = :id");
$stmt->bindValue(':id', $id);

$resultado = $stmt->execute();
$q = $resultado->fetchArray();

if (!$q) {
    echo "Quadrinho não encontrado.";
    exit;
}


$pasta = '';

switch ($q['universo']) {
    case 'Homem-Aranha':
        $pasta = 'spider/';
        break;

    case 'Vingadores':
        $pasta = 'vingadores/';
        break;

    case 'X-Men':
        $pasta = 'xmen/';
        break;

    default:
        $pasta = 'outros/';
        break;
}


$imagem = $pasta . "spiderman" . $q['id'] . ".jpg";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= $q['titulo'] ?></title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #111; color: white;">

<header class="text-center" style="background:black; padding:20px;">
    <img src="Marvel Comics Logo HD.png" width="150">

    <div style="margin-top:15px;">
        <a href="javascript:history.back()" class="btn btn-danger">
            ← Voltar
        </a>
    </div>

    <h2 style="margin-top:10px;">
        <?= $q['titulo'] ?>
    </h2>
</header>

<div class="container mt-5 mb-5">

    <div class="row">

        
        <div class="col-md-4 text-center">
            <img src="<?= $imagem ?>" class="img-fluid shadow" style="border-radius:10px;">
        </div>

       
        <div class="col-md-8">

            <h3><?= $q['titulo'] ?></h3>

            <p><strong>Universo:</strong> <?= $q['universo'] ?></p>
            <p><strong>Fase:</strong> <?= $q['fase'] ?></p>
            <p><strong>Lançamento:</strong> <?= $q['data_lancamento'] ?></p>
            <p><strong>Escritor:</strong> <?= $q['escritor'] ?></p>
            <p><strong>Artista:</strong> <?= $q['artista'] ?></p>

            <hr style="background:white;">

            <h4>Sinopse</h4>
            <p style="text-align:justify;">
                <?= $q['sinopse'] ?>
            </p>

        </div>

    </div>

</div>

<footer class="text-center py-3" style="background:black; color:white;">
    © 2026 - Blog Marvel
</footer>

</body>
</html>