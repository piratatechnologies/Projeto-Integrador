<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Bios dos Personagens | Marvel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="barra-esquerda"></div>
    <div class="barra-direita"></div>

    
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

    
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Bios dos principais heróis e vilões do Universo Marvel</h1>
            <p class="lead text-muted">Selecione um personagem para ver sua biografia</p>
        </div>
    </section>

    <div class="container">
        <div class="row">

            
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/aranhaicon.png" class="card-img-top personagem-img" alt="Homem-Aranha">
                    <div class="card-body">
                        <h5>Homem-Aranha</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/spiderman.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/ironmanicon.png" class="card-img-top personagem-img" alt="homem-de-ferro">
                    <div class="card-body">
                        <h5>Homem de Ferro</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/ironman.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/captainicon.png" class="card-img-top personagem-img" alt="capitão">
                    <div class="card-body">
                        <h5>Capitão América</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/captain.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/thoricon.png" class="card-img-top personagem-img" alt="thor">
                    <div class="card-body">
                        <h5>Thor</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/thor.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/hulkicon.png" class="card-img-top personagem-img" alt="hulk">
                    <div class="card-body">
                        <h5>Hulk</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/hulk.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/viuvaicon.png" class="card-img-top personagem-img" alt="viuva">
                    <div class="card-body">
                        <h5>Viúva Negra</h5>
                        <p class="text-muted">Heróina</p>
                        <a href="bios/viuva.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/arqueiroicon.png" class="card-img-top personagem-img" alt="arqueiro">
                    <div class="card-body">
                        <h5>Gavião Arqueiro</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/arqueiro.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/estranhoicon.png" class="card-img-top personagem-img" alt="estranho">
                    <div class="card-body">
                        <h5>Doutor Estranho</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/estranho.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/panteraicon.png" class="card-img-top personagem-img" alt="pantera">
                    <div class="card-body">
                        <h5>Pantera Negra</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/pantera.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/feiticeiraicon.png" class="card-img-top personagem-img" alt="feiticeira">
                    <div class="card-body">
                        <h5>Feiticeira Escarlate</h5>
                        <p class="text-muted">Heroína</p>
                        <a href="bios/feiticeira.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/thanosicon.png" class="card-img-top personagem-img" alt="thanos">
                    <div class="card-body">
                        <h5>Thanos</h5>
                        <p class="text-muted">Vilão</p>
                        <a href="bios/thanos.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/lokiicon.png" class="card-img-top personagem-img" alt="loki">
                    <div class="card-body">
                        <h5>Loki</h5>
                        <p class="text-muted">Vilão</p>
                        <a href="bios/loki.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/ultronicon2.png" class="card-img-top personagem-img" alt="ultron">
                    <div class="card-body">
                        <h5>Ultron</h5>
                        <p class="text-muted">Vilão</p>
                    <a href="bios/ultron.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                </div>
            </div>
        </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/destinoicon.png" class="card-img-top personagem-img" alt="destino">
                    <div class="card-body">
                        <h5>Doutor Destino</h5>
                        <p class="text-muted">Vilão</p>
                        <a href="bios/destino.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/duendeicon.png" class="card-img-top personagem-img" alt="duende">
                    <div class="card-body">
                        <h5>Duende Verde</h5>
                        <p class="text-muted">Vilão</p>
                        <a href="bios/duende.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

           
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/deadpoolicon.png" class="card-img-top personagem-img" alt="deadpool">
                    <div class="card-body">
                        <h5>Deadpool</h5>
                        <p class="text-muted">Anti-herói</p>
                        <a href="bios/deadpool.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/wolverineicon.png" class="card-img-top personagem-img" alt="Wolverine">
                    <div class="card-body">
                        <h5>Wolverine</h5>
                        <p class="text-muted">Herói</p>
                        <a href="bios/wolverine.php" class="btn btn-outline-danger btn-sm">Ver Bio</a>
                </div>
            </div>
        </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/magnetoicon2.png" class="card-img-top personagem-img" alt="magneto">
                    <div class="card-body">
                        <h5>Magneto</h5>
                        <p class="text-muted">Vilão</p>
                        <a href="bios/magneto.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/venomicon2.png" class="card-img-top personagem-img" alt="venom">
                    <div class="card-body">
                        <h5>Venom</h5>
                        <p class="text-muted">Anti-herói</p>
                        <a href="bios/venom.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 mb-4">
                <div class="card shadow-sm text-center">
                    <img src="biofotos/justiceiroicon2.png" class="card-img-top personagem-img" alt="justiceiro">
                    <div class="card-body">
                        <h5>Justiceiro</h5>
                        <p class="text-muted">Anti-herói</p>
                        <a href="bios/justiceiro.php" class="btn btn-outline-dark btn-sm">Ver Bio</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <footer class="footer-marvel text-center py-4">
        © 2026 - Universo Marvel | Senac
    </footer>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>
</html>