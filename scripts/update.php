<?php

require_once "../config/db_conexao.php";
require_once "validacao_formulario.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idHidden = $_POST["id_fornecedor"];
    $nome = $_POST["nome_fornecedor"];
    $cnpj = $_POST["cnpj_fornecedor"];
    $email = $_POST["email_fornecedor"];
    $telefone = $_POST["telefone_fornecedor"];

    $sql = "UPDATE fornecedor 
    SET nome_fornecedor = :nome_fornecedor, cnpj_fornecedor = :cnpj_fornecedor, email_fornecedor = :email_fornecedor, telefone_fornecedor = :telefone_fornecedor
    WHERE id_fornecedor = :id_fornecedor";

    if (validarFormulario($cnpj, $telefone) === false) {
        echo "<script>history.back();</script>";
        exit();
    }

    // Limpando a mascara do JS antes de salvar no banco.
    $cnpj_limpo = preg_replace("/\D/", "", $cnpj);
    $telefone_limpo = preg_replace("/\D/", "", $telefone);

    $stmt = $conexao->prepare($sql);

    $stmt->bindValue(":id_fornecedor", $idHidden);
    $stmt->bindValue(":nome_fornecedor", $nome);
    $stmt->bindValue(":cnpj_fornecedor", $cnpj_limpo);
    $stmt->bindValue(":email_fornecedor", $email);
    $stmt->bindValue(":telefone_fornecedor", $telefone_limpo);

    if ($stmt->execute() == true) {
        $mensagemSucesso = "Edição concluída";
    } else {
        $mensagemErro = "Erro da edição";
    }
}
