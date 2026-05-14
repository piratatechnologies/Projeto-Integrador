<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];


$stmt = $pdo->prepare("SELECT * FROM quadrinhos WHERE id = ?");
$stmt->execute([$id]);

$q = $stmt->fetch(PDO::FETCH_ASSOC);


if ($_POST) {

    $stmt = $pdo->prepare("
        UPDATE quadrinhos SET
        titulo=?,
        universo=?,
        fase=?,
        data_lancamento=?,
        escritor=?,
        artista=?,
        sinopse=?,
        imagem=?
        WHERE id=?
    ");

    $stmt->execute([

        $_POST['titulo'],
        $_POST['universo'],
        $_POST['fase'],
        $_POST['data'],
        $_POST['escritor'],
        $_POST['artista'],
        $_POST['sinopse'],
        $_POST['imagem'],
        $id

    ]);

    header("Location: listar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Editar Quadrinho</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <style>

        body {
            background: #111;
            color: white;
            font-family: Arial;
        }

        .container-edit {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .card-edit {
            background: #1b1b1b;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        h1 {
            margin-bottom: 30px;
            text-align: center;
            color: #fff;
        }

        label {
            font-weight: bold;
            margin-top: 10px;
        }

        .form-control {
            background: #222;
            border: 1px solid #444;
            color: white;
        }

        .form-control:focus {
            background: #222;
            color: white;
            border-color: #c30000;
            box-shadow: none;
        }

        textarea {
            min-height: 180px;
            resize: vertical;
        }

        .preview {
            width: 220px;
            border-radius: 10px;
            margin-top: 15px;
            border: 3px solid #333;
        }

        .botoes {
            margin-top: 30px;
            display: flex;
            gap: 15px;
        }

        .btn-salvar {
            background: #c30000;
            border: none;
        }

        .btn-salvar:hover {
            background: #ff0000;
        }

        .btn-voltar {
            background: #444;
            border: none;
        }

        .btn-voltar:hover {
            background: #666;
        }

        .linha {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media(max-width: 768px){

            .linha{
                grid-template-columns: 1fr;
            }

        }

    </style>

</head>

<body>

<div class="container-edit">

    <div class="card-edit">

        <h1>Editar Quadrinho</h1>

        <form method="POST">

            <div class="linha">

                <div>

                    <label>Título</label>

                    <input
                        type="text"
                        name="titulo"
                        class="form-control"
                        value="<?= $q['titulo'] ?>">

                </div>

                <div>

                    <label>Universo</label>

                    <input
                        type="text"
                        name="universo"
                        class="form-control"
                        value="<?= $q['universo'] ?>">

                </div>

            </div>

            <div class="linha mt-3">

                <div>

                    <label>Fase</label>

                    <input
                        type="text"
                        name="fase"
                        class="form-control"
                        value="<?= $q['fase'] ?>">

                </div>

                <div>

                    <label>Data de lançamento</label>

                    <input
                        type="text"
                        name="data"
                        class="form-control"
                        value="<?= $q['data_lancamento'] ?>">

                </div>

            </div>

            <div class="linha mt-3">

                <div>

                    <label>Escritor</label>

                    <input
                        type="text"
                        name="escritor"
                        class="form-control"
                        value="<?= $q['escritor'] ?>">

                </div>

                <div>

                    <label>Artista</label>

                    <input
                        type="text"
                        name="artista"
                        class="form-control"
                        value="<?= $q['artista'] ?>">

                </div>

            </div>

            <div class="mt-3">

                <label>Imagem</label>

                <input
                    type="text"
                    name="imagem"
                    class="form-control"
                    value="<?= $q['imagem'] ?>"
                    id="campoImagem">

            </div>

            <?php

            $pasta = "outros/";

            if ($q['universo'] == 'Homem-Aranha') {
                $pasta = "spider/";
            }

            elseif ($q['universo'] == 'Vingadores') {
                $pasta = "sagavingadores/";
            }

            elseif ($q['universo'] == 'X-Men') {
                $pasta = "sagaxmen/";
            }

            elseif ($q['universo'] == 'Quarteto Fantástico') {
                $pasta = "sagaquarteto/";
            }

            elseif ($q['universo'] == 'Paladinos Marvel') {
                $pasta = "sagapaladinos/";
            }

            elseif ($q['universo'] == 'Guardiões da Galaxia') {
                $pasta = "sagaguard/";
            }

            elseif ($q['universo'] == 'Thunderbolts') {
                $pasta = "sagathunder/";
            }

            elseif ($q['universo'] == 'Vilões') {
                $pasta = "sagavil/";
            }


            ?>

            <img
                src="<?= $pasta . $q['imagem'] ?>"
                class="preview"
                id="previewImg">

            <div class="mt-4">

                <label>Sinopse</label>

                <textarea
                    name="sinopse"
                    class="form-control"><?= $q['sinopse'] ?></textarea>

            </div>

            <div class="botoes">

                <button class="btn btn-danger btn-salvar">

                    Atualizar Quadrinho

                </button>

                <a
                    href="listar.php"
                    class="btn btn-secondary btn-voltar">

                    Voltar

                </a>

            </div>

        </form>

    </div>

</div>

<script>

const campoImagem = document.getElementById('campoImagem');
const previewImg = document.getElementById('previewImg');

campoImagem.addEventListener('input', () => {

    previewImg.src = "<?= $pasta ?>" + campoImagem.value;

});

</script>

</body>

</html>