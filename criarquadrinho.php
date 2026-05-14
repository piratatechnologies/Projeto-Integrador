<?php
session_start();

require_once('conexao.php');


if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin') {

    header("Location: index.php");
    exit();

}


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    try {

        $stmt = $pdo->prepare("
            INSERT INTO quadrinhos
            (
                titulo,
                universo,
                fase,
                data_lancamento,
                escritor,
                artista,
                sinopse,
                imagem
            )

            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        $stmt->execute([

            $_POST['titulo'] ?? '',
            $_POST['universo'] ?? '',
            $_POST['fase'] ?? '',
            $_POST['data_lancamento'] ?? '',
            $_POST['escritor'] ?? '',
            $_POST['artista'] ?? '',
            $_POST['sinopse'] ?? '',
            $_POST['imagem'] ?? ''

        ]);

        $msg = "Quadrinho cadastrado com sucesso!";

    }

    catch (Exception $e) {

        $erro = "Erro ao cadastrar: " . $e->getMessage();

    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Adicionar Quadrinho</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <style>

        body {
            background: #111;
            color: white;
            font-family: Arial;
        }

        .container-create {
            width: 90%;
            max-width: 1000px;
            margin: 40px auto;
        }

        .card-create {
            background: #1b1b1b;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
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

        .linha {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .preview {
            width: 220px;
            border-radius: 10px;
            margin-top: 15px;
            border: 3px solid #333;
            background: #000;
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

        .alert {
            border: none;
        }

        @media(max-width:768px){

            .linha{
                grid-template-columns:1fr;
            }

        }

    </style>

</head>

<body>

<div class="container-create">

    <div class="card-create">

        <h2>Criar Quadrinho</h2>

        <?php if(isset($msg)): ?>

            <div class="alert alert-success">

                <?= $msg ?>

            </div>

        <?php endif; ?>

        <?php if(isset($erro)): ?>

            <div class="alert alert-danger">

                <?= $erro ?>

            </div>

        <?php endif; ?>

        <form method="POST">

            <div class="linha">

                <div>

                    <label>Título</label>

                    <input
                        class="form-control"
                        name="titulo"
                        required>

                </div>

                <div>

                    <label>Universo</label>

                    <select
                        class="form-control"
                        name="universo"
                        id="universoSelect"
                        required>

                        <option value="">Selecione</option>

                        <option>Homem-Aranha</option>
                        <option>Vingadores</option>
                        <option>X-Men</option>
                        <option>Quarteto Fantástico</option>
                        <option>Paladinos Marvel</option>
                        <option>Guardiões da Galaxia</option>
                        <option>Thunderbolts</option>
                        <option>Vilões</option>
                        <option>Outros</option>

                    </select>

                </div>

            </div>

            <div class="linha mt-3">

                <div>

                    <label>Fase</label>

                    <input
                        class="form-control"
                        name="fase">

                </div>

                <div>

                    <label>Data de lançamento</label>

                    <input
                        class="form-control"
                        name="data_lancamento"
                        type="date">

                </div>

            </div>

            <div class="linha mt-3">

                <div>

                    <label>Escritor</label>

                    <input
                        class="form-control"
                        name="escritor">

                </div>

                <div>

                    <label>Artista</label>

                    <input
                        class="form-control"
                        name="artista">

                </div>

            </div>

            <div class="mt-3">

                <label>Imagem</label>

                <input
                    class="form-control"
                    name="imagem"
                    id="campoImagem"
                    placeholder="Ex: spiderman #1.jpg">

            </div>

            <img
                src=""
                class="preview"
                id="previewImg"
                style="display:none;">

            <div class="mt-4">

                <label>Sinopse</label>

                <textarea
                    class="form-control"
                    name="sinopse"></textarea>

            </div>

            <div class="botoes">

                <button class="btn btn-danger btn-salvar">

                    Salvar Quadrinho

                </button>

                <a
                    href="dashboard.php"
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
const universoSelect = document.getElementById('universoSelect');

campoImagem.addEventListener('input', atualizarPreview);
universoSelect.addEventListener('change', atualizarPreview);

function atualizarPreview(){

    let pasta = 'outros/';

    if(universoSelect.value === 'Homem-Aranha'){
        pasta = 'spider/';
    }

    else if(universoSelect.value === 'Vingadores'){
        pasta = 'sagavingadores/';
    }

    else if(universoSelect.value === 'X-Men'){
        pasta = 'sagaxmen/';
    }

    else if(universoSelect.value === 'Quarteto Fantástico'){
        pasta = 'sagaquarteto/';
    }

    else if(universoSelect.value === 'Paladinos Marvel'){
        pasta = 'sagapaladinos/';
    }

    else if(universoSelect.value === 'Guardiões da Galaxia'){
        pasta = 'sagaguard/';
    }

    else if(universoSelect.value === 'Thunderbolts'){
        pasta = 'sagathunder/';
    }

    else if(universoSelect.value === 'Vilões'){
        pasta = 'sagavil/';
    }

    const imagem = campoImagem.value;

    if(imagem !== ''){

        previewImg.style.display = 'block';

        previewImg.src = pasta + imagem;

    }

}

</script>

</body>

</html>