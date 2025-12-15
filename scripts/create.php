
<?php

require_once "../config/db_conexao.php";

$nome_fornecedor = $_POST["nome_fornecedor"];
$email_fornecedor = $_POST["email_fornecedor"];
$cnpj_fornecedor = $_POST["cnpj_fornecedor"];
$telefone_fornecedor = $_POST["telefone_fornecedor"];

try {

    $sql = "INSERT INTO fornecedor (nome_fornecedor, email_fornecedor, cnpj_fornecedor, telefone_fornecedor) 
    VALUES (:nome_fornecedor, :email_fornecedor, :cnpj_fornecedor, :telefone_fornecedor)";

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ':nome_fornecedor' => $nome_fornecedor,
        ':email_fornecedor' => $email_fornecedor,
        ':cnpj_fornecedor' => $cnpj_fornecedor,
        ':telefone_fornecedor' => $telefone_fornecedor
    ]);

    if ($stmt->rowCount() > 0) {
        header("location: /cadastros-fornecedor/index.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao tentar cadastrar: " . $e->getMessage();
}
