<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Pessoas</title>

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <div class="container">

        <h1>Cadastro de Pessoas</h1>

        <form action="salvar.php" method="POST">

            <label for="nome">Nome:</label>
            <input
                type="text"
                id="nome"
                name="nome"
                required>
            <br><br>

            <label for="endereco">Endereço:</label>
            <input
                type="text"
                id="endereco"
                name="endereco"
                required>
            <br><br>

            <label for="telefone">Telefone:</label>
            <input
                type="text"
                id="telefone"
                name="telefone"
                required>
            <br><br>

            <button type="submit">Cadastrar</button>

        </form>

    </div>

</body>

</html>