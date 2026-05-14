<?php

session_start();

date_default_timezone_set('America/Sao_Paulo');

$banco = new SQLite3('banco.db');


$id = $_GET['id'] ?? 0;


$stmt = $banco->prepare("SELECT * FROM quadrinhos WHERE id = :id");
$stmt->bindValue(':id', $id);

$resultado = $stmt->execute();
$q = $resultado->fetchArray();

if (!$q) {
    echo "Quadrinho não encontrado.";
    exit;
}


$pasta = '';

switch ($q['universo']) {

    case 'Homem-Aranha':
        $pasta = 'spider/';
        break;

    case 'Vingadores':
        $pasta = 'sagavingadores/';
        break;

    case 'X-Men':
        $pasta = 'sagaxmen/';
        break;
    
    case 'Quarteto Fantástico':
        $pasta = 'sagaquarteto/';
        break; 
        
    case 'Guardiões da Galaxia': 
        $pasta = 'sagaguard/';
        break; 
    
    case 'Thunderbolts': 
        $pasta = 'sagathunder/';
        break;     

    case 'Paladinos Marvel': 
        $pasta = 'sagapaladinos/';
        break; 
    
    default:
        $pasta = 'outros/';
        break;
}


$imagem = $pasta . "/" . $q['imagem'];

$notaMedia = null;
$listaComentarios = null;
$notaUsuario = null;


