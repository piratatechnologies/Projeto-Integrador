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
            (titulo, universo, fase, data_lancamento, escritor, artista, sinopse, imagem)
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

    } catch (Exception $e) {
        $erro = "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Criar Quadrinho</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
</head>

<body style="background:#111; color:white;">

<div class="container mt-5">

<h2>Criar Quadrinho</h2>

<?php if(isset($msg)) echo "<div class='alert alert-success'>$msg</div>"; ?>
<?php if(isset($erro)) echo "<div class='alert alert-danger'>$erro</div>"; ?>

<form method="POST">

<input class="form-control mb-2" name="titulo" placeholder="Título" required>
<input class="form-control mb-2" name="universo" placeholder="Universo" required>
<input class="form-control mb-2" name="fase" placeholder="Fase">
<input class="form-control mb-2" name="data_lancamento" type="date">
<input class="form-control mb-2" name="escritor" placeholder="Escritor">
<input class="form-control mb-2" name="artista" placeholder="Artista">
<textarea class="form-control mb-2" name="sinopse" placeholder="Sinopse"></textarea>
<input class="form-control mb-2" name="imagem" placeholder="URL ou caminho da imagem">

<button class="btn btn-danger">Salvar</button>
<a href="dashboard.php" class="btn btn-light">Voltar</a>

</form>

</div>

</body>
</html>