<?php
require_once "conexao.php";
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location:listar.php");
    exit;
}
$id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
$nome = trim($_POST["nome"] ?? "");
$endereco = trim($_POST["endereco"] ?? "");
$telefone = trim($_POST["telefone"] ?? "");

if (!$id || $id < 1) {
    die("ID inválido.");
}
if ($nome == "" || $endereco == "" || $telefone == "") {
    die("Preencha todos os campos.");
}

if (
    mb_strlen($nome) > 100 ||
    mb_strlen($endereco) > 200 ||
    mb_strlen($telefone) > 20
) {
    die("Um dos campos ultrapasssou o tamanho permitido");
}

try {
    $sql = "UPDATE pessoas 
    SET nome=:nome,
    endereco = :endereco, 
    telefone = :telefone 
    WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $nome,
        ":endereco" => $endereco,
        ":telefone" => $telefone,
        ":id" => $id
    ]);

    header("Location:listar.php");
    exit;
} catch (PDOException $e) {
    echo "erro ao atualizar os dados.";
}
