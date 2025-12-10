<?php

require_once "db_conexao.php";

$nome_fornecedor = $_POST["nome_fornecedor"];
$email_fornecedor = $_POST["email_fornecedor"];
$cnpj_fornecedor = $_POST["cnpj_fornecedor"];
$telefone_fornecedor = $_POST["telefone_fornecedor"];

try {
    // Inserindo dados no database utilizando a segurança contra injeção do stmt.
    $sql = "INSERT INTO fornecedor (nome_fornecedor, email_fornecedor, cnpj_fornecedor, telefone_fornecedor) 
    VALUES (:nome_fornecedor, :email_fornecedor, :cnpj_fornecedor, :telefone_fornecedor)";

    // Usando método prepare para que sejam analisados os dados inseridos.
    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ':nome_fornecedor' => $nome_fornecedor,
        ':email_fornecedor' => $email_fornecedor,
        ':cnpj_fornecedor' => $cnpj_fornecedor,
        ':telefone_fornecedor' => $telefone_fornecedor
    ]);

    // Se o cadastro for feito redireciono para index e paro de rodar o script atual.
    if ($stmt->rowCount() > 0) {
        header("location: index.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao tentar cadastrar: " . $e->getMessage();
}
