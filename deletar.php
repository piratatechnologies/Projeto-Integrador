<?php
session_start();
include('conexao.php');

if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'admin') {
    header("Location: login.php");
    exit();
}

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM quadrinhos WHERE id = ?");
$stmt->execute([$id]);

header("Location: listar.php");