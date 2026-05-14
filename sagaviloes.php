<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sagas dos Vingadores - Marvel Comics</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="sagaviloes.css">

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

        <?php else: ?>

        <a href="lidos.php" class="btn btn-primary btn-sm">
            Quadrinhos Lidos
        </a>

    <?php endif; ?>

    <a href="logout.php" class="btn btn-danger btn-sm">
        Sair
    </a>

<?php endif; ?>

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

        <div class="row">

            
            <div class="col-md-6 mb-4">
                <a href="sagasprevingadores.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagadoom.webp');">
                        <div class="overlay">
                            <h1>DOUTOR DESTINO</h1>
                        </div>
                    </div>
                </a>
            </div>


            <div class="col-md-6 mb-4">
                <a href="sagavmod.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagacaveira.webp');">
                        <div class="overlay">
                            <h1>CAVEIRA VERMELHA</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagavmod.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagamagneto.jpg');">
                        <div class="overlay">
                            <h1>MAGNETO</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagavmod.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagathanos.png');">
                        <div class="overlay">
                            <h1>THANOS</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagaloki.webp');">
                        <div class="overlay">
                            <h1>LOKI</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagataskmaster.jpg');">
                        <div class="overlay">
                            <h1>TREINADOR</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagafanatico.jpg');">
                        <div class="overlay">
                            <h1>FANATICO</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagaduendem.jpg');">
                        <div class="overlay">
                            <h1>DUENDE MACABRO</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagavenom.jpg');">
                        <div class="overlay">
                            <h1>VENOM</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagaferrosuperior.webp');">
                        <div class="overlay" STYLE="TEXT-ALIGN: CENTER">
                            <h1>HOMEM DE FERRO<br>SUPERIOR</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagacarnificina.webp');">
                        <div class="overlay">
                            <h1>CARNIFICINA</h1>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-md-6 mb-4">
                <a href="sagaallnew.html" class="vingadores-link">
                    <div class="vingadores-card" style="background-image: url('sagasbanner/sagamorbius.webp');">
                        <div class="overlay">
                            <h1>MORBIUS</h1>
                        </div>
                    </div>
                </a>
            </div>









        </div>

    </div>

    
    <footer class="footer-marvel text-center py-3" style="background:black; color:white;">
        © 2026 - Blog Marvel Comics Senac
    </footer>

</body>

</html>