<?php
require_once "conexao.php";
$sql = "SELECT id, nome, endereco, telefone
FROM pessoas
ORDER BY id DESC";

$stmt = $pdo->prepare($sql);
$stmt->execute();
$pessoas = $stmt->fetchALL(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <h1>Pessoas Cadastradas</h1>
        <p>
            Total de pessoas:
            <strong><?= count($pessoas) ?></strong>

        </p>
        <table>
            <thead>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Ações</th>
            </thead>
            <tbody>
                <?php if (count($pessoas) > 0): ?>
                    <?php foreach ($pessoas as $pessoa): ?>
                        <tr>
                            <td><?= (int)$pessoa["id"] ?></td>
                            <td>
                                <?= htmlspecialchars($pessoa["nome"], ENT_QUOTES, "UTF-8") ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($pessoa["endereco"], ENT_QUOTES, "UTF-8") ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($pessoa["telefone"], ENT_QUOTES, "UTF-8") ?>
                            </td>
                            <td>
                                <div class="acoes">
                                    <a class="btn-editar" href="editar.php?id=<?= (int)$pessoa['id'] ?>">Editar</a>
                                    <form action="excluir.php" method="POST" onsubmit="return confirm ('Deseja realmente excluir?');">
                                        <input type="hidden" name="id" value="<?= (int)$pessoa['id'] ?>">
                                        <button type="submit" class="btn-excluir">Excluir</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="4">Nenhuma pessoa cadastrada</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="index.php">Voltar ao cadastro</a>


    </div>

</body>

</html>