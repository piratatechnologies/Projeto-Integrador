<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin') {
    header("Location: index.php");
    exit();
}



$busca = $_GET['busca'] ?? '';
$universo = $_GET['universo'] ?? '';



$limite = 100;

$pagina = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;

if ($pagina < 1) {
    $pagina = 1;
}

$inicio = ($pagina - 1) * $limite;



$where = [];
$parametros = [];

if (!empty($busca)) {

    $where[] = "titulo LIKE :busca";
    $parametros[':busca'] = "%$busca%";
}

if (!empty($universo)) {

    $where[] = "universo = :universo";
    $parametros[':universo'] = $universo;
}

$whereSql = '';

if (count($where) > 0) {
    $whereSql = "WHERE " . implode(" AND ", $where);
}


$sqlTotal = "
    SELECT COUNT(*)
    FROM quadrinhos
    $whereSql
";

$stmtTotal = $pdo->prepare($sqlTotal);

foreach ($parametros as $key => $valor) {
    $stmtTotal->bindValue($key, $valor);
}

$stmtTotal->execute();

$total = $stmtTotal->fetchColumn();

$totalPaginas = ceil($total / $limite);



$sql = "
    SELECT *
    FROM quadrinhos
    $whereSql
    ORDER BY id DESC
    LIMIT :inicio, :limite
";

$stmt = $pdo->prepare($sql);

foreach ($parametros as $key => $valor) {
    $stmt->bindValue($key, $valor);
}

$stmt->bindValue(':inicio', $inicio, PDO::PARAM_INT);
$stmt->bindValue(':limite', $limite, PDO::PARAM_INT);

$stmt->execute();

$quadrinhos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <title>Painel de Quadrinhos</title>

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">

    <style>

        body {
            background: #111;
            color: white;
            font-family: Arial;
        }

        .container-admin {
            width: 95%;
            margin: auto;
            margin-top: 40px;
        }

        .topo {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }

        .table {
            background: #1b1b1b;
            color: white;
        }

        .table th {
            background: #c30000;
            color: white;
            border: none;
        }

        .table td {
            vertical-align: middle;
        }

        .capa {
            width: 70px;
            border-radius: 8px;
            transition: 0.2s;
        }

        .capa:hover {
            transform: scale(1.08);
        }

        .btn-editar {
            background: #888607;
            color: white;
        }

        .btn-excluir {
            background: #fd031c;
            color: white;
        }

        .btn-editar:hover,
        .btn-excluir:hover {
            opacity: 0.85;
            color: white;
        }

        .paginacao {
            margin-top: 30px;
            display: flex;
            justify-content: center;
            gap: 10px;
            flex-wrap: wrap;
        }

        .paginacao a {
            padding: 10px 15px;
            background: #222;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            transition: 0.2s;
        }

        .paginacao a:hover {
            background: #c30000;
        }

        .pagina-atual {
            background: #c30000 !important;
        }

        .filtros {
            background: #1b1b1b;
            padding: 20px;
            border-radius: 10px;
            margin-bottom: 25px;
        }

        .titulo-painel {
            font-size: 35px;
            font-weight: bold;
        }

        .sem-resultados {
            text-align: center;
            padding: 40px;
            background: #1b1b1b;
            border-radius: 10px;
            margin-top: 20px;
        }

    </style>

</head>

<body>

    <div class="container-admin">

        <div class="topo">

            <h1 class="titulo-painel">
                Painel de Quadrinhos
            </h1>

            <div>

                <a href="dashboard.php"
                    class="btn btn-secondary">

                    Voltar

                </a>

                <a href="criarquadrinho.php"
                    class="btn btn-danger">

                    Novo Quadrinho

                </a>

            </div>

        </div>


        

        <div class="filtros">

            <form method="GET">

                <div class="row">

                    <div class="col-md-5 mb-2">

                        <input
                            type="text"
                            name="busca"
                            class="form-control"
                            placeholder="Pesquisar quadrinho pelo título..."
                            value="<?= htmlspecialchars($busca) ?>">

                    </div>

                    <div class="col-md-4 mb-2">

                        <select
                            name="universo"
                            class="form-control">

                            <option value="">
                                Todos os Universos
                            </option>

                            <option value="Homem-Aranha"
                                <?= $universo == 'Homem-Aranha' ? 'selected' : '' ?>>
                                Homem-Aranha
                            </option>

                            <option value="Vingadores"
                                <?= $universo == 'Vingadores' ? 'selected' : '' ?>>
                                Vingadores
                            </option>

                            <option value="X-Men"
                                <?= $universo == 'X-Men' ? 'selected' : '' ?>>
                                X-Men
                            </option>

                            <option value="Quarteto Fantástico"
                                <?= $universo == 'Quarteto Fantástico' ? 'selected' : '' ?>>
                                Quarteto Fantástico
                            </option>

                            <option value="Thunderbolts"
                                <?= $universo == 'Thunderbolts' ? 'selected' : '' ?>>
                                Thunderbolts
                            </option>

                        </select>

                    </div>

                    <div class="col-md-3 mb-2">

                        <button class="btn btn-danger btn-block">

                            Buscar

                        </button>

                    </div>

                </div>

            </form>

        </div>


        <!-- TABELA -->

        <?php if (count($quadrinhos) > 0): ?>

            <table class="table table-bordered table-hover">

                <tr>

                    <th>ID</th>
                    <th>Capa</th>
                    <th>Título</th>
                    <th>Universo</th>
                    <th>Ações</th>

                </tr>

                <?php foreach ($quadrinhos as $q): ?>

                    <tr>

                        <td width="80">

                            <?= $q['id'] ?>

                        </td>

                        <td width="100">

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

                            ?>

                            <img
                                src="<?= $pasta . $q['imagem'] ?>"
                                class="capa">

                        </td>

                        <td>

                            <?= $q['titulo'] ?>

                        </td>

                        <td width="220">

                            <?= $q['universo'] ?>

                        </td>

                        <td width="220">

                            <a
                                href="editar.php?id=<?= $q['id'] ?>"
                                class="btn btn-sm btn-editar">

                                Editar

                            </a>

                            <a
                                href="deletar.php?id=<?= $q['id'] ?>"
                                class="btn btn-sm btn-excluir"
                                onclick="return confirm('Deseja excluir este quadrinho?')">

                                Excluir

                            </a>

                        </td>

                    </tr>

                <?php endforeach; ?>

            </table>

        <?php else: ?>

            <div class="sem-resultados">

                <h3>
                    Nenhum quadrinho encontrado.
                </h3>

            </div>

        <?php endif; ?>


        <div class="paginacao">

            <?php for ($i = 1; $i <= $totalPaginas; $i++): ?>

                <a
                    href="?pagina=<?= $i ?>&busca=<?= urlencode($busca) ?>&universo=<?= urlencode($universo) ?>"
                    class="<?= ($i == $pagina) ? 'pagina-atual' : '' ?>">

                    <?= $i ?>

                </a>

            <?php endfor; ?>

        </div>

    </div>

</body>

</html>