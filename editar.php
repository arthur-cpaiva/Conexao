<?php
require_once "conexao.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);
if (!$id || $id < 1) {
    die("ID Invalido");
}

$sql = "SELECT * FROM PESSOAS WHERE id = :id";
$stmt = $pdo->prepare($sql);
$stmt->execute([":id"=>$id]);

$pessoa = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$pessoa) {
    die("Pessoa não encontrada");
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0">

    <title>Editar Pessoa</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

    <div class="container container-formulario">

        <h1>Editar Pessoa</h1>

        <form action="atualizar.php" method="POST">

            <!-- Envia o ID da pessoa que será atualizada -->
            <input type="hidden"
                name="id"
                value="<?= (int) $pessoa['id'] ?>">

            <label for="nome">Nome:</label>

            <input type="text"
                id="nome"
                name="nome"
                maxlength="100"
                value="<?= htmlspecialchars($pessoa['nome'], ENT_QUOTES, 'UTF-8') ?>"
                required>

            <br><br>

            <label for="endereco">Endereço:</label>

            <input type="text"
                id="endereco"
                name="endereco"
                maxlength="200"
                value="<?= htmlspecialchars($pessoa['endereco'], ENT_QUOTES, 'UTF-8') ?>"
                required>

            <br><br>

            <label for="telefone">Telefone:</label>

            <input type="text"
                id="telefone"
                name="telefone"
                maxlength="20"
                value="<?= htmlspecialchars($pessoa['telefone'], ENT_QUOTES, 'UTF-8') ?>"
                required>

            <br><br>

            <button type="submit">
                Salvar Alterações
            </button>

        </form>

        <p>
            <a href="listar.php">Cancelar e voltar</a>
        </p>

    </div>

</body>

</html>