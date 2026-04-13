<?php?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amazing Fantasy #15</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="Spider.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #14181c; color: white;">


<header class="cabecalho text-center" style="background-color: black; padding: 20px;">
    <img src="Marvel Comics Logo HD.png" width="175">
    <h2 style="color: white; margin-top: 10px;"></h2>
    <a href="sagaaranha.php" class="btn btn-danger btn-sm">Voltar</a>
</header>

<div class="banner-topo">
    <img src="spidernota/Spiderca1.webp" class="banner-img">
</div>


<div class="container mt-5">

    <div class="row">


        <div class="col-md-4 text-center">
            <img src="spider/spiderman1.jpg" class="img-fluid" style="border-radius: 10px;">
        </div>

        
        <div class="col-md-8">

            <h1>Amazing Fantasy #15</h1>
            <p><strong>Data de lançamento:</strong> 1962</p>
            <p><strong>Roteiro:</strong> Stan Lee</p>
            <p><strong>Arte:</strong> Steve Ditko</p>

            <p>
                Primeira aparição do Homem-Aranha. Peter Parker ganha poderes após
                ser picado por uma aranha radioativa e aprende que "com grandes poderes vêm grandes responsabilidades".
            </p>

            <hr>

           
            <h4>⭐ Avaliação dos usuários</h4>
            <select id="rating" class="form-control mb-3">
                <option value="1">⭐</option>
                <option value="2">⭐⭐</option>
                <option value="3">⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐</option>
                <option value="5">⭐⭐⭐⭐⭐</option>
            </select>

        </div>
    </div>

    <hr>

    
    <h4>💬 Comentários</h4>

    <textarea id="comment" class="form-control mb-2" placeholder="Escreva seu comentário..."></textarea>
    <button onclick="salvarComentario()" class="btn btn-success mb-3">Enviar</button>

    <div id="comentarios"></div>

</div>


<footer class="footer-marvel text-center py-3 mt-5">
    © 2026 - Blog Marvel Comics Senac
</footer>


</script>

</body>
</html>