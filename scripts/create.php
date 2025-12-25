
<?php

require_once "../config/db_conexao.php";
require_once "validacao_formulario.php";

$nome_fornecedor = $_POST["nome_fornecedor"];
$email_fornecedor = $_POST["email_fornecedor"];
$cnpj_fornecedor = $_POST["cnpj_fornecedor"];
$telefone_fornecedor = $_POST["telefone_fornecedor"];

try {

    $sql = "INSERT INTO fornecedor (nome_fornecedor, email_fornecedor, cnpj_fornecedor, telefone_fornecedor) 
    VALUES (:nome_fornecedor, :email_fornecedor, :cnpj_fornecedor, :telefone_fornecedor)";

    if (validarFormulario($cnpj_fornecedor, $telefone_fornecedor) === false) {
        echo "<script>history.back();</script>";
        exit();
    }

    // Limpando a mascara do JS antes de salvar no banco.
    $cnpj_Limpo = preg_replace("/\D/", "", $cnpj);
    $telefone_limpo = preg_replace("/\D/", "", $telefone);

    $stmt = $conexao->prepare($sql);

    $stmt->execute([
        ':nome_fornecedor' => $nome_fornecedor,
        ':email_fornecedor' => $email_fornecedor,
        ':cnpj_fornecedor' => $cnpj_limpo,
        ':telefone_fornecedor' => $telefone_limpo
    ]);

    // Se foi salvo no banco, usuário é direcionado para a index.
    if ($stmt->rowCount() > 0) {
        header("location: /cadastros-fornecedor/index.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erro ao tentar cadastrar: " . $e->getMessage();
}
