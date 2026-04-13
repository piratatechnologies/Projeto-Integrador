<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Marvel Senac</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
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
        <img src="img/admin.png" width="25">
    <?php else: ?>
        <img src="img/user.png" width="25">
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

        

        <div style="text-align: center; margin-top: 15px;">

<div id="carouselMarvel" class="carousel slide" data-ride="carousel" style="max-width: 1250px; margin: auto;">

    <div class="carousel-inner">

        <div class="carousel-item active">
            <img src="menuslide/marvel-123337.jpg" width="100%">
            <div class="overlay-center">
                <h1 class="titulo-hq">ENTRE NO UNIVERSO MARVEL</h1>
                <a href="#" class="btn btn-danger">Explorar</a>
            </div>
        </div>

        <div class="carousel-item">
            <img src="menuslide/menuslide.jpeg" width="100%">
            <div class="overlay-center">
                <h1 class="titulo-hq">ENTRE NO UNIVERSO MARVEL</h1>
                <a href="#" class="btn btn-danger">Explorar</a>
            </div>
        </div>

       
        <div class="carousel-item">
            <img src="menuslide/menuslide2.jpg" width="100%">
            <div class="overlay-center">
                <h1 class="titulo-hq">ENTRE NO UNIVERSO MARVEL</h1>
                <a href="#" class="btn btn-danger">Explorar</a>
            </div>
        </div>

    </div>

    
    <a class="carousel-control-prev" href="#carouselMarvel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </a>

    <a class="carousel-control-next" href="#carouselMarvel" role="button" data-slide="next">
        <span class="carousel-control-next-icon"></span>
    </a>

    <section class="mais-noticias py-5">
        <div class="container">
    
            <h2 class="titulo-noticias mb-4">Ultimas notícias</h2>
    
            
            <div class="noticia-item d-flex mb-4">
                <img src="noticias/noticia1.jpg" class="img-noticia">
    
                <div class="conteudo-noticia">
                    <span class="tag-noticia">NOTÍCIAS</span>
                    <h4>Vingadores</h4>
                    <p class="info">Autor Marvel • 2026</p>
                    <p>...</p>
                </div>
            </div>
    
            
            <div class="noticia-item d-flex mb-4">
                <img src="noticias/noticia2.jpg" class="img-noticia">
    
                <div class="conteudo-noticia">
                    <span class="tag-noticia">NOTÍCIAS</span>
                    <h4>Homem-Aranha</h4>
                    <p class="info">Autor Marvel • 2026</p>
                    <p>...</p>
                </div>
            </div>
    
            
            <div class="noticia-item d-flex mb-4">
                <img src="noticias/noticia3.jpg" class="img-noticia">
    
                <div class="conteudo-noticia">
                    <span class="tag-noticia">NOTÍCIAS</span>
                    <h4>X-Men</h4>
                    <p class="info">Autor Marvel • 2026</p>
                    <p>...</p>
                </div>
            </div>
    
        </div>
    </section>

</div>

</div>

</header>

<main role="main">


<div class="album py-5" style="background-color: #8d8c8c;">
<div class="container" >

    <div class="row">


        <div class="col" >
            <div class="card shadow-sm" > 
                <img src="multiverse/zombies.png" alt="" width="100%" >
                
                <div class="card-body">
                    <p class="card-text">-Earth-2149-</p> <p class="card-text">Universo Zumbis Marvel</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group"> <button type="button"
                                class="btn btn-sm btn-outline-secondary">Ver</button> </div> <small
                            class="text-body-secondary"></small>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow-sm"> 
                <img src="multiverse/Ultimate.jpg" alt="" width="100%">
                
                <div class="card-body">
                    <p class="card-text">-Earth-1610-</p> <p class="card-text">Universo Ultimate</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group"> <button type="button"
                                class="btn btn-sm btn-outline-secondary">Ver</button> </div> <small
                            class="text-body-secondary"></small>
                    </div>
                </div>
            </div>
        </div>


    </div>

    <div class="row">
        <div class="col">
            <div class="card shadow-sm"> 
                <img src="multiverse/apocalypse.webp" alt="" width="100%">
                
                <div class="card-body">
                    <p class="card-text">-Earth-295-</p> <p class="card-text">Universo Era do Apocalipse</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group"> <button type="button"
                                class="btn btn-sm btn-outline-secondary">Ver</button> </div> <small
                            class="text-body-secondary"></small>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="col">
            <div class="card shadow-sm"> 
                <img src="multiverse/futurepast.jpg" alt="" width="100%">
                
                <div class="card-body">
                    <p class="card-text">-Earth-811-</p> <p class="card-text">Universo Dias de um futuro esquecido</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group"> <button type="button"
                                class="btn btn-sm btn-outline-secondary">Ver</button> </div> <small
                            class="text-body-secondary"></small>
                    </div>
                </div>
            </div>
        </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="card shadow-sm"> 
                    <img src="multiverse/Amalgam.jpg" alt="" width="100%">
                    
                    <div class="card-body">
                        <p class="card-text">-Earth-9602-</p> <p class="card-text">Universo Amalgama</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group"> <button type="button"
                                    class="btn btn-sm btn-outline-secondary">Ver</button> </div> <small
                                class="text-body-secondary"></small>
                        </div>
                    </div>
                </div>
            </div>

            
            <div class="col">
                <div class="card shadow-sm"> 
                    <img src="multiverse/oldman.jpg" alt="" width="100%">
                    
                    <div class="card-body">
                        <p class="card-text">-Earth-807128-</p> <p class="card-text">Universo Velho Logan</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group"> <button type="button"
                                    class="btn btn-sm btn-outline-secondary">Ver</button> </div> <small
                                class="text-body-secondary"></small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="card shadow-sm"> 
                        <img src="multiverse/Capcom.webp" alt="" width="100%">
                        
                        <div class="card-body">
                            <p class="card-text">-Earth-30847-</p> <p class="card-text">Universo Marvel vs Capcom</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group"> <button type="button"
                                        class="btn btn-sm btn-outline-secondary">Ver</button> </div> <small
                                    class="text-body-secondary"></small>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col">
                    <div class="card shadow-sm"> 
                        <img src="multiverse/1602.jpg" alt="" width="100%">
                        
                        <div class="card-body">
                            <p class="card-text">-Earth-311-</p> <p class="card-text">Universo 1602</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group"> <button type="button"
                                        class="btn btn-sm btn-outline-secondary">Ver</button></div> <small
                                    class="text-body-secondary"></small>
                            </div>
                        </div>
                    </div>
                </div>

        </div>

        
       
        </div>

        

</main>



<footer class="footer-marvel text-center py-3">
© 2026 - Blog Marvel Comics Senac
</footer>



<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

</body>

</html>
