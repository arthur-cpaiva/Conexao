<?php
require_once "conexao.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = trim($_POST["nome"] ?? "");
    $endereco = trim($_POST["endereco"] ?? "");
    $telefone = trim($_POST["telefone"] ?? "");
    if ($nome == "" || $endereco == "" || $telefone == "") {
        die("Preencha os campos.");
    }
    try {
        $sql = "INSERT INTO pessoas
        (nome, endereco, telefone)
        VALUES
        (:nome,:endereco,:telefone)";
        $smtp = $pdo->prepare($sql);
        $smtp->execute([
            ":nome" => $nome,
            ":endereco" => $endereco,
            ":telefone" => $telefone
        ]);
        echo "<h2>Cadastro realizado com sucesso</h2>";
        echo '<a href="index.php">Cadastrar outra pessoa</a>';
    }catch (PDOException $e) {
        echo ("Erro ao cadastrar a pessoa");
}
} else{
    header("location:index.php");
    exit;

}

?>