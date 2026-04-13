<?php
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coleção - Marvel Comics</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="sagaaranha.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body>

    
    <header class="cabecalho text-center" style="background-color: black; padding: 20px;">
        <img src="Marvel Comics Logo HD.png" width="175">
    
        <h2 style="color: white; margin-top: 10px;">Histórias do Teioso em ordem de lançamento</h2>
        <a href="sagas.php" class="btn btn-danger btn-sm">Voltar aos indices</a>
    </header>

    
    <div class="container mt-5">

        <h3 class="text-center mb-4"></h3>

        <div class="row">

            
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman1.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>Amazing Fantasy #15</h5>
                        <a href="spider1.php" class="btn btn-danger btn-sm">
                            Detalhes
                        </a>
                    </div>
                </div>
            </div>

            
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman2.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #1</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal2">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman3.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #2</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman4.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #3</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman5.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #4</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman6.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #5</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman7.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #6</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman8.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #7</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman9.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #8</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman10.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #9</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman11.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #10</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman12.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #11</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman13.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #12</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman14.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #13</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman15.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #14</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman16.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #15</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman17.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #16</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman18.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #17</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman19.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #18</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card mb-4 shadow-sm">
                    <img src="spider/spiderman20.jpg" class="card-img-top">
                    <div class="card-body text-center">
                        <h5>The Amazing Spider-Man #19</h5>
                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                            data-target="#modal1">Detalhes</button>
                    </div>
                </div>
            </div>

        </div>
    </div>

    
    <div class="modal fade" id="modal1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4>Fantastic Four #1 (1961)</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body text-center">

                    <img src="spider/fantastic1.jpg" class="img-fluid mb-3" style="max-height: 350px;">
                
                    <p><strong>Roteiro:</strong> Stan Lee</p>
                    <p><strong>Arte:</strong> Jack Kirby</p>
                    <p>Primeira aparição do Quarteto Fantástico e marco inicial da Era Marvel moderna.</p>
                
                    <hr>

                    <h5>Avaliação</h5>
                    <select id="rating1" class="form-control mb-3">
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>

                    <h5>Comentário</h5>
                    <textarea id="comment1" class="form-control"></textarea>
                    <button onclick="salvarComentario(1)"
                        class="btn btn-primary mt-2">Enviar</button>

                    <div id="comentarios1" class="mt-3"></div>

                </div>

            </div>
        </div>
    </div>

    
    <div class="modal fade" id="modal2">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <div class="modal-header">
                    <h4>Amazing Fantasy #15 (1962)</h4>
                    <button class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">

                    <p><strong>Primeira aparição:</strong> Homem-Aranha</p>
                    <p><strong>Autores:</strong> Stan Lee e Steve Ditko</p>
                    <p>Edição histórica que apresenta Peter Parker ao mundo.</p>

                    <hr>

                    <h5>Avaliação</h5>
                    <select id="rating2" class="form-control mb-3">
                        <option value="1">⭐</option>
                        <option value="2">⭐⭐</option>
                        <option value="3">⭐⭐⭐</option>
                        <option value="4">⭐⭐⭐⭐</option>
                        <option value="5">⭐⭐⭐⭐⭐</option>
                    </select>

                    <h5>Comentário</h5>
                    <textarea id="comment2" class="form-control"></textarea>
                    <button onclick="salvarComentario(2)"
                        class="btn btn-primary mt-2">Enviar</button>

                    <div id="comentarios2" class="mt-3"></div>

                </div>

            </div>
        </div>
    </div>

    
    <footer class="text-center p-3 mt-5" style="background-color: black; color: white;">
        © 2026 - Blog Marvel Comics Senac
    </footer>

    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <script>
        function salvarComentario(id) {

            let comentario = document.getElementById("comment" + id).value;
            let nota = document.getElementById("rating" + id).value;

            if (comentario.trim() === "") return;

            let chave = "comentarios" + id;
            let comentariosSalvos = localStorage.getItem(chave);

            let lista = comentariosSalvos ? JSON.parse(comentariosSalvos) : [];

            lista.push("⭐".repeat(nota) + " - " + comentario);

            localStorage.setItem(chave, JSON.stringify(lista));

            mostrarComentarios(id);
            document.getElementById("comment" + id).value = "";
        }

        function mostrarComentarios(id) {

            let chave = "comentarios" + id;
            let comentariosSalvos = JSON.parse(localStorage.getItem(chave)) || [];

            let area = document.getElementById("comentarios" + id);
            area.innerHTML = "<h6>Comentários:</h6>";

            comentariosSalvos.forEach(c => {
                area.innerHTML += "<p>• " + c + "</p>";
            });
        }

        window.onload = function () {
            mostrarComentarios(1);
            mostrarComentarios(2);
        }
    </script>

</body>

</html>