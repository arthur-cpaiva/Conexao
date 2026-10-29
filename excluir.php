<?php
require_once "conexao.php";
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location:listar.php");
    exit;
}
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    die("ID Inválido.");
}
try {
    $sql = "DELETE FROM pessoas WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([":id" => $id]);
    header("Location:listar.php");
    exit;
} catch (PDOException $e) {
    echo "Erro ao excluir a pessoa.";
}
