<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sagas - Marvel Comics</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="sagas.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>

<table style="margin: 0 auto;">
            <tr>
                
                <header class="cabecalho text-center" style="background-color: rgb(0, 0, 0);">
                    <img src="Marvel Comics Logo HD.png" alt="Marvel Logo" width="175">
                    <nav class="mt-3">
                </td>
            </tr>

            <div style="position:absolute; right:20px; top:20px;">

            <?php if (!isset($_SESSION['user'])): ?>

<a href="login.php" class="btn btn-light btn-sm">Login</a>
<a href="cadastro.php" class="btn btn-warning btn-sm">Cadastro</a>

<?php else: ?>

<?php if ($_SESSION['user']['tipo'] == 'admin'): ?>
    <img src="admin.png" width="25">
<?php else: ?>
    <img src="user.png" width="25">
<?php endif; ?>

<span style="color:white; margin: 0 10px;">
    <?= $_SESSION['user']['username'] ?>
</span>

<?php if ($_SESSION['user']['tipo'] == 'admin'): ?>
    <a href="dashboard.php" class="btn btn-warning btn-sm">Dashboard</a>
<?php endif; ?>

<a href="logout.php" class="btn btn-danger btn-sm">Sair</a>

<?php endif; ?>

</div>

            <tr>
                <td style="text-align: center; font-size: 30px; padding: 10px;">
                    Blog Marvel Comics Senac
                </td>

                <td style="text-align: left;">
                    <nav>
                    <a href="index.php">Menu</a>
                    <a href="bios.php">Bios</a>
                    <a href="timelines.php">Linha do Tempo</a>
                    <a href="multiverso.php">Multiverso</a>
                    <a href="sagas.php">Sagas</a>
                    </nav>
                </td>

                <td></td>
            </tr>
        </table>


<div class="container mt-5 mb-5">

    <a href="sagaaranhaindice.php" class="saga-link">
        <div class="saga-card" style="background-image: url('sagasbanner/sagaaranha.jpg');">
            <h1>HOMEM-ARANHA</h1>
        </div>
    </a>

    <a href="sagasdosvingadores.php" class="saga-link">
        <div class="saga-card" style="background-image: url('sagasbanner/sagavingadores.png');">
            <h1>VINGADORES</h1>
        </div>
    </a>

    <a href="sagaxmenindice.php" class="saga-link">
        <div class="saga-card" style="background-image: url('sagasbanner/sagaxmen.png');">
            <h1>X-MEN</h1>
        </div>
    </a>

    <a href="sagafantasticoindice.php" class="saga-link">
        <div class="saga-card" style="background-image: url('sagasbanner/sagafantastico.avif');">
            <h1>QUARTETO FANTÁSTICO</h1>
        </div>
    </a>

    <a href="sagapaladinosind.php" class="saga-link">
        <div class="saga-card" style="background-image: url('sagasbanner/sagapaladinos.jpg');">
            <h1>PALADINOS MARVEL</h1>
        </div>
    </a>

    <a href="sagaguardindex.php" class="saga-link">
        <div class="saga-card" style="background-image: url('sagasbanner/sagacosmica.png');">
            <h1>GUARDIÕES DA GALAXIA</h1>
        </div>
    </a>

    <a href="sagaviloes.php" class="saga-link">
        <div class="saga-card" style="background-image: url('sagasbanner/sagaviloes.png');">
            <h1>Vilões</h1>
        </div>
    </a>

</div>


<footer class="footer-marvel text-center py-3" style="background:black; color:white;">
    © 2026 - Blog Marvel Comics Senac
</footer>

</body>
</html>