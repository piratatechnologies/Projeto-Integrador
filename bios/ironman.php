<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Homem de Ferro| Marvel Comics</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    

    
    
</head>

<body>
    <div class="barra-esquerda"></div>
    <div class="barra-direita"></div>

    
<header class="cabecalho">

<table style="margin: 0 auto;">
    <tr>
        <header class="cabecalho text-center" style="background-color: rgb(0, 0, 0);">
            <img src="Marvel Comics Logo HD.png" alt="Marvel Logo" width="175">
            <nav class="mt-3">
            <div style="position:absolute; right:20px; top:20px;">

            <?php if (!isset($_SESSION['user'])): ?>

<a href="login.php" class="btn btn-light btn-sm">Login</a>
<a href="cadastro.php" class="btn btn-warning btn-sm">Cadastro</a>

<?php else: ?>

    <?php if ($_SESSION['user']['tipo'] == 'admin'): ?>
    <img src="../admin.png" width="25">
<?php else: ?>
    <img src="../user.png" width="25">
<?php endif; ?>

<span style="color:white; margin: 0 10px;">
    <?= $_SESSION['user']['username'] ?>
</span>

<?php if ($_SESSION['user']['tipo'] == 'admin'): ?>
    <a href="../dashboard.php" class="btn btn-warning btn-sm">Dashboard</a>

    <?php else: ?>

    <a href="../lidos.php" class="btn btn-primary btn-sm">
        Quadrinhos Lidos
    </a>

<?php endif; ?>

<a href="logout.php" class="btn btn-danger btn-sm">
    Sair
</a>

<?php endif; ?>

</div>
  
        <td style="text-align: center; font-size: 30px; padding: 10px;">
            Blog Marvel Comics Senac
        </td>

        <td style="text-align: left;">
            <nav>
                <a href="../index.php">Menu</a>
                <a href="../bios.php">Bios</a>
                <a href="../timelines.php">Linha do Tempo</a>
                <a href="../multiverso.php">Multiverso</a>
                <a href="../sagas.php">Sagas</a>
            </nav>
        </td>

        <td></td>
    </tr>
</table>

    
    <main class="container my-5">

        <div class="row">
           
            <div class="col-md-4 text-center">
                <img src="biocapas/iron.jpg" alt="Homem-Aranha" class="img-fluid rounded shadow">
            </div>

           
            <div class="col-md-8">
                <h1>Homem de Ferro</h1>
                <h5 class="text-muted">Peter Parker</h5>

                <p class="mt-3">
                    O Homem-Aranha é um dos heróis mais icônicos da Marvel Comics.
                    Criado por Stan Lee e Steve Ditko, ele apareceu pela primeira vez
                    em <strong>Amazing Fantasy #15 (1962)</strong>.
                </p>

                <ul class="list-group">
                    <li class="list-group-item"><strong>Nome real:</strong> Peter Parker</li>
                    <li class="list-group-item"><strong>Universo:</strong> Terra-616</li>
                    <li class="list-group-item"><strong>Ocupação:</strong> Estudante / Fotógrafo</li>
                    <li class="list-group-item"><strong>Base:</strong> Nova York</li>
                </ul>
            </div>
        </div>

        
        <section class="mt-5">
            <h3>Poderes e Habilidades</h3>
            <p>
                Após ser picado por uma aranha radioativa, Peter Parker adquiriu
                habilidades sobre-humanas.
            </p>
            <ul>
                <li>Força e agilidade sobre-humanas</li>
                <li>Sentido Aranha</li>
                <li>Capacidade de escalar paredes</li>
                <li>Intelecto genial</li>
            </ul>
        </section>

        
        <section class="mt-4">
            <h3>História</h3>
            <p>
                Após a morte de seu tio Ben, causada indiretamente por sua omissão,
                Peter aprende que <strong>"Com grandes poderes vêm grandes responsabilidades"</strong>.
                Desde então, dedica sua vida a proteger os inocentes como o Homem-Aranha.
            </p>
        </section>

    </main>

    
    <footer class="footer-marvel text-center py-3">
© 2026 - Blog Marvel Comics Senac
    </footer>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>