$verificaComentarios = $banco->querySingle("
SELECT name
FROM sqlite_master
WHERE type='table'
AND name='comentarios'
");

if ($verificaComentarios) {

    
    $mediaQuery = $banco->prepare("
    SELECT AVG(nota) as media
    FROM notas
    WHERE id_quadrinho = :id
    ");

    $mediaQuery->bindValue(':id', $id);

    $media = $mediaQuery->execute()->fetchArray();

    $notaMedia = round($media['media'], 1);


    
    if (isset($_SESSION['user'])) {

        $notaQuery = $banco->prepare("
        SELECT nota
        FROM notas
        WHERE id_usuario = :u
        AND id_quadrinho = :q
        ");

        $notaQuery->bindValue(':u', $_SESSION['user']['id']);
        $notaQuery->bindValue(':q', $id);

        $notaResultado = $notaQuery->execute()->fetchArray();

        if ($notaResultado) {
            $notaUsuario = $notaResultado['nota'];
        }
    }


    
    $comentarios = $banco->prepare("
    SELECT comentarios.*, usuarios.username
    FROM comentarios

    INNER JOIN usuarios
    ON usuarios.id = comentarios.id_usuario

    WHERE id_quadrinho = :id
    ORDER BY comentarios.id DESC
    ");

    $comentarios->bindValue(':id', $id);

    $listaComentarios = $comentarios->execute();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title><?= $q['titulo'] ?></title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="index.css">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body style="background-color: #111; color: white;">

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


<div class="container mt-5 mb-5" style="text-align:left;">

    <div class="row">

        <div class="col-md-4 text-center">
            <img src="<?= $imagem ?>" class="img-fluid shadow" style="border-radius:10px;">
        </div>
        <div class="col-md-8">

            <h3><?= $q['titulo'] ?></h3>

            <p><strong>Universo:</strong> <?= $q['universo'] ?></p>
            <p><strong>Fase:</strong> <?= $q['fase'] ?></p>
            <p><strong>Lançamento:</strong> <?= $q['data_lancamento'] ?></p>
            <p><strong>Escritor:</strong> <?= $q['escritor'] ?></p>
            <p><strong>Artista:</strong> <?= $q['artista'] ?></p>

            <div style="background:#1c1c1c;padding:10px 15px;border-radius:8px;display:inline-block;margin-bottom:15px;">
                <span style="font-size:18px;">
                    ⭐
                </span>

                <strong>
                    <?= $notaMedia ?: 'Sem notas' ?>
                </strong>

                <span style="color:#999;">/ 5</span>
            </div>

            <?php if (isset($_SESSION['user'])): ?>

                <a href="adicionar_lido.php?id=<?= $q['id'] ?>"
                class="btn btn-success mb-3">
                    Adicionar aos lidos
                </a>

            <?php endif; ?>

            <hr style="background:white;">

            <h4>Sinopse</h4>

            <p style="text-align:justify;">
                <?= $q['sinopse'] ?>
            </p>

        </div>

    </div>


    <div class="container mb-5" style="text-align:left;">

        <hr style="background:white;">

        <h3>Avaliação</h3>

        <?php if (!isset($_SESSION['user'])): ?>

            <div class="alert alert-warning">
                Faça login para avaliar.
            </div>

        <?php else: ?>

            <form action="salvar_nota.php" method="POST">

                <input type="hidden"
                name="id_quadrinho"
                value="<?= $q['id'] ?>">

                <div class="form-group">

                    <label>Sua nota</label>

                    <select name="nota"
                    class="form-control"
                    style="width:120px;">

                        <option value="0" <?= $notaUsuario == 0 ? 'selected' : '' ?>>0</option>
                        <option value="0.5" <?= $notaUsuario == 0.5 ? 'selected' : '' ?>>0.5</option>
                        <option value="1" <?= $notaUsuario == 1 ? 'selected' : '' ?>>1</option>
                        <option value="1.5" <?= $notaUsuario == 1.5 ? 'selected' : '' ?>>1.5</option>
                        <option value="2" <?= $notaUsuario == 2 ? 'selected' : '' ?>>2</option>
                        <option value="2.5" <?= $notaUsuario == 2.5 ? 'selected' : '' ?>>2.5</option>
                        <option value="3" <?= $notaUsuario == 3 ? 'selected' : '' ?>>3</option>
                        <option value="3.5" <?= $notaUsuario == 3.5 ? 'selected' : '' ?>>3.5</option>
                        <option value="4" <?= $notaUsuario == 4 ? 'selected' : '' ?>>4</option>
                        <option value="4.5" <?= $notaUsuario == 4.5 ? 'selected' : '' ?>>4.5</option>
                        <option value="5" <?= $notaUsuario == 5 ? 'selected' : '' ?>>5</option>

                    </select>

                </div>

                <button class="btn btn-warning">
                    Salvar nota
                </button>

            </form>

        <?php endif; ?>


        <hr style="background:white;">


        <h3>Comentários</h3>

        <?php if (!isset($_SESSION['user'])): ?>

            <div class="alert alert-warning">
                Faça login para comentar.
            </div>

        <?php endif; ?>


        <form action="salvar_comentario.php" method="POST">

            <input type="hidden"
            name="id_quadrinho"
            value="<?= $q['id'] ?>">

            <div class="form-group">

                <label>Comentário</label>

                <textarea
                name="comentario"
                class="form-control"
                rows="4"
                <?= !isset($_SESSION['user']) ? 'disabled' : '' ?>></textarea>

            </div>

            <?php if (isset($_SESSION['user'])): ?>

                <button class="btn btn-danger">
                    Comentar
                </button>

            <?php endif; ?>

        </form>


        <hr style="background:white;">


        <?php if ($listaComentarios): ?>

            <?php while($c = $listaComentarios->fetchArray()): ?>

<div class="card bg-dark text-white mb-3">

    <div class="card-body">

        <div style="
            display:flex;
            justify-content:space-between;
            align-items:center;
        ">

            <div style="
                display:flex;
                align-items:center;
            ">

                <img src="user.png"
                width="35"
                style="margin-right:10px;">

                <div>
                    <strong>
                        <?= $c['username'] ?>
                    </strong>
                    <br>
                    <small style="color:#999;">
                        <?= date('d/m/Y H:i', strtotime($c['data_comentario'])) ?>
                    </small>

                </div>

            </div>


            <?php if (
                isset($_SESSION['user']) &&
                $c['id_usuario'] == $_SESSION['user']['id']
            ): ?>

                <a href="remover_comentario.php?id=<?= $c['id'] ?>"
                class="btn btn-danger btn-sm">

                    Apagar

                </a>

            <?php endif; ?>

        </div>

        <hr style="background:white;">

        <p>
            <?= $c['comentario'] ?>
        </p>

    </div>

</div>

<?php endwhile; ?>

        <?php endif; ?>

    </div>

</div>

<footer class="footer-marvel text-center py-3">
© 2026 - Blog Marvel Comics Senac
</footer>


</body>
</html>