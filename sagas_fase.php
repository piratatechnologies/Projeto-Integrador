<?php

$fase = $_GET['fase'] ?? '';
$universo = $_GET['universo'] ?? '';

$css = "default.css"; 

if ($universo == "homem-aranha") {
    $css = "sagaaranha.css";
} elseif ($universo == "vingadores") {
    $css = "sagavingadores.css";
} elseif ($universo == "xmen") {
    $css = "sagaxmen.css";
} elseif ($universo == "Quarteto Fantástico") {
    $css = "sagafantastico.css";
}elseif ($universo == "Paladinos Marvel") {
    $css = "sagapaladinos.css";
}elseif ($universo == "quarteto4") {
    $css = "sagafantastico.css";
}elseif ($universo == "quarteto4") {
    $css = "sagafantastico.css";
}

try {
    $db = new PDO("sqlite:banco.db");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
    exit();
}

$stmt = $db->prepare("
    SELECT * FROM quadrinhos 
    WHERE LOWER(fase) = LOWER(?) 
    AND LOWER(universo) = LOWER(?)
");
$stmt->execute([$fase, $universo]);

$quadrinhos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <link rel="stylesheet" href="<?php echo $css; ?>">
    <meta charset="UTF-8">
    <title><?= strtoupper($fase) ?></title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="<?php echo $css; ?>">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>

<header class="cabecalho text-center" style="background-color: black; padding:20px;">

    <img src="Marvel Comics Logo HD.png" width="175">

    <div style="margin-top:15px;">
        <a href="javascript:history.back()" class="btn btn-danger">
            ← Voltar
        </a>
    </div>

    <h2 style="color:white; margin-top:15px;">
    <?= mb_strtoupper($universo, 'UTF-8') ?>
    -
    <?= mb_strtoupper($fase, 'UTF-8') ?></h2>
</header>

<div class="container mt-5 mb-5">

    <div class="row">

        <?php foreach ($quadrinhos as $q): 

            $universoDB = strtolower($q['universo']);

            if ($universoDB == "homem-aranha") {
                $pasta = "spider";
            } elseif ($universoDB == "vingadores") {
                $pasta = "sagavingadores";
            } elseif ($universoDB == "xmen") {
                $pasta = "sagaxmen";
            } elseif ($universoDB == "quarteto fantástico") {
                $pasta = "sagaquarteto";
            } elseif ($universoDB == "paladinos marvel") {
                $pasta = "sagapaladinos";    
            } else {
                $pasta = "outros";
            }

            
            $imagem = $pasta . "/" . $q['imagem'];

            
        ?>

        <div class="col-md-3">
            <div class="card mb-4 shadow-sm">

                <a href="detalhe.php?id=<?= $q['id'] ?>">
                    <img src="<?= $imagem ?>" class="card-img-top">
                </a>

                <div class="card-body text-center">
                    <h5><?= $q['titulo'] ?></h5>

                    <a href="detalhe.php?id=<?= $q['id'] ?>" class="btn btn-primary">
                        Detalhes
                    </a>
                </div>

            </div>
        </div>

        <?php endforeach; ?>

    </div>

</div>

<footer class="footer-marvel text-center py-3" style="background:black; color:white;">
    © 2026 - Blog Marvel Comics Senac
</footer>

</body>
</html>